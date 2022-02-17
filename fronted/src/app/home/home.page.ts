import { Component } from '@angular/core';
import { io } from "socket.io-client";
 
@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})

export class HomePage {

  socket: any;
  msg: string="";
  messages: string[]=[];

  constructor() { }
 
 ngOnInit(){
   var ref = this;
   this.socket = io("http://127.0.0.1:3000",
   {reconnection:true});
   this.socket.connect();
   this.socket.on("myevent",(data)=>{
     ref.messages.push("server: " + data.data + " at " 
     + new Date().toISOString().split("T")[0] + " " +
     new Date().toTimeString().split("GMT")[0].trim()
     )
   })
 }

 sendToserver(){
   this.messages.push("client: "+this.msg+"at" 
   + new Date().toISOString().split("T")[0] + " " +
     new Date().toTimeString().split("GMT")[0].trim()
   )
   this.socket.emit("myevent", {data:this.msg});
 }
 
}
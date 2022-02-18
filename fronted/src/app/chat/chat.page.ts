import { Component, OnInit, ViewChild } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { AuthService } from '../auth/auth.service';
import { SoketService } from '../services/soket.service';

@Component({
  selector: 'app-chat',
  templateUrl: './chat.page.html',
  styleUrls: ['./chat.page.scss'],
})
export class ChatPage implements OnInit {

  user = this.authService.username;
  mensajes = [];
  texto = "";
  @ViewChild('scroll', { static: true }) scroll: any;

  constructor(
    private soket: SoketService, 
    private toastCtrl: ToastController, 
    private authService:AuthService,
    ) { }

  ngOnInit() {
    this.mensajes.length==0?
    this.soket.io.on("mensaje", (mensaje) => {
      if(mensaje) 
        this.mensajes.push(mensaje), this.ngOnInit();
    }):null;

    this.scroll.nativeElement.scrollTop = this.scroll.nativeElement.scrollHeight;
  }

  async showToast(msg) {
    let toast = await this.toastCtrl.create({
      message: msg,
      position: 'top',
      duration: 2000
    });
    toast.present();
  }

  enviarMensaje() {  
    const mensaje = {
      texto: this.texto,
      time: new Date(),
      user: this.user,
    }
    this.soket.io.emit("send",mensaje);
    this.texto="";
  }

 
}
import { Component, OnInit } from '@angular/core';
import { MenuController, ToastController } from '@ionic/angular';
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

  constructor(
    private soket: SoketService, 
    private toastCtrl: ToastController, 
    private authService:AuthService,
    // private menuController:MenuController
    ) { }

  ngOnInit() {
    // this.menuController.close();
    this.mensajes.length==0?
    this.soket.io.on("mensaje", (mensaje) => {
      if(mensaje) 
        this.mensajes.push(mensaje), this.ngOnInit();
    }):null;
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
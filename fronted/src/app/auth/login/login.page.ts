import { Component } from '@angular/core';
import { Router } from "@angular/router";
import { AuthService } from '../auth.service';
import { SocialAuthService, SocialUser } from "angularx-social-login";
import { FacebookLoginProvider, GoogleLoginProvider } from "angularx-social-login";
import { Storage } from '@ionic/storage';
import { User } from '../user';
import { AlertController } from '@ionic/angular';


@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})

export class LoginPage {

  constructor(
    private authService: AuthService,
    private router: Router,
    private authServiceSocial: SocialAuthService,
    private storage: Storage,
    private alertController: AlertController,
  ) { 
    this.storage.create(); 
  }

  login(form) {
    this.authService.login(form.value).subscribe((res) => {
      console.log(form.value);
      console.log(res);

      if(!res){
        return this.presentAlert("Error");
      }

       localStorage.setItem("token", res.access_token);
       this.storage.set("token", res.access_token);

      this.router.navigateByUrl('projects');
    });
  }

  signInWithGoogle(): void {
    this.authServiceSocial.signIn(GoogleLoginProvider.PROVIDER_ID).then(res => {
      let socialUser: SocialUser = res;
      let user: User=new User();
      user.email = socialUser.email;
      user.password = socialUser.id;
      
      this.authService.login(user).subscribe((res) => {        

        localStorage.setItem("token", res.access_token);
        this.storage.set("token", res.access_token);
 
       this.router.navigateByUrl('projects');
     });
    });
  }

  async presentAlert(message: string) {
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      subHeader: message,
      message: 'Tienes algun campo vacio',
      buttons: ['OK']
    });

    await alert.present();
  }

  signOut(): void {
    this.authServiceSocial.signOut();
  }

}

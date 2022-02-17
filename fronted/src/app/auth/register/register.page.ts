import { Component } from '@angular/core';
import { Router } from  "@angular/router";
import { SocialAuthService, SocialUser } from 'angularx-social-login';
import { AuthService } from '../auth.service';
import { FacebookLoginProvider, GoogleLoginProvider } from "angularx-social-login";
import { User } from '../user';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage {

  constructor(
    private router: Router, 
    private authService:  AuthService, 
    private authServiceSocial: SocialAuthService,
    ) { }


  signInWithGoogle(): void {
    this.authServiceSocial.signIn(GoogleLoginProvider.PROVIDER_ID).then(res => {
      
      let socialUser: SocialUser = res;
      let user: User=new User();
      user.name = socialUser.name;
      user.email = socialUser.email;
      user.password = socialUser.id;
     
      this.authService.register(user).subscribe((res) => {
        this.router.navigateByUrl('projects');
      });
      
    });
  }
  
  register(form) {
    let user: User = {
      id: null,
      name: form.value.name,
      email: form.value.email,
      password: form.value.password,
      password_confirmation: form.value.confirm
    };
      this.authService.register(user).subscribe((res) => {
        this.router.navigateByUrl('projects');
        console.log(res);
      });
  }



}
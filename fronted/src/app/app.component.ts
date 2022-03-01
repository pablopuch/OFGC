import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Storage } from '@ionic/storage-angular';
import { AuthService } from './auth/auth.service';
import { PdfService } from './services/pdf.service';
import Echo from 'laravel-echo';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent implements OnInit {
  constructor(private storage: Storage, private pdfService: PdfService, private authService: AuthService, private router: Router) { }

  async ngOnInit() {

    // console.log('implementando el init');
    // this.websockets();
    await this.storage.create();
    
  }

  // websockets() {
  //   const echo = new Echo({
  //     broadcaster: 'pusher',
  //     cluster: 'mt1',
  //     key: 'local',
  //     wsHost: window.location.hostname,
  //     wsPort: 6001,
  //     disableStats: true,
  //     enabledTransports: ['ws']
  //   });

  //   echo.channel('home').listen('NewMessage', (resp) => {
  //     console.log(resp);

  //   });
  // }


  getPdf() {
    window.open('http://localhost:8000/api/generate-pdf');
    this.pdfService.getpdf();
  }

  help() {
    window.open('http://127.0.0.1:8082/Bienvenidos.html');
  }

  logout() {
    this.authService.logout().then(() => {
      this.router.navigateByUrl("/login");
    });
  }
}

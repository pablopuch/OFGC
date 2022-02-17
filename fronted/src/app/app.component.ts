import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Storage } from '@ionic/storage-angular';
import { AuthService } from './auth/auth.service';
import { PdfService } from './services/pdf.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  constructor(private storage: Storage, private pdfService: PdfService, private authService: AuthService, private router: Router) {}

    async ngOnInit() {
      // If using a custom driver:
      // await this.storage.defineDriver(MyCustomDriver)
      await this.storage.create();
    }
    

    getPdf(){
      window.open('http://localhost:8000/api/generate-pdf');
      this.pdfService.getpdf();
    }

    help(){
      window.open('http://127.0.0.1:8082/Bienvenidos.html');
    }

    logout() {
    this.authService.logout().then(() => {
      this.router.navigateByUrl("/login");
    });
  }
}

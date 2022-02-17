import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {FileSaverService} from 'ngx-filesaver';

@Injectable({
  providedIn: 'root'
})
export class PdfService {
  token="";
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${this.token}`
    })
  };
  
  httpOptionsUsingUrlEncoded = {
    headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded',
  'Authorization':`Bearer ${this.token}` })
  };

  endpoint: string = "http://localhost:8000/api/generate-pdf";

  constructor(private httpClient: HttpClient, private fileSaverService: FileSaverService) { }

  getpdf(){
    return this.httpClient.get(this.endpoint, {...this.httpOptions, responseType: 'blob'}).subscribe((data) =>{
      let file = new Blob([data], {type: 'x-google-chrome-pdf'});
      this.fileSaverService.save(<any>file, "document.pdf")
    })
  }
}

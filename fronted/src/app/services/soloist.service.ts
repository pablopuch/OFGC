import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Soloist } from '../models/soloist';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})

export class SoloistService {

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

  endpoint: string = "http://127.0.0.1:8000/api/soloists";

  constructor(private httpClient: HttpClient) { }

  getSoloist(): Observable<Soloist[]>{
    return this.httpClient.get<Soloist[]>(this.endpoint, this.httpOptions);
  }
}

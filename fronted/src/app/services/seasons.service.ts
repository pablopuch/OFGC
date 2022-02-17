import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Season } from '../models/season';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})
export class SeasonsService {

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

  endpoint: string = "http://127.0.0.1:8000/api/seasons";

  constructor(private httpClient: HttpClient) { }

  getSeasons(): Observable<Season[]>{
    return this.httpClient.get<Season[]>(this.endpoint, this.httpOptions);
  }
}

import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Director } from '../models/director';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})

export class DirectorService {
  

  token="";
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${this.token}`
    })
  };

  httpOptionsUsingUrlEncoded = {
    headers: new HttpHeaders({
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': `Bearer ${this.token}`
    })
  };

  endpoint: string = "http://127.0.0.1:8000/api/directors";

  constructor(private httpClient: HttpClient, private storage: Storage) {
    this.storage.create()
    this.storage.get("token").then((token) => {
      this.httpOptions.headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      });
     
    })
  }

  getDirectors(): Observable<Director[]>{
    return this.httpClient.get<Director[]>(this.endpoint, this.httpOptions);
  }
}

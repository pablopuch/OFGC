import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { SolistProject } from '../models/solist_project';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})

export class SoloistProjectsService {

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

  endpoint = "http://localhost:8000/api/solistProjects";

  constructor(private httpClient: HttpClient, private storage: Storage) {
    this.storage.create()
    this.storage.get("token").then((token) => {
      this.httpOptions.headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      });
     
    })
  }

  getSoloistProjects(): Observable<SolistProject[]>{
    return this.httpClient.get<SolistProject[]>(this.endpoint, this.httpOptions);
  }

  getSoloistProjectsByProjectId(projectId: number): Observable<SolistProject[]>{
    return this.httpClient.get<SolistProject[]>(this.endpoint + "/project/" + projectId, this.httpOptions);
  }
  
}
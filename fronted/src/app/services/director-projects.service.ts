import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DirectorProject } from '../models/director_project';
import { Storage } from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})

export class DirectorProjectsService {

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

  endpoint = "http://localhost:8000/api/directorProjects";

  constructor(private httpClient: HttpClient, private storage: Storage) {
    this.storage.create()
    this.storage.get("token").then((token) => {
      this.httpOptions.headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      });
     
    })
  }

  getDirectorProjects(): Observable<DirectorProject[]>{
    return this.httpClient.get<DirectorProject[]>(this.endpoint, this.httpOptions);
  }

  getDirectorProjectsByProjectId(projectId: number): Observable<DirectorProject[]>{
    return this.httpClient.get<DirectorProject[]>(this.endpoint + "/project/" + projectId, this.httpOptions);
  }

}
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Project } from '../models/project';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})

export class ProjectsService {

  Project = []; 

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

  endpoint: string = "http://localhost:8000/api/projects";

  constructor(private httpClient: HttpClient) {
    // this.storage.create()
    // this.storage.get("token").then((token) => {
    //   this.httpOptions.headers = new HttpHeaders({
    //     'Content-Type': 'application/json',
    //     'Authorization': `Bearer ${token}`
    //   });
    // })
  }

  getProjects(): Observable<Project[]> {
    return this.httpClient.get<Project[]>(this.endpoint, this.httpOptions).pipe(
      tap(_ => console.log("Project retrieved")),
      catchError(this.handleError<Project[]>("Get project", []))
    );
  }
  

  getProjectById(id: number): Observable<Project> {
    return this.httpClient.get<Project>(this.endpoint + "/" + id, this.httpOptions).pipe(
      tap(_ => console.log(`Project retrieved: ${id}`)),
      catchError(this.handleError<Project>(`Get project id=${id}`))
    );
  }

  createProjectUsingJSON(project: Project): Observable<Project> {
    return this.httpClient.post<Project>(this.endpoint, JSON.stringify(project), this.httpOptions);
  }

  updateProject(idProject, project: Project): Observable<any> {
    let bodyEncoded = new URLSearchParams();
    bodyEncoded.append("season_id", project.season_id.toString());
    bodyEncoded.append("name", project.name);
    bodyEncoded.append("starDate", project.starDate.toString());
    bodyEncoded.append("endDate", project.endDate.toString());
    bodyEncoded.append("published", project.published.toString());
    const body = bodyEncoded.toString();
    return this.httpClient.put(this.endpoint + "/" + idProject, body, this.httpOptionsUsingUrlEncoded);
  }

  deleteProject(idProject: number): Observable<Project[]> {
    return this.httpClient.delete<Project[]>(this.endpoint + "/" + idProject, this.httpOptions);
  }

  handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
      console.error(error);
      console.log(`${operation} failed: ${error.message}`);
      return of(result as T);
    };
  } 
}

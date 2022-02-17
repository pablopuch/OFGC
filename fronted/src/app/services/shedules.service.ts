import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Shedule } from '../models/shedule';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})

export class ShedulesService {

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

  endpoint: string = "http://127.0.0.1:8000/api/shedules";

  constructor(private httpClient: HttpClient, private storage: Storage) {
    this.storage.create()
    this.storage.get("token").then((token) => {
      this.httpOptions.headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      });
    })
  }

  getShedules(): Observable<Shedule[]>{
    return this.httpClient.get<Shedule[]>(this.endpoint, this.httpOptions).pipe(
      tap(_=> console.log("Shedule retrieved")),
      catchError(this.handleError<Shedule[]>("Get shedule", []))
    );
  }

  
  getShedulesByProjectId(projectId:number): Observable<Shedule[]>{
    return this.httpClient.get<Shedule[]>(this.endpoint + "/project/" + projectId, this.httpOptions).pipe(
      tap(_=> console.log(`Shedule retrieved: ${projectId}`)),
      catchError(this.handleError<Shedule[]>(`Shedule retrieved: ${projectId}`))
    );
  }

  getSheduleById(id: number): Observable<Shedule>{
    return this.httpClient.get<Shedule>(this.endpoint + "/" + id, this.httpOptions).pipe(
      tap(_ => console.log(`Shedule fetched: ${id}`)),
      catchError(this.handleError<Shedule>(`Get shedule id=${id}`))
    );
  }

  createSheduleUsingJSON(shedule: Shedule): Observable<Shedule>{
    return this.httpClient.post<Shedule>(this.endpoint, JSON.stringify(shedule), this.httpOptions).pipe(
      catchError(this.handleError<Shedule>("Error ocurred"))
    );
  }

  updateShedule(idShedule, shedule: Shedule): Observable<any>{
    let bodyEncoded = new URLSearchParams();
    bodyEncoded.append("project_id", shedule.project_id.toString());
    bodyEncoded.append("type_id", shedule.type_id.toString());
    bodyEncoded.append("room_id", shedule.room_id.toString());
    bodyEncoded.append("date", shedule.date.toString());
    bodyEncoded.append("hour_range", shedule.hour_range.toString());
    bodyEncoded.append("note", shedule.note);
    const body = bodyEncoded.toString();
    return this.httpClient.put(this.endpoint + "/" + idShedule, body, this.httpOptionsUsingUrlEncoded).pipe(
      tap(_=> console.log(`Shedule update : ${idShedule}`)),
      catchError(this.handleError<Shedule[]>("Update shedule"))
    );
  }

  deleteShedule(idShedule: number): Observable<Shedule[]>{
    return this.httpClient.delete<Shedule[]>(this.endpoint + "/" + idShedule, this.httpOptions).pipe(
      tap(_=> console.log(`Shedule deleted: ${idShedule}`)),
      catchError(this.handleError<Shedule[]>("Delete shedule"))
    );
  }

  
  handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
      console.error(error);
      console.log(`${operation} failed: ${error.message}`);
      return of(result as T);
    };
  } 
}

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Room } from '../models/room';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})
export class RoomsService {

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

  endpoint: string = "http://127.0.0.1:8000/api/rooms";

  constructor(private httpClient: HttpClient) { }

  getRooms(): Observable<Room[]>{
    return this.httpClient.get<Room[]>(this.endpoint, this.httpOptions).pipe(
      tap(_=> console.log("Room retrieved")),
      catchError(this.handleError<Room[]>("Get room", []))
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

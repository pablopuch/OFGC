import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Typeshedule } from '../models/type_shedule';
import { Storage } from '@ionic/storage';


@Injectable({
  providedIn: 'root'
})
export class TypeSehdulesService {

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

  endpoint: string = "http://localhost:8000/api/type_shedules";

  constructor(private httpClient: HttpClient) { }

  getTypeshedules(): Observable<Typeshedule[]>{
    return this.httpClient.get<Typeshedule[]>(this.endpoint, this.httpOptions).pipe(
      tap(_=> console.log("Typeshedule retrieved")),
      catchError(this.handleError<Typeshedule[]>("Get Typeshedule", []))
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

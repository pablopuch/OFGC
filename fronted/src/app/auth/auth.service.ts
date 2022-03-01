import { Injectable } from  '@angular/core';
import { HttpClient } from  '@angular/common/http';
import { tap } from  'rxjs/operators';
import { Observable, BehaviorSubject } from  'rxjs';
import { User } from  './user';
import { AuthResponse } from  './auth-response';

@Injectable({
  providedIn: 'root'
})

export class AuthService {
username:string;
  AUTH_SERVER_ADDRESS:  string  =  'http://localhost:8000/api/auth';
  authSubject  =  new  BehaviorSubject(false);

  constructor(
    private  httpClient:  HttpClient,
    ) { }

  register(user: User): Observable<AuthResponse> {
    return this.httpClient.post<AuthResponse>(`${this.AUTH_SERVER_ADDRESS}/register`, user).pipe(
      tap(async (res:  AuthResponse ) => {

        if (res.user) {
          this.authSubject.next(true);
        }
      })
    );
  }


  login(user: User): Observable<any> {
    this.username=user.email;
    return this.httpClient.post(`${this.AUTH_SERVER_ADDRESS}/login`, user).pipe(
      tap(async (res: AuthResponse) => {

        if (res.user) {
          this.authSubject.next(true);
        }
      })
    );
  }

  async logout() {
    this.authSubject.next(false);
  }

  isLoggedIn() {
    return this.authSubject.asObservable();
  }




}

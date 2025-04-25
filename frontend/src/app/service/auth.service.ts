import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { User } from '../entity/user';
import { ApiResponse } from '../entity/api-response';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';


interface TokenResponse {
  token: string;
  email: string;
  userid: number;
  roles: string[];
}

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private _token?: string;
  private _email?: string;
  private _userid?: number;
  private _roles: string[] = [];
  private _error = false;

  constructor(private http: HttpClient, private router: Router) { }

  public get error(): boolean {
    return this._error;
  }

  public resetError(): void {
    this._error = false;
  }

  public get isAuthenticated(): boolean {
    return this._token !== undefined;
  }

  public get token(): string {
    return this._token ?? '';
  }

  public get email(): string {
    return this._email ?? '';
  }

  public get userid(): number {
    return this._userid ?? NaN;
  }

  public get roles(): string[] {
    return this._roles;
  }

  public hasRole(role: string): boolean {
    return this._roles.includes(role);
  }

  public login(email: string, password: string): void {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });

    this.http.post<TokenResponse>('http://localhost:8082/auth', {
      email: email,
      password: password
    }, { headers }).subscribe({
      next: (response) => {
        this._token = response.token;
        this._email = response.email;
        this._userid = response.userid;
        this._roles = response.roles;
        this.router.navigate(['/about']);
      },
      error: () => {
        this._error = true;
      }
    });
  }

  public logout(): void {
    this._token = undefined;
    this._email = undefined;
    this._userid = undefined;
    this._roles = [];
    this.router.navigate(['/login']);
  }



  public register(user: User): Observable<boolean> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/ld+json' });
    return this.http.post('http://localhost:8082/api/users',
      user,
      { headers: headers, observe: 'response', responseType: 'json' })
      .pipe(map((response) => response.status === 201))
  }
}

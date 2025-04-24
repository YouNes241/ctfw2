import { Injectable } from '@angular/core';
import { ApiResponse } from '../entity/api-response';
import { Animals } from '../entity/animals';
import { HttpHeaders, HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AnimauxService {

  private server : string = "http://localhost:8082/api/animals";
  private headers = new HttpHeaders({'Content-Type' : 'application/ld+json'});
  private patch_headers = new HttpHeaders({ 'Content-Type': 'application/merge-patch+json' });

  constructor(private http: HttpClient) {  }

  public all(): Observable<Array<Animals>> {
    return this.http.get<ApiResponse<Animals>>(this.server,
      { observe: 'body', responseType: 'json' })
      .pipe(map((data) => data['member']))
  }

  public animal(id : number) : Observable<Animals> {
    return this.http.get<Animals>(this.server+"/"+id,
      { headers : this.headers, observe : 'body', responseType : 'json'}
    )
  }

  public deleteAnimal(id : number) : Observable<boolean> {
    return this.http.delete(this.server + "/" + id.toString(),
    { headers : this.headers, observe : 'response', responseType : 'json'})
    .pipe(map((response) => response.status == 204))
  }

  public createAnimal(animal : Animals) : Observable<boolean> {
    return this.http.post(this.server, 
      animal,
      { headers : this.headers, observe : 'response', responseType : 'json'})
      .pipe(map((response) => response.status === 201))
  }

  public modifyAnimal(animal : Animals) : Observable<boolean> {
    return this.http.patch(this.server + "/" + animal.id!.toString(),
    animal,
    { headers : this.patch_headers, observe : 'response', responseType : 'json'})
    .pipe(map((response) => response.status === 200))
  }
}
import { Observations } from '../entity/observations';
import { Injectable } from '@angular/core';
import { ApiResponse } from '../entity/api-response';
import { HttpHeaders, HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
@Injectable({
  providedIn: 'root'
})
export class ObservationsService {

  private server : string = "http://localhost:8082/api/observations";
  private headers = new HttpHeaders({'Content-Type' : 'application/ld+json'});
  private patch_headers = new HttpHeaders({ 'Content-Type': 'application/merge-patch+json' });

  constructor(private http: HttpClient) {  }

  public all(): Observable<Array<Observations>> {
    return this.http.get<ApiResponse<Observations>>(this.server,
      { observe: 'body', responseType: 'json' })
      .pipe(map((data) => data['member']))
  }

  public observation(id : number) : Observable<Observations> {
    return this.http.get<Observations>(this.server+"/"+id,
      { headers : this.headers, observe : 'body', responseType : 'json'}
    )
  }

  public deleteObservation(id : number) : Observable<boolean> {
    return this.http.delete(this.server + "/" + id.toString(),
    { headers : this.headers, observe : 'response', responseType : 'json'})
    .pipe(map((response) => response.status == 204))
  }

  public createObservation(observation : Observations) : Observable<boolean> {
    return this.http.post(this.server, 
      observation,
      { headers : this.headers, observe : 'response', responseType : 'json'})
      .pipe(map((response) => response.status === 201))
  }

  public modifyObservation(observation : Observations) : Observable<boolean> {
    return this.http.patch(this.server + "/" + observation.id!.toString(),
    observation,
    { headers : this.patch_headers, observe : 'response', responseType : 'json'})
    .pipe(map((response) => response.status === 200))
  }
}
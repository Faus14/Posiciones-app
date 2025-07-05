import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Empresa {
  id: number;
  razonSocial: string;
}

@Injectable({
  providedIn: 'root'
})
export class EmpresasService {
  private apiUrl = 'http://localhost:8001/api/empresas';

  constructor(private http: HttpClient) {}

  getEmpresas(): Observable<Empresa[]> {
    return this.http.get<Empresa[]>(this.apiUrl);
  }
}

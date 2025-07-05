import { inject, Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Posicion {
  id: number;
  idEmpresa: number;
  idProducto: number;
  fechaEntregaInicio: string;
  moneda: string;
  precio: number;
  nombreEmpresa: string;
  nombreProducto: string;
}

@Injectable({ providedIn: 'root' })
export class PosicionesService {
  private http = inject(HttpClient);
  private apiUrl = 'http://localhost:8001/api/posiciones';

  getPosiciones(): Observable<Posicion[]> {
    return this.http.get<Posicion[]>(this.apiUrl);
  }


createPosicion(posicion: {
  idEmpresa: number;
  idProducto: number;
  fechaEntregaInicio: string;
  moneda: string;
  precio: number;
}): Observable<any> {
  return this.http.post(this.apiUrl, posicion);
}


}

import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PosicionesService, Posicion } from '../../services/posiciones';


@Component({
  selector: 'app-listado',
  imports: [CommonModule],
  templateUrl: './listado.html',
  styleUrls: ['./listado.css']
})
export class Listado implements OnInit {
  posiciones: Posicion[] = [];

  constructor(private posicionesService: PosicionesService) {}

  ngOnInit() {
    this.posicionesService.getPosiciones().subscribe({
      next: (data: Posicion[]) => this.posiciones = data,
      error: (err: any) => console.error('Error cargando posiciones', err)
    });
  }
}



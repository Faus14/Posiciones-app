import { Component } from '@angular/core';

import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { PosicionesService } from '../../services/posiciones';
import { Router, RouterModule } from '@angular/router';

@Component({
  selector: 'app-crear-posicion',
  imports: [ReactiveFormsModule, RouterModule],
  templateUrl: './crear-posicion.html',
  styleUrls: ['./crear-posicion.css']
})
export class CrearPosicionComponent {
  form: FormGroup;

  empresas = [
    { id: 1, nombre: 'Empresa 1' },
    { id: 2, nombre: 'Empresa 2' },
  ];

  productos = [
    { id: 1, nombre: 'Producto A' },
    { id: 2, nombre: 'Producto B' },
  ];

  constructor(
    private fb: FormBuilder,
    private posicionesService: PosicionesService,
    private router: Router
  ) {
    this.form = this.fb.group({
      idEmpresa: ['', Validators.required],
      idProducto: ['', Validators.required],
      fechaEntregaInicio: ['', Validators.required],
      moneda: ['', [Validators.required, Validators.maxLength(3)]],
      precio: ['', [Validators.required, Validators.min(0.01)]],
    });
  }

  onSubmit() {
    if (this.form.invalid) return;

    this.posicionesService.createPosicion(this.form.value).subscribe({
      next: () => this.router.navigate(['/listado']),
      error: (err) => console.error('Error al crear posición', err)
    });
  }
}

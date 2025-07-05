import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { Router, RouterModule } from '@angular/router';
import { PosicionesService } from '../../services/posiciones';
import { EmpresasService, Empresa } from '../../services/empresas';
import { ProductosService, Producto } from '../../services/productos';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-crear-posicion',
  standalone: true,
  imports: [ReactiveFormsModule, RouterModule, CommonModule],
  templateUrl: './crear-posicion.html',
  styleUrls: ['./crear-posicion.css']
})
export class CrearPosicionComponent implements OnInit {
  form: FormGroup;
  empresas: Empresa[] = [];
  productos: Producto[] = [];
  errorMessages: string[] = [];

  // Opciones de moneda según el documento del CRM
  monedas = [
    { value: 'USD', label: 'USD' },
    { value: 'ARS', label: 'ARS' }
  ];

  constructor(
    private fb: FormBuilder,
    private posicionesService: PosicionesService,
    private empresasService: EmpresasService,
    private productosService: ProductosService,
    private router: Router
  ) {
    this.form = this.fb.group({
      idEmpresa: ['', Validators.required],
      idProducto: ['', Validators.required],
      fechaEntregaInicio: ['', Validators.required],
      moneda: ['USD', Validators.required], // USD como valor por defecto según el documento
      precio: ['', [Validators.required, Validators.min(0.01)]],
    });
  }

  ngOnInit() {
    this.empresasService.getEmpresas().subscribe({
      next: (data) => this.empresas = data,
      error: (err) => console.error('Error al cargar empresas', err)
    });

    this.productosService.getProductos().subscribe({
      next: (data) => this.productos = data,
      error: (err) => console.error('Error al cargar productos', err)
    });
  }

  onSubmit() {
    if (this.form.invalid) return;

    this.errorMessages = [];

    this.posicionesService.createPosicion(this.form.value).subscribe({
      next: () => this.router.navigate(['/listado']),
      error: (err) => {
        if (err.status === 422 && err.error.error) {
          const errors = err.error.error;
          this.errorMessages = [];
          for (const field in errors) {
            if (errors.hasOwnProperty(field)) {
              this.errorMessages.push(...errors[field]);
            }
          }
        } else {
          this.errorMessages = ['Error inesperado'];
        }
      }
    });
  }
}

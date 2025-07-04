import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { Router, RouterModule } from '@angular/router';
import { PosicionesService } from '../../services/posiciones';
import { EmpresasService, Empresa } from '../../services/empresas';
import { ProductosService, Producto } from '../../services/productos';

@Component({
  selector: 'app-crear-posicion',
  standalone: true,
  imports: [ReactiveFormsModule, RouterModule],
  templateUrl: './crear-posicion.html',
  styleUrls: ['./crear-posicion.css']
})
export class CrearPosicionComponent implements OnInit {
  form: FormGroup;
  empresas: Empresa[] = [];
  productos: Producto[] = [];

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
      moneda: ['', [Validators.required, Validators.maxLength(3)]],
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

    this.posicionesService.createPosicion(this.form.value).subscribe({
      next: () => this.router.navigate(['/listado']),
      error: (err) => console.error('Error al crear posición', err)
    });
  }
}

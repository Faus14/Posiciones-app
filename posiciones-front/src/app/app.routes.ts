import { Routes } from '@angular/router';
import { Layout } from './layout/layout';
import { Inicio } from './pages/inicio/inicio';
import { Listado } from './pages/listado/listado';
import { CrearPosicionComponent } from './pages/crear-posicion/crear-posicion';

export const routes: Routes = [
  {
    path: '',
    component: Layout,
    children: [
      { path: '', redirectTo: 'inicio', pathMatch: 'full' },
      { path: 'inicio', component: Inicio },
      { path: 'listado', component: Listado },
      { path: 'crear-posicion', component: CrearPosicionComponent },
    ]
  },
  { path: '**', redirectTo: '' }
];

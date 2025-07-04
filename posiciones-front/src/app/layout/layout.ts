import { Component } from '@angular/core';
import { RouterModule, RouterOutlet } from '@angular/router';


@Component({
  selector: 'app-layout',
  imports: [RouterModule, RouterOutlet],
  templateUrl: './layout.html',
  styleUrls: ['./layout.css']

})
export class Layout {
  cerrarMenu() {
    const menuToggle = document.getElementById('menu-toggle') as HTMLInputElement | null;
    if (menuToggle) {
      menuToggle.checked = false;
    }
  }
}

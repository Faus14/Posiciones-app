import { TestBed } from '@angular/core/testing';

import { PosicionesService } from './posiciones';

describe('PosicionesService', () => {
  let service: PosicionesService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [PosicionesService]
    });
    service = TestBed.inject(PosicionesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

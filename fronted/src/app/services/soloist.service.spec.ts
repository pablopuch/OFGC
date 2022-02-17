import { TestBed } from '@angular/core/testing';

import { SoloistService } from './soloist.service';

describe('SoloistService', () => {
  let service: SoloistService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SoloistService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

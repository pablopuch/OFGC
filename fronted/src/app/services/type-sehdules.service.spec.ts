import { TestBed } from '@angular/core/testing';

import { TypeSehdulesService } from './type-sehdules.service';

describe('TypeSehdulesService', () => {
  let service: TypeSehdulesService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(TypeSehdulesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

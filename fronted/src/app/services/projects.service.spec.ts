import { of } from 'rxjs';
import { Project } from '../models/project';
import { ProjectsService } from './projects.service';
import { Storage } from '@ionic/storage';
import { HttpErrorResponse } from '@angular/common/http';


describe('ProjectsService', () => {
  let service: ProjectsService;
  let httpClientSpy: {get: jasmine.Spy};

  beforeEach(() => {
    httpClientSpy = jasmine.createSpyObj('HttpClient', ['get']);
    service = new ProjectsService(httpClientSpy as any);
  });

  fit('porjects-get', () => {
    const mockProjects: Project[] = [
      {
          id: 1,
          season_id: 3,
          name: "azul",
          starDate: new Date("2021-11-21"),
          endDate: new Date("2021-11-21"),
          season: {
              id: 3,
              name: "primavera",
              starDate: new Date("2021-11-01"),
              endDate: new Date("2021-11-07"),  
              noteSeason: "adios",
          }
      },
      {
          id: 7,
          season_id: 2,
          name: "verde",
          starDate: new Date("2021-10-15"),
          endDate: new Date("2021-10-21"),
          season: {
              id: 2,
              name: "varano",
              starDate: new Date("2021-11-10"),
              endDate: new Date("2021-11-17"),
              noteSeason: "buenos dias",
          }
      }
  ];
  httpClientSpy.get.and.returnValue(of(mockProjects));
  
  });

  it('should return an error when the server returns a 404', (done: DoneFn) => {
    const errorResponse = new HttpErrorResponse({
      error: 'test 404 error',
      status: 404, statusText: 'Not Found'
    });
  
    httpClientSpy.get.and.returnValue(of(errorResponse));
  
    service.getProjects().subscribe(
      project => done.fail('expected an error, not project'),
      error  => {
        expect(error.message).toContain('test 404 error');
        done();
      }
    );
  });


});

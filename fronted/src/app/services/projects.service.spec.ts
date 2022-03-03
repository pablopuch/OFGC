import { of } from 'rxjs';
import { Project } from '../models/project';
import { ProjectsService } from './projects.service';
import { Storage } from '@ionic/storage';
import { HttpErrorResponse } from '@angular/common/http';


describe('ProjectsService', () => {
  let service: ProjectsService;
  let httpClientSpy: { get: jasmine.Spy };

  beforeEach(() => {
    httpClientSpy = jasmine.createSpyObj('HttpClient', ['get']);
    service = new ProjectsService(httpClientSpy as any);
  });


  

  fit('porjects-get', () => {
    const mockProjects: Project[] = [
      {
        "id": 24,
        "season_id": 1,
        "name": "prueba",
        "starDate": new Date("2022-02-27"),
        "endDate": new Date("2022-02-27"),
        "published": true,

        "season": {
          "id": 1,
          "name": "Primavera",
          "starDate": new Date("2021-11-20"),
          "endDate": new Date("2021-11-27"),
          "noteSeason": "Pablo SOL",
        }
      },
      {
        "id": 25,
        "season_id": 2,
        "name": "qqqqqqqq",
        "starDate": new Date("2022-02-27"),
        "endDate": new Date("2022-02-27"),
        "published": true,

        "season": {
          "id": 2,
          "name": "Azul",
          "starDate": new Date("2022-01-20"),
          "endDate": new Date("2022-01-27"),
          "noteSeason": "colores",

        }
      },
    ];
    httpClientSpy.get.and.returnValue(of(mockProjects));

    service.getProjects();

    expect(service.Project.length).toBe(2);

  });


  fit('porjects-get', () => {
    const mockProjects: Project[] = [
      {
        "id": 24,
        "season_id": 1,
        "name": "prueba",
        "starDate": new Date("2022-02-27"),
        "endDate": new Date("2022-02-27"),
        "published": true,

        "season": {
          "id": 1,
          "name": "Primavera",
          "starDate": new Date("2021-11-20"),
          "endDate": new Date("2021-11-27"),
          "noteSeason": "Pablo SOL",
        }
      },
      {
        "id": 25,
        "season_id": 2,
        "name": "qqqqqqqq",
        "starDate": new Date("2022-02-27"),
        "endDate": new Date("2022-02-27"),
        "published": true,

        "season": {
          "id": 2,
          "name": "Azul",
          "starDate": new Date("2022-01-20"),
          "endDate": new Date("2022-01-27"),
          "noteSeason": "colores",

        }
      },
    ];
    httpClientSpy.get.and.returnValue(of(mockProjects));

    service.getProjects();

    expect(service.Project[0]['name']).toBe('prueba');

    expect(httpClientSpy.get.calls.count()).toBe(2, 'two call')

  });



  it('should return an error when the server returns a 404', (done: DoneFn) => {
    const errorResponse = new HttpErrorResponse({
      error: 'test 404 error',
      status: 404,
      statusText: 'Not Found'
    });

    httpClientSpy.get.and.returnValue(of(errorResponse));

    service.getProjects().subscribe(
      project => done.fail('expected an error, not project'),
      error => {
        expect(error.message).toContain('test 404 error');
        done();
      }
    );
  });

  it('prueba', () => {
    expect(service).toBeTruthy();
  });



});

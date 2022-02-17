import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import * as moment from 'moment';
import { AuthService } from '../auth/auth.service';
import { ProjectsService } from '../services/projects.service';
import { Project } from '../models/project';



@Component({
  selector: 'app-projects',
  templateUrl: './projects.page.html',
  styleUrls: ['./projects.page.scss'],
})
export class ProjectsPage implements OnInit {

  Projects: any[] = [];
  pasa: boolean = false;


  constructor(private projectsService: ProjectsService, private authService: AuthService, private router: Router) { }

  ngOnInit() {

  }

  ionViewDidEnter() {
      this.projectsService.getProjects().subscribe(
        (response) => {
        
          this.Projects = response.filter((project)=>{
          return  project.published==true;
          });
          
        })
    
  }

  removeProject(projects) {
    if (window.confirm("¿Estás seguro de que quieres borrar?")) {
      this.projectsService.deleteProject(projects.id).subscribe(() => {
        this.ionViewDidEnter();
      })
    }
  }

  formatDate(date: Date) {
    return moment(date).format("DD-MM-YYYY");
  }
}

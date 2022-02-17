import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DirectorProject } from '../models/director_project';
import { SolistProject } from '../models/solist_project';
import { DirectorProjectsService } from '../services/director-projects.service';
import { SoloistProjectsService } from '../services/soloist-projects.service';

@Component({
  selector: 'app-director',
  templateUrl: './director.page.html',
  styleUrls: ['./director.page.scss'],
})
export class DirectorPage implements OnInit {

  directorproject: DirectorProject[] = [];
  soloistproject: SolistProject[] = [];
  project_id: number = this.activatedRoute.snapshot.params.project_id;

  
  

  constructor(
    private activatedRoute: ActivatedRoute,
    private directorProjectsService: DirectorProjectsService,
    private soloistProjectsService: SoloistProjectsService
  ) { }

  ngOnInit() {
    this.getDirectorProjectsByProjectId();
    this.getSoloistProjectsByProjectId();
  }

  getDirectorProjectsByProjectId(){
    this.directorProjectsService.getDirectorProjectsByProjectId(this.project_id).subscribe((res) =>{
      console.log(res);
        this.directorproject = res;
    })
  }

  getSoloistProjectsByProjectId(){
    this.soloistProjectsService.getSoloistProjectsByProjectId(this.project_id).subscribe((res) =>{
      console.log(res);
        this.soloistproject = res;
    })
  }



}

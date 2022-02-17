import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertController } from '@ionic/angular';
import { ProjectsService } from '../services/projects.service';
import { SeasonsService } from '../services/seasons.service';

@Component({
  selector: 'app-update-projects',
  templateUrl: './update-projects.page.html',
  styleUrls: ['./update-projects.page.scss'],
})
export class UpdateProjectsPage implements OnInit {

  Seasons: any = [];
  updateProjectForm: FormGroup;
  id: any;
  
  constructor(
    private activatedRoute: ActivatedRoute,
    public formBuilder: FormBuilder,
    private router: Router,
    public seasonsService: SeasonsService,
    public projectsService: ProjectsService,
    private alertController: AlertController,
  ) { 
    this.id = this.activatedRoute.snapshot.paramMap.get("id");
  }

  ionViewDidEnter(){
    this.seasonsService.getSeasons().subscribe((response) =>{
      this.Seasons = response;
    })
  }

  ngOnInit() {
    this.fetchProjects(this.id);
    this.updateProjectForm = this.formBuilder.group({
      season_id: [""],
      name: [""],
      starDate: [""],
      endDate: [""],
      published: ["1"]
    })
  }

  fetchProjects(id){
    this.projectsService.getProjectById(id).subscribe((data)=>{
      return this.updateProjectForm.setValue({
        season_id: data["season_id"],
        name: data["name"],
        starDate: data["endDate"],
        endDate: data["endDate"],
        published: data["published"],
      });
    });
  }

  onSubmit(){
    if(!this.updateProjectForm.valid){
      return this.presentAlert("Error");;

    } else{
      this.projectsService.updateProject(this.id, this.updateProjectForm.value).subscribe(()=>{
        this.updateProjectForm.reset();
        this.router.navigate(["/projects"]);
      })
    }
  }

  async presentAlert(message: string) {
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      subHeader: message,
      message: 'Tienes algun campo vacio',
      buttons: ['OK']
    });

    await alert.present();
  }


  get name(){
    return this.updateProjectForm.get('name');
  }

  get season_id(){
    return this.updateProjectForm.get('season_id');
  }

  get starDate(){
    return this.updateProjectForm.get('starDate');
  }

  get endDate(){
    return this.updateProjectForm.get('endDate');
  }

}

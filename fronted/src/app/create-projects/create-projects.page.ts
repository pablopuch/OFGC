import { Component, NgZone, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { AlertController } from '@ionic/angular';
import { ProjectsService } from '../services/projects.service';
import { SeasonsService } from '../services/seasons.service';

@Component({
  selector: 'app-create-projects',
  templateUrl: './create-projects.page.html',
  styleUrls: ['./create-projects.page.scss'],
})

export class CreateProjectsPage {

  Seasons: any = [];

  projectForm: FormGroup;

  constructor(
    private router: Router,
    public FormBuilder: FormBuilder,
    private zone: NgZone,
    private seasonsService: SeasonsService,
    private projectsService: ProjectsService,
    private alertController: AlertController,
  ) {
    this.projectForm = this.FormBuilder.group({
      season_id: [''],
      name: [''],
      starDate: [''],
      endDate: [''],
      published: ['1']
    })
   }

  ionViewDidEnter(){
    this.seasonsService.getSeasons().subscribe((response) =>{      
      this.Seasons = response;
    })
  }

  onSubmit(){
    console.log(this.projectForm.value);
    if(!this.projectForm.valid){
      return this.presentAlert("Error");

    } else {
      this.projectsService.createProjectUsingJSON(this.projectForm.value)
      .subscribe((res) =>{
        this.zone.run(() => {
          this.projectForm.reset();
          this.router.navigate(['/projects']);
          console.log(res);
        })
      });
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
    return this.projectForm.get('name');
  }

  get season_id(){
    return this.projectForm.get('season_id');
  }

  get starDate(){
    return this.projectForm.get('starDate');
  }

  get endDate(){
    return this.projectForm.get('endDate');
  }
}

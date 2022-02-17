import { Component, OnInit, NgZone } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormBuilder } from "@angular/forms";
import { ShedulesService } from '../services/shedules.service';
import { RoomsService } from '../services/rooms.service';
import { TypeSehdulesService } from '../services/type-sehdules.service';
import { ProjectsService } from '../services/projects.service';
import { AlertController } from '@ionic/angular';



@Component({
  selector: 'app-create',
  templateUrl: './create.page.html',
  styleUrls: ['./create.page.scss'],
})


export class CreatePage {

  Rooms: any = [];
  Typeshedules: any = [];
  Projects: any = [];

  sheduleForm: FormGroup;

  constructor(
    private router: Router,
    public FormBuilder: FormBuilder,
    private zone: NgZone,
    private SehduleService: ShedulesService,
    private roomsService: RoomsService,
    private typeSehdulesService: TypeSehdulesService,
    private projectsService: ProjectsService,
    private alertController: AlertController,
  ) {  
    this.sheduleForm = this.FormBuilder.group({
      project_id: [''],
      type_id: [''],
      room_id: [''],
      date: [''],
      hour_range: [''],
      note: ['']
    })
  }
  
  ionViewDidEnter(){
    this.roomsService.getRooms().subscribe((response) =>{
      this.Rooms = response;
    })

    this.typeSehdulesService.getTypeshedules().subscribe((response) =>{
      this.Typeshedules = response;
    })

    this.projectsService.getProjects().subscribe((response) =>{
      this.Projects = response.filter((project)=>{
        return  project.published==true;
        });
    })
  }

  onSubmit(){
    console.log(this.sheduleForm.value);
    if (!this.sheduleForm.valid){
      return this.presentAlert("Error");;
    } else {
      this.SehduleService.createSheduleUsingJSON(this.sheduleForm.value)
      .subscribe((response) => {
        this.zone.run(() => {
          this.sheduleForm.reset();
          this.router.navigate(['/list']);
        })

        console.log(response);
        
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

  get note(){
    return this.sheduleForm.get('note');
  }

  get project_id(){
    return this.sheduleForm.get('project_id');
  }

  get type_id(){
    return this.sheduleForm.get('type_id');
  }

  get room_id(){
    return this.sheduleForm.get('room_id');
  }

  get date(){
    return this.sheduleForm.get('date');
  }

  get hour_range(){
    return this.sheduleForm.get('hour_range');
  }
  
}

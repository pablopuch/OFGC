import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertController } from '@ionic/angular';
import { ProjectsService } from '../services/projects.service';
import { RoomsService } from '../services/rooms.service';
import { ShedulesService } from '../services/shedules.service';
import { TypeSehdulesService } from '../services/type-sehdules.service';

@Component({
  selector: 'app-update',
  templateUrl: './update.page.html',
  styleUrls: ['./update.page.scss'],
})

export class UpdatePage implements OnInit {

  Rooms: any = [];
  Typeshedules: any = [];
  Projects: any = [];

  updateForm: FormGroup;
  id: any;

  constructor(
    private shedulesService: ShedulesService,
    private activatedRoute: ActivatedRoute,
    public formBuilder: FormBuilder,
    private router: Router,
    private roomsService: RoomsService,
    private typeSehdulesService: TypeSehdulesService,
    private projectsService: ProjectsService,
    private alertController: AlertController,
  ) { 
    this.id = this.activatedRoute.snapshot.paramMap.get("id");
  }

  ionViewDidEnter(){
    this.roomsService.getRooms().subscribe((response) =>{
      this.Rooms = response;
    })

    this.typeSehdulesService.getTypeshedules().subscribe((response) =>{
      this.Typeshedules = response;
    })

    this.projectsService.getProjects().subscribe((response) =>{
      this.Projects = response;
    })
  }

  ngOnInit() {
    this.fetchShedules(this.id);
    this.updateForm = this.formBuilder.group({
      project_id: [""],
      type_id: [""],
      room_id: [""],
      date: [""],
      hour_range: [""],
      note: [""]
    })
    
  }

  fetchShedules(id){
    this.shedulesService.getSheduleById(id).subscribe((data)=>{
      return this.updateForm.setValue({
        project_id: data["project_id"],
        type_id: data["type_id"],
        room_id: data["room_id"],
        date: data["date"],
        hour_range: data["hour_range"],
        note: data["note"]
      });
    });
  }

  onSubmit(){
    if(!this.updateForm.valid){
      return this.presentAlert("Error");

    } else{
      this.shedulesService.updateShedule(this.id, this.updateForm.value).subscribe(()=>{
        this.updateForm.reset();
        this.router.navigate(["/list"]);
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

  get note(){
    return this.updateForm.get('note');
  }

  get project_id(){
    return this.updateForm.get('project_id');
  }

  get type_id(){
    return this.updateForm.get('type_id');
  }

  get room_id(){
    return this.updateForm.get('room_id');
  }

  get date(){
    return this.updateForm.get('date');
  }

  get hour_range(){
    return this.updateForm.get('hour_range');
  }


}

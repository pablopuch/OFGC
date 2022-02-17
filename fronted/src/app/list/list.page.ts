import { Component, OnInit } from '@angular/core';
import { ShedulesService } from '../services/shedules.service';
import * as moment from 'moment';

@Component({
  selector: 'app-list',
  templateUrl: './list.page.html',
  styleUrls: ['./list.page.scss'],
})
export class ListPage implements OnInit {

  Shedules: any = [];

  constructor(private shedulesService: ShedulesService) { }

  ngOnInit() {}

  ionViewDidEnter(){
    this.shedulesService.getShedules().subscribe(
      (response) =>{
        this.Shedules = response;
    })
  }

  removeShedule(shedules){
    if(window.confirm("¿Estás seguro de que quieres borrar?")){
      this.shedulesService.deleteShedule(shedules.id).subscribe(()=>{
        this.ionViewDidEnter();
      })
    }
  }

  formatDate(date:Date){
    return moment(date).format("DD-MM-YYYY");
  }

}

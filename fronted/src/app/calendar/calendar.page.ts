import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Shedule } from '../models/shedule';
import { ShedulesService } from '../services/shedules.service';

@Component({
  selector: 'app-calendar',
  templateUrl: './calendar.page.html',
  styleUrls: ['./calendar.page.scss'],
})
export class CalendarPage implements OnInit {

  shedules: Shedule[] = [];
  project_id: number = this.activatedRoute.snapshot.params.project_id;

  constructor(
    private activatedRoute: ActivatedRoute, 
    private shedulesService: ShedulesService
  ) { }
  
  ngOnInit() {
    this.getCalendarByProjectId();  
  }

  getCalendarByProjectId() {
    this.shedulesService.getShedulesByProjectId(this.project_id).subscribe((res) => {
        console.log(res);
        this.shedules = res;        
      },
      (error)=>{return console.log(error)}
    )
  }
}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CreateProjectsPageRoutingModule } from './create-projects-routing.module';

import { CreateProjectsPage } from './create-projects.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CreateProjectsPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [CreateProjectsPage]
})
export class CreateProjectsPageModule {}

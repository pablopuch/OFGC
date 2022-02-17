import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { UpdateProjectsPageRoutingModule } from './update-projects-routing.module';

import { UpdateProjectsPage } from './update-projects.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    UpdateProjectsPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [UpdateProjectsPage]
})
export class UpdateProjectsPageModule {}

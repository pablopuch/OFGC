import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { DirectorPageRoutingModule } from './director-routing.module';

import { DirectorPage } from './director.page';
import { SharedModule } from '../components/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    DirectorPageRoutingModule,
    SharedModule
  ],
  declarations: [DirectorPage]
})
export class DirectorPageModule {}

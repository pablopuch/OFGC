import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { UpdateProjectsPage } from './update-projects.page';

const routes: Routes = [
  {
    path: '',
    component: UpdateProjectsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class UpdateProjectsPageRoutingModule {}

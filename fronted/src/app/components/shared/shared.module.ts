import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TabsComponent } from '../tabs/tabs.component';
import { MenuComponent } from '../menu/menu.component';



@NgModule({
  declarations: [TabsComponent, MenuComponent],
  imports: [
    CommonModule
  ],
  exports: [
    TabsComponent,
    MenuComponent
  ]
})
export class SharedModule { }

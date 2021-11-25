import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { Comp1basicComponent } from './comp1basic/comp1basic.component';
import { Comp2basicComponent } from './comp2basic/comp2basic.component';

const routes: Routes = [{path: 'basic1', component:Comp1basicComponent}, 
          {path:'basic2', component:Comp2basicComponent}];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

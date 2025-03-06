import { Routes } from '@angular/router';
import { RegistrationComponent  } from './registration/registration.component';
import { LoginComponent } from './login/login.component';
import path from 'path';

export const routes: Routes = [

  {path:'',redirectTo:'login',pathMatch:'full'},
     {path:'registration', component: RegistrationComponent  },
  {path:'login',component:LoginComponent}
];


import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AddProductsComponent } from './Components/Admin/add-products/add-products.component';
import { ErrorComponent } from './Components/Admin/error/error.component';
import { ProductsComponent } from './Components/Admin/products/products.component';
import { UpdateProductsComponent } from './Components/Admin/update-products/update-products.component';
import { LoginComponent } from './userComponents/login/login.component';
import { SignupComponent } from './userComponents/signup/signup.component';

const routes: Routes = [
  {path: "login",component:LoginComponent},
  {path: "signup", component:SignupComponent},
  {path:"",component:ProductsComponent},
  {path:"Products",component:ProductsComponent},
  {path:"AddProducts",component:AddProductsComponent},
  { path:"products/edit/:id",component:UpdateProductsComponent},
  {path:"**",component:ErrorComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

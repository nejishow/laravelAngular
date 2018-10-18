import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { NavBarComponent } from './components/nav-bar/nav-bar.component';
import { LoginComponent } from './components/auth/login/login.component';
import { SignInComponent } from './components/auth/sign-in/sign-in.component';
import { LogOutComponent } from './components/auth/log-out/log-out.component';
import { PasswordComponent } from './components/auth/password/password.component';

@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    LoginComponent,
    SignInComponent,
    LogOutComponent,
    PasswordComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

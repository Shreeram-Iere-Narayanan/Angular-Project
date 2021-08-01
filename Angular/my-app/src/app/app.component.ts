import { Component } from '@angular/core';
// import {HttpModule} from '@angular/common/http';

@Component({
  selector: 'pm-root',
  template:`<div>  
  <h1>{{pageTitle}}</h1> 
  <pm-sensorData></pm-sensorData>
  </div>`
})

export class AppComponent{

}
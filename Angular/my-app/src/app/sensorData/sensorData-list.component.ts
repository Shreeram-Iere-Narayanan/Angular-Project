import {Component, OnInit} from '@angular/core'
import {HttpClient} from '@angular/common/http';
import {HttpErrorResponse} from '@angular/common/http';

@Component({
    selector:"pm-sensorData",
    templateUrl: './sensorData-list.component.html',
})

export class sensorDataListComponent{
    pageTitle: String = 'Sensor Data values';
    constructor(private httpService: HttpClient){}
    sensorData: any[];

    ngOnInit (){
        this.httpService.get('assets/sensor.json').subscribe(
            data => {
              this.sensorData = data as any [];	 
            },
            (err: HttpErrorResponse) => {
              console.log (err.message);
            }
          );
    }
}
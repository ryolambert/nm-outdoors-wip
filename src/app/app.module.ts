import {NgModule} from "@angular/core";
import {HttpClientModule} from "@angular/common/http";
import { AngularSplitModule } from 'angular-split';
import {BrowserModule} from "@angular/platform-browser";
import {AppComponent} from "./app.component";
import {allAppComponents, appRoutingProviders, routing} from "./app.routes";
import {ReactiveFormsModule} from "@angular/forms";
import {NguiMapModule} from "@ngui/map";
import {NgxPaginationModule} from "ngx-pagination";

// import { AgmCoreModule } from '@agm/core';


const moduleDeclarations = [AppComponent];

@NgModule({
	imports:      [ AngularSplitModule, BrowserModule, HttpClientModule, NguiMapModule.forRoot({apiUrl: 'https://maps.google.com/maps/api/js?key=AIzaSyBMQE2mPIzXsRIbSUWzBUwiJrdrp80Xkqc'}), routing, ReactiveFormsModule, NgxPaginationModule],
	declarations: [...moduleDeclarations, ...allAppComponents],
	bootstrap:    [AppComponent],
	providers:    [...appRoutingProviders]
})
export class AppModule {}


// import { BrowserModule } from '@angular/platform-browser';
// import { NgModule } from '@angular/core';
//
// import { AgmCoreModule } from '@agm/core';
// import {FormsModule, ReactiveFormsModule} from '@angular/forms';
//
// import { AppComponent } from './app.component';
// import { MapComponent } from '../../../../../../../explore/map/map.component';
// import { PanelComponent } from '../../../../../../../explore/panel/panel.component';
//
// import { MapsService } from './maps.service';
// import { LocationsService } from './locations.service';
//
//
// @NgModule({
// 	declarations: [
// 		AppComponent,
// 		MapComponent,
// 		PanelComponent
// 	],
// 	imports: [
// 		BrowserModule,
// 		AgmCoreModule.forRoot({
// 			apiKey: 'AIzaSyB3a71eakX1ji_aFPmQpGf5gWD278RRl4o',
// 			libraries: ['places']
// 		}),
// 		FormsModule,
// 		ReactiveFormsModule
// 	],
// 	providers: [LocationsService, MapsService],
// 	bootstrap: [AppComponent]
// })
// export class AppModule { }

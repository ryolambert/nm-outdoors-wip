import {NgModule} from "@angular/core";
import {HttpClientModule} from "@angular/common/http";
import {BrowserModule} from "@angular/platform-browser";
import {AppComponent} from "./app.component";
import {allAppComponents, appRoutingProviders, routing} from "./app.routes";
import {FormsModule, ReactiveFormsModule} from "@angular/forms";
// import {NguiMapModule} from "@ngui/map";
import {NgxPaginationModule} from "ngx-pagination";
import {JwtModule} from "@auth0/angular-jwt";
import {FileUploadModule} from "ng2-file-upload";
import { AgmCoreModule } from '@agm/core';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';


const moduleDeclarations = [AppComponent];

const jwtHelper = JwtModule.forRoot({
	config:{
		tokenGetter: ()=>{
			return localStorage.getItem("jwt-token");
		},
		skipWhenExpired:true,
		whitelistedDomains: ["localhost:7272", "https://bootcamp-coders.cnm.edu/"],
		headerName:"X-JWT-TOKEN",
		authScheme: ""
	}});

@NgModule({
  imports: [
    AgmCoreModule.forRoot({
      apiKey: "AIzaSyB3a71eakX1ji_aFPmQpGf5gWD278RRl4o",
      libraries: ["places"]
		}),
		BrowserAnimationsModule,
    BrowserModule,
    FormsModule,
    HttpClientModule,
    jwtHelper,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyB3a71eakX1ji_aFPmQpGf5gWD278RRl4o',
      libraries: ['places']
    }),
    routing,
    ReactiveFormsModule,
    NgxPaginationModule,
    FileUploadModule
  ],
  declarations: [...moduleDeclarations, ...allAppComponents],
  bootstrap: [AppComponent],
  providers: [...appRoutingProviders]
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
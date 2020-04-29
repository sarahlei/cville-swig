import { Component } from '@angular/core';
//import { Order } from './order';
import { Review } from  './review';
//import { Observable } from 'rxjs';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Reviews';
  ///authors = '';

  constructor(private http: HttpClient) {   }


 /// drinks = ['Coffee', 'Tea', 'Milk'];
  reviewModel = new Review('','');

  responsedata = new Review('','')
  confirm_msg = '';
  data_submitted = '';

  confirmPost(data) {
     console.log(data);
     this.confirm_msg = 'Thank you! Your review has been submitted. ';
     this.confirm_msg += '. Here is what you said: ' + data.review;
  }


  // Assume we want to send a request to the backend when the form is submitted
  // so we add code to send a request in this function

  onSubmit(form: any): void {
     console.log('You submitted value: ', form);
     this.data_submitted = form;

     // Convert the form data to json format
     ///let params = JSON.stringify(form);

     // To send a GET request, use the concept of URL rewriting to pass data to the backend
     // this.http.get<Order>('http://localhost/cs4640/inclass11/ngphp-get.php?str='+params)
     // To send a POST request, pass data as an object
     this.http.post<Review>('http://localhost/cville-swig/reviews.php', this.reviewModel)
     .subscribe((data) => {
          // Receive a response successfully, do something here
          // console.log('Response from backend ', data);
          this.responsedata = data;
          console.log(data);
          // assign response to responsedata property to bind to screen later
     }, (error) => {
          // An error occurs, handle an error in some way
          console.log('Error ', error);
     })
  }
}

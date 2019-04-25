$(function () {
	'use strict';
//hide Placeholderon Form Focus
$('[placeholder]').focus(function(){
	$(this).attr('data-text',$(this).attr('placeholder'));
	$(this).attr('placeholder','');
})
 .blur (function(){
 	$(this).attr('placeholder',$(this).attr('data-text'));
 });
 //Add Asterisk on required field 
 

/*asterisk S start*/
 $('input').each(function(){
 	if ($(this).attr('required')==='required'){
 		 $(this).after('<span class="asterisk">*</span>');
 	}
 });





 $('input').each(function(){
  if ($(this).attr('required')==='requiredL'){
     $(this).after('<span class="asteriskL">*</span>');
  }
 });
 /*asterisk S end*/


 // convert password field to text field on Hover
   
   var passfield = $('.password');
   $('.show-pass').hover (function(){
    
    passfield.attr('type' , 'text');

   } , function(){
    passfield.attr('type' , 'password');
   });
   
   //////////////////////////////////////////*Confirm Message to Delete*//////////////////////////////////
       $('.confirm').click (function(){
       	return confirm('Are You Sure?');
       });
});
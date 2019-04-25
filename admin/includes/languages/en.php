<?php
 function lang($phrase)
{
   static $Lang = array
    (
    	'lang'          => 'lang',
	  'Mess'            => "WELOCME",
	  'ADMIN'           => "ADMINISTRATOR",
	  'BOSS'            =>"Abdu",           /*dash board words 1*/
	  'lang1'           =>"عربى",
	  'lang2'           =>"EN",  
	  'edit'            =>"EDIT PROFILE",
	  'sign_out'        =>"SIGN OUT",
	  'sign_in'         =>"SIGN IN",
	  'ab'              =>"HOME",
	  'query'           => "QUERY",
	  'manage'          => 'MANAGE',   
	  'modify'          =>"Update",        /*dash board words 2*/
	  'add'             =>'INSERT',
	  'remove'          =>'Delete'
	  );
   return $Lang[$phrase];
}

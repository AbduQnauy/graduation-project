<?php
     // include important file 
    
    include 'configconnect.php';    // include database connection file
  
    // Routes
    //$imgROU='includes/images/';         // outer image route


     $func='includes/functions/'; 
    require_once $func . 'function.php';

      
     
      

    $enfile='includes/languages/';
    /*switchlang($_GET['lang']);*/
    require_once $enfile . "en.php";    // ENGISH FILE LANGUAGE
    //require $enfile . "ar.php";    // ARABIC FILE LANGUAGE
      
      
     
        
    
    
      //$func='includes/functions/'; 
      //require $func . 'function.php';
   
    

    //require $enfile . "en.php";       // ENGLISH FILE LANGUAGE
    //require $enfile . "ar.php";    // ARABIC FILE LANGUAGE


    $css='layout/css/';     // include css && js  design file   
	$js='layout/js/';    

    // Routes
    //$func='includes/functions/';          //  include function file directory 
    //require $func . 'function.php';
    $tpl= 'includes/templates/';        //templates directory
    require $tpl . "header.php";       // HEADER FILE
    
    /*    require $tpl . "footer.php";      // FOOTER FILE       this is my error   */

      
     

    if (!isset($noNavbar)){

                        /* if (isset($_SERVER['REQUEST_METHOD']))
                             { 
                                $_GET['lang']=$_SERVER['REQUEST_METHOD']
                                $do=$_GET['lang'];

                              switchlang($do);
                              }*/
                           
                           /*require_once $enfile . "en.php";*/
                           require $tpl . "navbar.php";
                           //require $func . 'function.php';
                           /*switchlang();*/

                           }
	
    
	    
     
        
    /*?>    nice but may make error*/
     

     /* 
     echo $row['user_reg_name'] . '<br>' . $row['password'] . '<br>' . $row['e_mail'] . '<br>' . $row['user_full_name'] ;



     */
  
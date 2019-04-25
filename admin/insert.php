<?php
   


session_start();                                                                     // start session
  //print_r($_SESSION); 
 $title='INSERT page';                                                             // title variable
  //$title='USER EDIT';                                                           //  declare title variable 
  if (isset($_SESSION['username']))
  {
  	require'init.php';                                                          // this is the first companion of our script
  	$do= isset ($_GET['do'])? $_GET['do']: 'MANAGE' ;                          // if statement by shortcut
  		  
 /////////*switch statement for check*///////////////

        switch ($do)
	   {
	    case 'MANAGE':
	     header('location: dashboard.php');
	     break;

      case 'insert':
  		 //echo 'Hello my insert page';
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////  		 
?>



 <div style="font-size:50px;color:black"><h2 class='text-center'>  <b> INSERT RECORD </b>  </h2></div>
             <div class='container'> 
             
              
                  
                 
                  
                 <!-- <tr><td><a href='insertrecemp.php?do=tecemp'><input class='btn btn-lg btn-primary btn-block' type='text' name='techemp' 
                    value='technical employee' /></a></td></tr>-->


                  <div style="padding-left:150px;"><a href='insertrecemp.php?do=equi'><input style='height:150px;width:80%;'  class=' btn btn-lg btn-primary ' type='text' name='equip'
                   value='equipment' /></a></div>


                      <!--very important form-->

                  


                     


                     <!--<a href='#'> <input class='btn btn-primary' type='text' name='Upload'
                   value='Upload' /></a> -->     <!--upload button-->


                        


                <div style="padding-left:150px;padding-top:10px"  >   <a href='insertrecemp.php?do=equmaint'><input class='btn btn-lg btn-primary ' style='height:150px;width:80%;' type='text' name='equmaint'
                   value='equ. Maintenance' /></a></div>

                 <div style="padding-left:150px;padding-top:10px"><a href='insertrecemp.php?do=equcalib'><input class='btn btn-lg btn-primary ' style='height:150px;width:80%;' type='text' name='equcalib'
                   value='equ. Calibration'/></a></div>
                                                  
               
              
            </div>        








  <!--//////////////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////-->
         



<!--<a href='?do=REMOVE&userid= " . $row['id'] . "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>"-->
<?php
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////
/////////////////////////////////////**///////////////////////////////////////////////////////////////////////      
       break;

  		default:
  		 header('location: dashboard.php');
  		 break;
  		}
  		require $tpl . "footer.php" ;                                    // FOOTER FILE    // this is the second companion of our script
  }
  else 
  {
    header('location:index.php');
  }      
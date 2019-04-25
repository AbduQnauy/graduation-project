<?php
   


session_start();                                                                     // start session
  //print_r($_SESSION); 
 $title='INSERT page';                                                             // title variable
  //$title='USER EDIT';                                                           //  declare title variable 
  if (isset($_SESSION['username']))
  {
  	require'init.php';                                                          // this is the first companion of our script
  	$do= isset ($_GET['do'])? $_GET['do']: 'MANAGE' ;                          // if statement by shortcut
  		  
     $eqs= isset($_GET['eqs']) && is_numeric($_GET['eqs'])? intval($_GET['eqs']): 0 ;
     $dep= isset($_GET['dep']) && is_numeric($_GET['dep'])? intval($_GET['dep']): 0 ;

  		  switch ($do)
  		  {
             case 'MANAGE':
             header ('location : dashboard.php');
             break;
  		  //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////

        case 'deldep':
        

           $stmt=$con->prepare('SELECT equipserial  FROM equip WHERE dephaveNO =?');
           $stmt->execute(array($dep));
           $serial= $stmt->fetchAll();
           $eye=$stmt->rowCount();
           if ($eye >0){

             //$serial1=$serial;

           $stmt=$con->prepare('DELETE  FROM equip WHERE dephaveNO =?');
           $stmt->execute(array($dep));
           $count=$stmt->rowCount();

           
           if ($count >0){
            //echo 'DONE';
               //$serial2=$serial1;
            $stmt2=$con->prepare('DELETE  FROM dep WHERE dephaveNO =?');
                         $stmt2->execute(array($dep));

           
           $count2=$stmt2->rowCount();
           if ($count2>0)
           {
                  //$serial3=$serial2;
                    foreach($serial as $s)
                                         {
                     $stmt=$con->prepare('DELETE  FROM equipcalib WHERE equipserial =?');
                         $stmt->execute(array($s['equipserial']));
                                          }
                       //$count3=$stmt->rowCount();
                        if (0==0)
                        {
                          foreach($serial as $s)
                          {
                          //$serial4=$serial3;
                          $stmt=$con->prepare('DELETE  FROM equipmaint WHERE equipserial =?');
                         $stmt->execute(array($s['equipserial']));
                           }
                        }
           
           
           }
                         

            
             echo '<div class="alert alert-success">'  . ' Department Deleted successfully ' .' '.' :)</div>';
                   reDir('query.php?do=query',1);        /////////////******depart******///////////////
                   //reDir('query.php?do=dephave&equipM=' .  $dephave , 1 );
           }
           } 
           /*} thanks very much to my merciful GOD*/
          break;
            //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 


        case 'mod':

        //$eqs= isset($_GET['eqs']) && is_numeric($_GET['eqs'])? intval($_GET['eqs']): 0 ;
					                //echo 'hello mod' . $eqs;                       /*stmt test*/
					                $stmt= $con->prepare ('SELECT 
					                                   *
					                             FROM   
					                                   equip 
					                             WHERE 
					                                   equipserial =?  
					                             ');                                   
					      $stmt->execute(array($eqs));                          // Execute SQL commands
					       $row=$stmt->fetch();
                 $count= $stmt->rowCount();                                           //count Query' records
					       //echo $count;                                           //print NO. of Query' records      //this is our helper
					       
					       


					      
         if($count>0)
         	{ ?>
             <h1 class='text-center'>EDIT EQUIPMENT</h1>
             <div class='container'>
               <form class='form-horizontal' action='?do=queUpdate' method='POST'>
                 <!--start user name field-->
                 <input type='hidden' name='equipserial' value='<?php echo $eqs?>'/> 
                 <div class='form-group form-group-lg'>
                 	<label class='col-sm-2 control-label'>Equi.Name</label>
                 	<div class='col-sm-10 col-sm-4'>
                 		<input type='text' name='equipname' value='<?php echo $row['equipname']; ?>' class='form-control' 
                    required='required'/>
                 	</div>
                 </div>
                  <!--end user name field-->
                  <!--start password field-->
                 <div class='form-group form-group-lg'>
                 	<label class='col-sm-2 control-label'>Model</label>
                 	<div class='col-sm-10 col-sm-4'>
                 		
                    <input type='text' name='model' class='form-control'  value='<?php echo $row['model']; ?>' 
                    class='form-control'/>
                 	</div>
                 </div>
                  <!--end password field-->
                  <!--start userfullname field-->
               <!--  <div class='form-group form-group-lg'>
                 	<label class='col-sm-2 control-label'>Equip Type</label>
                 	<div class='col-sm-10 col-sm-4'>
                 		<input type='text' name='equiptype' value='<?php //echo $row['equiptype'] ;?>' 
                    class='form-control'  required='required'/>
                 	</div>
                 </div>-->
                  <!--end userfullname field-->
                  <!--start email field-->
                 <div class='form-group form-group-lg'>
                 	<!--<label class='col-sm-2 control-label'>Department have</label>-->
                 	<div class='col-sm-10 col-sm-4'>
                 		<input type='hidden' name='dephave' value='<?php echo  $row['dephaveNO']; ?>' class='form-control' />   
                 	</div>
                 </div>
                  <!--end email field-->
                  <div class='form-group form-group-lg'>
                 	<label class='col-sm-2 control-label'>Purchase price</label>
                 	<div class='col-sm-10 col-sm-4'>
                 		<input type='text' name='purprice' required='required' autocomplete='off' value='<?php echo  $row['purprice']; ?>' class='form-control' />   <!--data validation by client side-->
                 	</div>
                 </div>
                  <!--start submit field-->
                 <div class='form-group form-group-lg'>
                 	<!--<label class='col-sm-2 control-label'>UPDATE</label>-->
                 	<div class='col-sm-offset-2 col-sm-10'>
                 		<input type='submit' value='UPDATE' class='btn btn-lg btn-primary ' />
                 	</div>
                 </div>
                  <!--end submit field-->
           </form>
     </div>
          <?php
         	 
         	 }
         	 /*else
         	 {
         	 	 header('location: dashboard.php');

         	 }*/




             break;




          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
             
         
         case 'queUpdate' :
          

          if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {           

           //echo '<div class="container" >';
          /////////////////*   Get variable from the FORM  *///////////////////
              $equipserial=$_POST['equipserial'];
              $equipname=$_POST['equipname'];
              $model=$_POST['model'];
             // $upass=$_POST['pass'];
              //$hashedupass=sha1($upass);
              //$equiptype=$_POST['equiptype'];
              $dephave=$_POST['dephave'];
              $purprice=$_POST['purprice'];

             
             

              $formErrors=array();
             // Validation the form from server side
              if ($purprice == 0)
              {
                $formErrors[]='You can\'t Buy by <strong> 0 L.E.</strong>';
              }
              
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo '<div class="alert alert-danger">' . $error . '</div>';
                reDir('querymoddel.php?do=mod&eqs= ' . $equipserial  ,1);        ///////////***ser**dep**depart***//////////
             }

             //check IF there no formError

             if (empty($formErrors))
             {
             
              
                  $stmt= $con->prepare('UPDATE equip SET equipname=? , model= ? ,  
                  	purprice=? WHERE equipserial =? ');
                  $stmt->execute(array($equipname,$model,$purprice,$equipserial));
                  $check=$stmt->rowCount();
                  if ($check>0)
                  {
                    echo '<div class="alert alert-success">' . $stmt->rowCount() . ' Equipment Updated :)</div>';
                      reDir('query.php?do=query', 1);      /////////*****ser**dep* depart**//////////
                      //query.php?do=dephave&equipM=' .  $dephave
                  }else 
                  {
                     echo '<div class="alert alert-warning">' . $stmt->rowCount() . ' Equipment Updated :)</div>';
                      reDir('back', 1);
                  }
                  
                  
                      /*query.php?do=departQuery*/
              
              }
              
             }
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
             // Validation the form from client side stop
          
         else
         {
          //echo 'Sorry you can\'t browse this page directly';
         header('location:dashboard.php');
         }
          
      
         break;





  
   
            //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 
            
            case 'modcal':

            //$eqs=$_GET['eqs'];

            //echo $eqs;
            
            /*$stmt=$con->prepare("SELECT notation3 FROM equipcalib WHERE equipserial=?");
              $stmt->execute(array($eqs));
              $res=$stmt->fetch();*/

            ?>
            <h1 class='text-center'>EDIT Calib. Record</h1>
             <div class='container'>
               <form class='form-horizontal' action='?do=modcalUpdate' method='POST'>
                 <!--start user name field-->
                  
              <input type='hidden' name='equipserial' value='<?php echo $eqs;?>'/>
              <input type='hidden' name='dep' value='<?php echo $dep;?>'/>



                 <div class='form-group form-group-lg'>


                  <label class='col-sm-2 control-label'>Last Notation</label>
                  <div class='col-sm-10 col-sm-4'>


                   <!--
                    <input type='text' name='last' value='<?php echo $res[0];?>' class='form-control' 
                    required='required'/>
                    -->

                   
                    <TEXTAREA name='last' value='' class='form-control'  required='required'   ></TEXTAREA>
                  
                    <div class='form-group form-group-lg'>
                  <!--<label class='col-sm-2 control-label'>UPDATE</label>-->
                  <div class='col-sm-offset-2 col-sm-10'>
                   <div> <input type='submit' value='UPDATE' style='margin-top:20px' class='btn btn-lg btn-primary ' /></div>
                  </div>
                 </div>
                 

                  </div>
                 </div>
               </form>
             </div>

           <?php break;

   

                case 'modcalUpdate':
                  //echo 'hello';
                $serial=$_POST['equipserial'];
                $dep=$_POST['dep'];
                $last=$_POST['last'];
                
                
                $stmt=$con->prepare('UPDATE equipcalib SET notation3=? WHERE equipserial=?  ');
                $stmt->execute(array($last,$serial));
                $ok=$stmt->rowCount();
                if ($ok>0){
                echo '<div class="alert alert-success">'  . 
                   ' Edit Calibration Done Succefully ' .' '.' :)</div>';
                   //echo $dep;
                      //reDir('back', 1);
                      reDir('query.php?do=cal&wan=' . $serial, 1); //////////*****ser****dep**depart**/////////
                      //'query.php?do=caldep&dep=' . $dep
                   }
                break;


        //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 
              case 'delcal':
             

                    $stmt= $con->prepare ('DELETE FROM equipcalib WHERE equipserial = ? ');                                   
                     $stmt->execute(array($eqs));                          // Execute SQL commands
                    $count= $stmt->rowCount();      
                     if ($count>0)
                     {
                      echo '<div class="alert alert-success">' . 'Calibration Record Deleted Successfully' .' '.' :)</div>';
                     //reDir('query.php?do=cal&wan=' . $eqs, 1);
                     if ($dep!=0){reDir('query.php?do=caldep&dep=' . $dep);}        //////*****depart******//////////
                     else{
                     reDir('query.php?do=query',1);  ///////////////*****ser***dep*******////////////
                     }
                     // 'query.php?do=caldep&dep=' . $dep
                     //query.php?do=query',1
                     }
                     break;
               //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 

                     case 'delmain':
             

                    $stmt= $con->prepare ('DELETE FROM equipmaint WHERE `op.No.` = ? ');                                   
                     $stmt->execute(array($eqs));                          // Execute SQL commands
                    $count= $stmt->rowCount();      
                     if ($count>0)
                     {
                      echo '<div class="alert alert-success">' . 'Maintenance Record Deleted Successfully' .' '.' :)</div>';
                     reDir('back',1);                  ///////////////*****ser**dep**depart**////////////
                     }
                     break;
               //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 

              case 'del':
                // echo 'hello del' . ++$eqs;               /*stmt test*/
              
               

             $stmt= $con->prepare ('SELECT dephaveNO FROM equip WHERE equipserial = ?  ');
             $stmt->execute(array($eqs));
             $row=$stmt->fetch();
             $count= $stmt->rowCount();
             if ($count>0)
            {

                    

               $stmt= $con->prepare ('DELETE 
                                   
                                     FROM   
                                           equip  
                                     WHERE 
                                           equipserial = ?  
                                    ');                                   
      $stmt->execute(array($eqs));                          // Execute SQL commands
       $count= $stmt->rowCount();      
           if ($count>0) 
           {

            
            $stmt= $con->prepare ('DELETE FROM equipmaint WHERE equipserial = ? ');                                   
      $stmt->execute(array($eqs));                          // Execute SQL commands
       //$count= $stmt->rowCount();      
           if (0==0)

            
           {

           $stmt= $con->prepare ('DELETE FROM equipcalib WHERE equipserial = ? ');                                   
      $stmt->execute(array($eqs));                          // Execute SQL commands
       //$count= $stmt->rowCount();      
           if (0==0)
            
           {
           
            $count1=$count;
            $check=$row['dephaveNO'];
            $stmt= $con->prepare ('SELECT * FROM equip WHERE dephaveNO = ?  ');
            $stmt->execute(array($check));

             $count= $stmt->rowCount();
             if ($count>0)
            {
              echo '<div class="alert alert-success">' . $count1 . ' Equipment Deleted' .' '.' :)</div>';
               
                reDir('query.php?do=query',1); //////////********ser***dep**depart**/////////
                //reDir('query.php?do=dephave&equipM=' . $check , 1 );       
            }
          else
            {
             $stmt= $con->prepare ('DELETE FROM dep WHERE dephaveNO = ?  ');
            $stmt->execute(array($check)); 
            }


             echo '<div class="alert alert-success"> Last Equipment Deleted' .' '.' :)</div>';
                reDir('query.php?do=query', 1);       //////////////*******ser***dep****depart***////////////////
           
           }
           
           }


            



            
           



           } 
           /*else
           {
               header('location: dashboard.php');

           }*/
        }

              break;
               

          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////




               default:
	    header('location: index.php');
	  	
	    break;


 	  }

          require $tpl . "footer.php" ;
   
    }
  else 
  {
    header('location:index.php');#
    exit();
  }      		  
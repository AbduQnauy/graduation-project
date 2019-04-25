<?php
 session_start();                      // start session
  //print_r($_SESSION); 
 $title='MANAGE BOARD';                // title variable
  //$title='USER EDIT';                   //  declare title variable 
  if (isset($_SESSION['username']))
  {
  	//$title='USER EDIT';
    require'init.php';    // this is the first companion of our script
    //$title='USER EDIT';
    
    $do= isset ($_GET['do'])? $_GET['do']: '' ;   // if statement by shortcut
  
	   switch ($do)
	   {
	    case 'MANAGE':
	    
       
       if ($_SERVER['REQUEST_METHOD']== 'GET')    //end of MANAGE PAGE design &// check if i come from Add page or NOT 
       {
           $stmt=$con->prepare("SELECT * FROM user /*WHERE rank=0*/");   //select all user except ADMIN users
           $stmt->execute();

           $rows=$stmt->fetchAll();                            // Conversion fetched data to variables     
            
            
           ?>
           <h1 class='text-center'>MANAGEMENT</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>#ID</td>
                   <td>Username</td>
                   <td>Contact</td>
                   <td>Fullname</td>
                   <!--<td>Sign Up date</td>-->
                   
                  </tr>
                      <?php 
                           foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['id'] .             '</td>';
                            echo '<td>' . $row['user_reg_name'] .  '</td>';
                            echo '<td>' . $row['contact'] .         '</td>';
                            echo '<td>' . $row['user_full_name'] . '</td>';
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            /*echo '<td>' . "<a href='?do=MODIFY&userid= " . $row['id'] . 
                            "' class=' btn s-table-btn btn-success'><i class='fa fa-edit'></i> Edit </a>
                                           <a href='?do=REMOVE&userid= " . $row['id'] .
                           "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>"
                               . '</td>'; */          
                            

                            echo '</tr>';
                           }
                      ?>
                  
                       
                
     

                </table>
             </div>
            <a href='?do=Add' class='btn view-btn btn-primary'><i class='fa fa-plus'> </i> NEW USER</a>
            </div>
            
       <?php }
       else                                    //end of MANAGE PAGE design 
       {
        header('location: dashboard.php');
       }
	    break;
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////
	    case 'MODIFY':  // MODIFY coupled with Update
      
       //echo 'WELCOME to MODIFY page your ID is ' . $_GET['userid'];     // stmt test
        
         
        $userid= isset($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']): 0 ;
        //echo $userid;
         
         $stmt= $con->prepare ('SELECT 
                                   *
                             FROM   
                                   user 
                             WHERE 
                                   id =?  
                             ');                                   
      $stmt->execute(array($userid));                          // Execute SQL commands
       $count= $stmt->rowCount();                                           //count Query' records
       //echo $count;                                           //print NO. of Query' records      //this is our helper
       
       $row=$stmt->fetch();
         if($count>0)
          { ?>
             <h1 class='text-center'>EDIT USER</h1>
             <div class='container'>
               <form class='form-horizontal' action='?do=Update' method='POST'>
                 <!--start user name field-->
                 <input type='hidden' name='userid' value='<?php echo $userid?>'/> 
                 <div class='form-group form-group-lg'>
                  <label class='col-sm-2 control-label'>UserName</label>
                  <div class='col-sm-10 col-sm-4'>
                    <input type='text' name='username' value='<?php echo $row['user_reg_name'] ?>' class='form-control' autocomplete='off' required='required'/>
                  </div>
                 </div>
                  <!--end user name field-->
                  <!--start password field-->
                 <div class='form-group form-group-lg'>
                  <label class='col-sm-2 control-label'>Password</label>
                  <div class='col-sm-10 col-sm-4'>
                    <input type='hidden' name='oldpass' value='<?php echo $row['password']?>'/>
                    <input type='password' name='newpass' class='password form-control' autocomplete='new-password'  placeholder='change  or leave blank'/>
                     
                     <i class="show-pass fa fa-eye fa-2x"></i>

                  </div>
                 </div>
                  <!--end password field-->
                  <!--start userfullname field-->
                 <div class='form-group form-group-lg'>
                  <label class='col-sm-2 control-label'>FullName</label>
                  <div class='col-sm-10 col-sm-4'>
                    <input type='text' name='fullname' value='<?php echo $row['user_full_name'] ;?>' class='form-control' autocomplete='off' required='required'/>
                  </div>
                 </div>
                  <!--end userfullname field-->
                  <!--start email field-->
                 <div class='form-group form-group-lg'>
                  <label class='col-sm-2 control-label'>Contact</label>
                  <div class='col-sm-10 col-sm-4'>
                    <input type='text' name='contact' value='<?php echo  $row['contact']; ?>' class='form-control' autocomplete='off' required='required'/>   <!--data validation by client side-->
                  </div>
                 </div>
                  <!--end email field-->
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
           else
           {
             header('location: dashboard.php');
           }
        
        

      break;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////
      
      
     case 'Update':   //Update coupled with  MODIFY
         if ($_SERVER['REQUEST_METHOD']== 'POST')
         {
           echo '<h1 class="text-center">UPDATE USER</h1>'; 
           echo '<div class="container" >';
          /////////////////*   Get variable from the FORM  *///////////////////
              $uid=$_POST['userid'];
              $uname=$_POST['username'];
              $contact=$_POST['contact'];
             // $upass=$_POST['pass'];
              //$hashedupass=sha1($upass);
              $ufullname=$_POST['fullname'];

              // password TRICK function start
              $trickpass='';
              $trickpass=(empty($_POST['newpass']))? $_POST['oldpass'] : sha1($_POST['newpass']);  //short if stmt
             /* if (empty($_POST['newpass']))
              {
                $trickpass=$_POST['oldpass'];
                
              } else
              {
                $trickpass=sha1($_POST['newpass']);
                
              }*/
               // password TRICK function end

              $formErrors=array();
             // Validation the form from server side
              if (strlen($uname)<4)
              {
                $formErrors[]='UserName must Be More Than <strong>4 characters</strong>';
              }
              if (strlen($uname)>20)
              {
                $formErrors[]='UserName must Be Less Than <strong>20 characters</strong>';
              }
              
              /*if (empty($uname))              // you make them in the past as "required"
              {
               $formErrors[]='You can\'t empty <strong>UserName</strong> box';
              }
             
             if (empty($contact))              // you make them in the past as "required"
             {
                  
              $formErrors[]='You can\'t empty <strong>Contact</strong> box';  
             }*/
              /*if (empty($ufullname))            // you make them in the past as "required"
             {
             $formErrors[]='You can\'t empty <strong> FullName</strong> box';
             } */
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo '<div class="alert alert-danger">' . $error . '</div>';
                  reDir('back',1);
             }


             //check IF there no formError

             if (empty($formErrors))
             {
             /* $check=noRedun('user_reg_name','user',$uname);
              if($check==0)
              {*/
                  $stmt= $con->prepare('UPDATE user SET user_reg_name=? , contact= ? , password=? , user_full_name=? WHERE id =? ');
                  $stmt->execute(array($uname,$contact,$trickpass,$ufullname,$uid));
                  echo '<div class="alert alert-success">' . $stmt->rowCount() . ' User Updated Successfully :)</div>';
                  reDir('dashboard.php',1);
              /*}else
              {
                echo '<div class="alert alert-danger">' . 'SORRY you Updated to UserName Already Exist' .' '. ':(' .'</div>'; 
              }*/
             
             }
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
             // Validation the form from client side stop
         } 
         else
         {
          //echo 'Sorry you can\'t browse this page directly';
         header('location:dashboard.php');
         }
          echo '</div>';
         break;

       

       ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////

      case'Insert':     // Insert coupled with Add
	    if ($_SERVER['REQUEST_METHOD']== 'POST')
         {
           echo '<h1 class="text-center">UPDATE USER</h1>'; 
           echo '<div class="container" >';
          /////////////////*   Get variable from the FORM  *///////////////////
              $uname=$_POST['username'];
              $contact=$_POST['contact'];
              $upass=sha1($_POST['pass']);
              //$hashedupass=sha1($upass);
              $ufullname=$_POST['fullname'];
              $rank=1;

              
             /* if (empty($_POST['newpass']))
              {
                $trickpass=$_POST['oldpass'];
                
              } else
              {
                $trickpass=sha1($_POST['newpass']);
                
              }*/
               // password TRICK function end

              $formErrors=array();
             // Validation the form from server side

               $check=noRedun('user_reg_name','user',$uname);

              if ($check!=0)
              {
               $formErrors[]=  'UserName you Entered is already<strong> Existed</strong>' .' '. ':(' ;
              }





              if (strlen($uname)<4)
              {
                $formErrors[]='UserName must Be More Than <strong>4 characters</strong>';
              }
              if (strlen($uname)>20)
              {
                $formErrors[]='UserName must Be Less Than <strong>20 characters</strong>';
              }
              /*if (empty($uname))              // you make them in the past as "required"
              {
               $formErrors[]='You can\'t empty <strong>UserName</strong> box';
             }
             if (empty($uemail))              // you make them in the past as "required"
             {
                  
              $formErrors[]='You can\'t empty <strong>Email</strong> box';  
             }
              if (empty($ufullname))            // you make them in the past as "required"
             {
             $formErrors[]='You can\'t empty <strong> FullName</strong> box';
             } */
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo '<div class="alert alert-danger">' . $error . '</div>';
                reDir('back');
             }

             //check IF there no formError

             if (empty($formErrors))
             {
             // $dbtable='user';
              //$dbcell='user_reg_name';
                                                    ///////////////////**Use noRedun  start**///////////////
                $stmt= $con->prepare('INSERT INTO
                                                user (user_reg_name , contact , password , user_full_name,rank)
                                     
                                     VALUES (:zur,:ze,:zp,:zuf,:r)');
                                     
             $stmt->execute(array(':zur'  =>$uname,
                                  ':ze'   =>$contact,
                                  ':zp'   =>$upass,
                                  ':zuf'  =>$ufullname,
                                  ':r'    =>$rank
                                  ));
             $ok=$stmt->rowCount();
             if ($ok>0)
             {
             echo '<div class="alert alert-success">' . $stmt->rowCount() . 'User Inserted Successufully' .' '.' :)</div>';
               reDir('user.php?do=MANAGE',1);
             }           
                            
                            ///////////////////**Use noRedun  End**///////////////
               
             }
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
             // Validation the form from client side stop
         } 
         else
         {
          //echo 'Sorry you can\'t browse this page directly';
         header('location:dashboard.php');
         }
          echo '</div>';
	    break;
      

       ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////
	    

      case'Add':    //Add coupled with Insert
	    //echo 'WELCOME TO INSERT PAGE';
	           
                ?><h1 class='text-center'>ADD USER</h1>
        <div class='container'>
        <form class='form-horizontal' action='?do=Insert' method='POST'>
           <!--start user name field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'>UserName</label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='username'  class='form-control' autocomplete='off' required='required' placeholder='NEW USER TO LOGIN'/>
            </div>
           </div>
            <!--end user name field-->
            <!--start password field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'>Password</label>
            <div class='col-sm-10 col-sm-4'>
              <input type='password' name='pass' class='password form-control' autocomplete='new-password' required='required' placeholder='COMPLEX PASSWORD'/>
              <i class="show-pass fa fa-eye fa-2x"></i>
            </div>
           </div>
            <!--end password field-->
            <!--start userfullname field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'>FullName</label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='fullname'  class='form-control' autocomplete='off' required='required' placeholder='FULL NAME ON PAGE'/>
            </div>
           </div>
            <!--end userfullname field-->
            <!--start email field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='contact'  class='form-control' autocomplete='off' placeholder='How Contact You? Mobile/E-mail/Phone'/>   <!--data validation by client side-->
            </div>
           </div>
            <!--end email field-->
            <!--start submit field-->
           <div class='form-group form-group-lg'>
            <!--<label class='col-sm-2 control-label'>UPDATE</label>-->
            <div class='col-sm-offset-2 col-sm-10'>


              <input type='submit'  value='NEW USER'  class='btn btn-lg btn-primary '/>
            </div>
           </div>
            <!--end submit field-->
        </form>                                                        
        <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->

                               <!--view btn to view end-->                                            
     </div>
<?php      break;

	    
      /////////////////////////////////////////////*REMOVE PAGE    START*///////////////////////////
        /*   case 'REMOVE':
               $userid= isset($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']): 0 ;
               //echo 'your ID= ' . $userid . "<br/>";             //stmt test
               $stmt= $con->prepare ('DELETE 
                                   
                                     FROM   
                                           user 
                                     WHERE 
                                           id =?  
                                    ');                                   
      $stmt->execute(array($userid));                          // Execute SQL commands
       $count= $stmt->rowCount();      
           if ($count>0) 
           {
             echo '<div class="alert alert-success">' . $count . 'Record Deleted' .' '.' :)</div>';
           } else
           {
               header('location: dashboard.php');
           }
           break;*/
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////*REMOVE PAGE    END*//////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////     
      default:
	    header('location: index.php');
	  	//exit();
	    break;
	   }
     ///////////////////////////////////////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////////////////////////
     /*leave switch statement*/
     ///////////////////////////////////////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////////////////////////
   require $tpl . "footer.php" ;      // FOOTER FILE    // this is the second companion of our script
    
   }
   else
   {
    header('location: index.php');
   	exit();
   }

 
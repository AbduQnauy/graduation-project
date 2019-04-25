<?php
   


session_start();                                                                     // start session
  //print_r($_SESSION); 
 $title='insert page';                                                             // title variable
  //$title='USER EDIT';                                                           //  declare title variable 
  if (isset($_SESSION['username']))
  {
    require'init.php';                                                          // this is the first companion of our script
    $do= isset ($_GET['do'])? $_GET['do']: 'MANAGE' ;                          // if statement by shortcut
        switch ($do)
     {
      case 'MANAGE':
       header('location: dashboard.php');
       break;
          
          //////////////////////////////////////////*****///////////////////////////////////////////////
     


      /*
      case 'tecemp':
       //echo 'Hello my tecemp page';     /////////stmt test
        
        ?>

        <h1 class='text-center'></h1>
        <div class='container'>
        <form class='form-horizontal' action='?do=techempInsert' method='POST'>
           
           <!--start user name field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='techempname'  class='form-control' autocomplete='off' required='required' placeholder='Tech Emp Name'/>
            </div>
           </div>
            <!--end user name field-->
            
            <!--start password field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='ssn' class='form-control' autocomplete='off' required='required' placeholder='Social Security No.'/>
              
            </div>
           </div>
            <!--end password field-->
            <!--start userfullname field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='Empid'  class='form-control' autocomplete='off' required='required'
               placeholder='Identifier No.'/>
            </div>
           </div>
            <!--end userfullname field-->
            <!--start email field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='email' name='email'  class='form-control'  placeholder='VALID Email'/>   <!--data validation by client side-->
            </div>
           </div>
            <!--end email field-->

            <!--start email field-->
           <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='phone'  class='form-control'  required='required' 
              placeholder='VALID Phone No.'/>   <!--data validation by client side-->
            </div>
           </div>
            <!--end email field-->
               
            <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <!--<input type='text' name='jobtype' class='form-control'  required='required'placeholder='Main Job'/>-->   <!--data validation by client side-->
           <h4> Your main job?
            <select name="jobtype" >
              <option value='null'>please choose.......?</option>
              <option value='eng'>engineer</option>
              <option value='tech'>technician</option>
            </select>
           </h4>
            </div>
           </div>

            <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='specif'  class='form-control' 
               placeholder='Technical Specification'/>   <!--data validation by client side-->
            </div>
           </div>


             
            <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='Addr'  class='form-control'  
              placeholder='Address' required='required'/>   <!--data validation by client side-->
            </div>
           </div>
            
            <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='qualif'  class='form-control'  
              placeholder='Educational certificates'/>   <!--data validation by client side-->
            </div>
           </div>
            <!--start submit field-->
            <!--<label class='col-sm-2 control-label'>UPDATE</label>-->
            <div class='form-group form-group-lg'>
              <label class='col-sm-2 control-label'></label>
            <div class='col-sm-offset-2 col-sm-10'>
              <input type='submit' value='NEW tech emp' class='btn btn-lg btn-primary ' />
            </div>
           </div>
            <!--end submit field-->
        </form>   
                                                                             
     </div>                                                     
        <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
       
     <?php
     break;
     */

///////////////////////////////////**********///////////////////////////////////////////////////////
//////////////////////////////////***********//////////////////////////////////////////////////////
      



 /*     case 'techempInsert':

      if ($_SERVER['REQUEST_METHOD']== 'POST')
         {
           echo '<h1 class="text-center"></h1>' . '<div class="container" >'; 
         
          /////////////////*   Get variable from the FORM  *///////////////////
 /*             $empname=$_POST['techempname'];
              
              $empssn=$_POST['ssn'];
              /*$empssnhashed=sha1($empssn);*/
              
  /*            $empid=$_POST['Empid'];
              $empmail=$_POST['email'];
              
              $empphone=$_POST['phone'];
              /*$empphonehashed=sha1($empphone);*/
              
   /*           $empjob=$_POST['jobtype'];
              $empspecif=$_POST['specif'];
              $empaddr=$_POST['Addr'];
              $empqualif=$_POST['qualif'];
              

              
             

              $formErrors=array();
             // Validation the form from server side
              if (strlen($empname)<4)
              {
                $formErrors[]='YourName must Be More Than <strong>4 characters</strong>';
              }
              if (strlen($empname)>20)
              {
                $formErrors[]='YourName must Be Less Than <strong>20 characters</strong>';
              }
              if (strlen($empssn)!=14)
              {
                $formErrors[]='Your Ssn# must Be = <strong> 14 characters</strong>';
              }
              
              $redun=noRedun('ssn','techemp',$empssn);
              if ($redun>0)
              {
                $formErrors[]='Ssn# you Entered is already' . '<strong> Existed</strong>' . ' '.':('  ;
              }

              $redun=noRedun('Empid','techemp',$empid);
              if ($redun>0)
              {
                $formErrors[]='ID# you Entered is already' . '<strong> Existed</strong>' . ' '.':(';
              }


              if (strlen($empphone)!=11)
              {
                $formErrors[]='Your Phone# must Be = <strong> 11 characters</strong>';
              }
              if ( $_POST['jobtype'] == 'null' )
              {
                $formErrors[]='You must choose your<strong> main job </strong>';
              }
              



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
              //$check=noRedun('ssn','techemp',$empssn);               /////////////*Calling noRedun function *///////////////
              /*if($check == 0){*/                                      ///////////////////**Use noRedun  start**///////////////
 /*               $stmt= $con->prepare('INSERT INTO
                                                techemp (techempname,ssn,Empid,email,phone,jobtype,specif,addr,qualif)
                                     
                                     VALUES (:zt,:zssn,:zE,:ze,:zp,:zj,:zs,:za,:zq)');
                                     
             $stmt->execute(array(':zt'  =>$empname,
                                  ':zssn'   =>$empssn,
                                  ':zE'   =>$empid,
                                  ':ze'  =>$empmail,
                                  ':zp'  =>$empphone,
                                  ':zj'  =>$empjob,
                                  ':zs'  =>$empspecif,
                                  ':za'  =>$empaddr,
                                  ':zq'  =>$empqualif
                                  ));
             echo '<div class="alert alert-success">' . $stmt->rowCount() . 'Employee Inserted' .' '.' :)</div>';
                reDir('back',1);
                            /*}*/    
                            /*else
                            {
                              echo '<div class="alert alert-danger">' . 'Ssn# you Entered is already Exist' .' '. ':(' .'</div>';
                            reDir('back');
                            }*/
                            ///////////////////**Use noRedun  End**///////////////
               
 /*            }
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
             // Validation the form from client side stop
 /*        } 
         else
         {
          //echo 'Sorry you can\'t browse this page directly';
         header('location:dashboard.php');
         //echo 'hello';
         
         }
          echo '</div>';
	            
      break;*/












       
        
//////////////////////////////////////////*****///////////////////////////////////////////////
//////////////////////////////////////////*****///////////////////////////////////////////////
//////////////////////////////////////////*****///////////////////////////////////////////////
//////////////////////////////////////////*****///////////////////////////////////////////////
//////////////////////////////////////////*****///////////////////////////////////////////////
//////////////////////////////////////////*****///////////////////////////////////////////////
////////////////////////////////////**************///////////////////////////////////////////////////////////
         case 'upload':
                          if(isset($_POST["submit"]))
              {
                $file = $_FILES['file']['tmp_name'];
                $handle = fopen($file, "r") or die("Problem open file");
                $c = 0;
                

                 ?>
                    <h1 class='text-center'>Downloaded Records</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                    <td>Equip. Name</td>
                   <td>Equip. Serial</td>
                   <td>Purchasing Price</td>
                   <td>Model</td>
                   <td>Equip. Type</td>
                   <td>Dep. have No.</td>
                </tr>
                 <?php

                while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                {
                  $val0 = $filesop[0];
                  $val1 = $filesop[1];
                  $val2 = $filesop[2];
                  $val3 = $filesop[3];
                  $val4 = $filesop[4];
                  $val5 = $filesop[5];
                  $val6 = $filesop[6];
                








                 $stmt=$con->prepare("SELECT * FROM equip WHERE equipserial =?");
                 $stmt->execute(array($val1));
                 $ok = $stmt->rowCount();
                    if($ok == 0)
                  {

                  $c++;
                    if ($c>1)
                  {



                  $sql=$con->prepare ("INSERT INTO equip (equipname,equipserial,purprice,model,equiptype,dephaveNO) VALUES
                   (:v1 , :v2 , :v3 , :v4 , :v5 , :v6 )");
                  $sql->execute(array(
                    ':v1' => $val0,
                    ':v2' => $val1,
                    ':v3' => $val2,
                    ':v4' => $val3,
                    ':v5' => $val4,
                    ':v6' => $val5));
                  $ok=$sql->rowCount();
                  if ($ok>0){

                      /*foreach($R as $row)
                           {*/
                            echo '<tr>';
                            echo '<td>' . $val0 . '</td>';
                            echo '<td>' . $val1 . '</td>';
                            echo '<td>' . $val2 . '</td>';
                            echo '<td>' . $val3 . '</td>';
                            echo '<td>' . $val4 . '</td>';
                            echo '<td>' . $val5 . '</td>';
                            }
                            //echo '</tr>';
                           //}



                     
                     /*
                     global $R;
                     $R = array("a" => array($val0),"b" => array($val1),"c" => array($val2),
                      "d" => array($val3),"e" => array($val4),"f" => array($val5));
                     */
                    /*
                     global $check;
                     $check=$sql->rowCount();
                    */

                     if (isset($val6) && ($val6!=null))
                     {
                     $checkdep=noRedun('dephaveNO', 'dep' , $val5);
                         if ($checkdep==0)
                         {
            

                           $stmt= $con->prepare('INSERT INTO
                                                                    dep (dephaveNO,dephaveNAME)
                                                         
                                                         VALUES (:zt,:zssn)');
                                                         
                                 $stmt->execute(array(':zt'  =>$val5,
                                                      ':zssn'   =>$val6
                                                  
                            ));



                         } }
                    }
              
                 }

              }
                  
                
                
                
                  if($c >1){
                    //fclose($file);
                    $count=$c-1;
                    echo '</tr>';
                    echo '<div class="alert alert-success">' . '<strong>' . $count  . '</strong>'
                 ." Equipment Uploaded " .  '<strong>' . 'successfully' . '</strong>' . ' ' . ':)' . '</div>';
                   //reDir('insert.php?do=insert',1);
                  /*
                  echo '</br>';
                  ?>
                    <h1 class='text-center'>Downloaded Records</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                    <td>Equip. Name</td>
                   <td>Equip. Serial</td>
                   <td>Purchasing Price</td>
                   <td>Model</td>
                   <td>Equip. Type</td>
                   <td>Dep. have No.</td>
                </tr>
                <?php
                           foreach($R as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row["a"] . '</td>';
                            echo '<td>' . $row["b"] . '</td>';
                            echo '<td>' . $row["c"] . '</td>';
                            echo '<td>' . $row["d"] . '</td>';
                            echo '<td>' . $row["e"] . '</td>';
                            echo '<td>' . $row["f"] . '</td>';
                            echo '</tr>';
                           }*/
                  
                  }
                  else{
                    //fclose($file);
                    echo '</tr>';
                    echo '<div class="alert alert-danger">' . "Sorry! There is some problem    May be ". '<strong>Repeated data</strong>' . '</div>';
                    reDir('insert.php?do=insert');
                  
                  }
              } 
         break;
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////

//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
       case 'equi':
       ?>


       <!--//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////-->

         <legend>

      <p style="font-size:30px;color:gray">    AUTOMATIC INSERT </p>
 <form name="import" action='insertrecemp.php?do=upload' method="post" enctype="multipart/form-data">
                          <input type="file" name="file" />
                          <!-- <input type="submit" name="submit" value="Upload" class="d" />--> 
                          <button type="submit" name="submit"><i class="glyphicon glyphicon-upload">Upload </i></button>
                         
                   </form> 

               </legend>


       <!--//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////
//////////////////////////////////////////////////*****/////////////////////////////////////////////////////-->
     
            <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
      <p style="font-size:30px;color:gray">    MANUAL INSERT </p>
     
        <div class='container'>
        <form class='form-horizontal' action='?do=equiInsert' method='POST'>
           
           <!--start user name field-->
          <div style="padding-left:300px">
              <input type='text' name='equipname'   required='requiredL'
               placeholder='Functional equip name' style="height:45px"/>
           
            <!--end user name field-->
            
            <!--start password field-->
         
              <input type='text' name='equipserial'  autocomplete='off' required='required' 
                placeholder='Equipment Serial No.' style="padding-left:15px;margin-left:70px;height:45px"/>
              </div>
            
            <!--end password field-->
            <!--start userfullname field-->
            <div style="padding-left:300px">
              <input type='text' name='model'  placeholder='Equipment model' style="height:45px;margin-top:20px"/>
            
            <!--end userfullname field-->
         
    
              
           
            <select name="equiptype" style="padding-left:15px;margin-left:75px;height:45px" >
              <option value='null'>choose equip.type.....?</option>
              <option value='diag'>diagnostic</option>
              <option value='therap'>therapeutic</option>
              <option value='lab'>laboratory</option>
            </select>
           
</div>



             <!-- <input type='text' name='equiptype'  class='form-control' required='required'  placeholder='Equipment Clinical type'/> -->  <!--data validation by client side-->
           
            <!--end email field-->

            <!--start email field-->
         <div style="padding-left:300px">
              <input type='text' name='dephaveNO'  
               required='required'  placeholder='Which Dep. NO. In?' style="height:45px;margin-top:20px"/>   <!--data validation by client side-->
              









              <input type='text' name='dephaveNAME'  style="padding-left:15px;margin-left:70px;height:45px" 
                placeholder='Which Dep. NAME In?'/>   <!--data validation by client side-->
          

         </div>
          


             
            <!--end email field-->
                <div style="padding-left:300px">
          
              <input type='text' name='purprice'  required='required' autocomplete='off' style="height:45px;margin-top:20px"
               placeholder='Purchasing price? L.E.'/>   <!--data validation by client side-->
           

              </div>
            <!--start submit field-->
            <!--<label class='col-sm-2 control-label'>UPDATE</label>-->
               <div style="padding-left:300px">
              <input type='submit' value='NEW equipment' class='btn btn-lg btn-primary '  style="height:45px;margin-top:20px"/>
         </div>
            <!--end submit field-->
        </form>   
                                                                             
     </div>                                                     
  
     <?php
     break;







           //////////////////////////////////////////*****///////////////////////////////////////////////
     //////////////////////////////////////////*****///////////////////////////////////////////////
     //////////////////////////////////////////*****///////////////////////////////////////////////
     //////////////////////////////////////////*****///////////////////////////////////////////////
     //////////////////////////////////////////*****///////////////////////////////////////////////
       
            case'equiInsert':
            if ($_SERVER['REQUEST_METHOD']== 'POST')
         {
           echo '<h1 class="text-center"></h1>' . '<div class="container" >'; 
           //echo '<div class="container" >';
          /////////////////*   Get variable from the FORM  *///////////////////
              $equipname=$_POST['equipname'];
              
              $equipserial=$_POST['equipserial'];
              
              
              $model=$_POST['model'];
              $equiptype=$_POST['equiptype'];
              
              $dephaveNO=$_POST['dephaveNO'];

              $dephaveNAME=$_POST['dephaveNAME'];
              
              
              $purprice=$_POST['purprice'];
              /*$purpricehashed=sha1($purprice);*/
              
              
              

              $formErrors=array();
             // Validation the form from server side
              
              $redun=noRedun('equipserial','equip',$equipserial);
              if ($redun>0)
              {
                $formErrors[]= '<div class="alert alert-danger">' .'Serial No. you Entered is already ' . 
                '<strong> Existed</strong>' .' '. ':('. '</div>' ;
              }


              if ($_POST['equiptype']=='null')
              {
                
                  $formErrors[]='<div class="alert alert-danger">' . 'You must choose <strong>Eq clinical type?
                  </strong> ' .' '. ':(' .'</div>';
                
                
              }

            



              
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo /*'<div class="alert alert-danger">' .*/ $error /*. '</div>'*/;
                reDir('back');
             }

             //check IF there no formError

             if (empty($formErrors))
             
              {
             

             //check IF there no formError

             
             // $dbtable='user';
              //$dbcell='user_reg_name';
              //$check=noRedun('equipserial','equip',$equipserial);               /////////////*Calling noRedun function *///////////////
              //if($check == 0){                                      ///////////////////**Use noRedun  start**///////////////
                $stmt= $con->prepare('INSERT INTO
                                                equip (equipname,equipserial,model,equiptype,dephaveNO,purprice)
                                     
                                     VALUES (:zt,:zssn,:zE,:ze,:zp,:zj)');
                                     
             $stmt->execute(array(':zt'  =>$equipname,
                                  ':zssn'   =>$equipserial,
                                  ':zE'  =>$model,
                                  ':ze'  =>$equiptype,
                                  ':zp'  =>$dephaveNO,
                                  
                                  ':zj'  =>$purprice
                                  ));
             $checkdep1=noRedun('dephaveNO', 'dep' , $dephaveNO);

             if ($checkdep1==0)
             {
            

                       $stmt= $con->prepare('INSERT INTO
                                                                dep (dephaveNO,dephaveNAME)
                                                     
                                                     VALUES (:zt,:zssn)');
                                                     
                             $stmt->execute(array(':zt'  =>$dephaveNO,
                                                  ':zssn'   =>$dephaveNAME
                                                  
                                                  ));



             }

            
              
                                  
             echo '<div class="alert alert-success">' . $stmt->rowCount() . ' Equipment Inserted' .' '.' :)</div>';
                       reDir('back',1);
                            /*}    
                            else
                            {
                              echo '<div class="alert alert-danger">' . 'Serial No. you Entered is already Exist' .' '. ':(' .'</div>';
                            }*/
                            ///////////////////**Use noRedun  End**///////////////
               
             
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
             // Validation the form from client side stop
         } 
     }

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
        case 'equmaint':
       
        ?>
        <div class='container'>

        <form class='form-horizontal' action='?do=equmaintInsert' method='POST'>
          

           <!--start user name field-->
          <div style="padding-left:300px">
              <input type='text' name='equipserial'     required='required'
              autocomplete='off' placeholder='Equipment Serial No.' style="height:45px;margin-top:20px"/>
          
            <!--end user name field-->
            <!--start password field-->
           <!--<div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='equipname' class='form-control' 
              autocomplete='on'  placeholder='Functional equip name'/>
              
            </div>
           </div>-->
            <!--end password field-->
            <!--start userfullname field-->
         
              <input type='text' name='maintainer'   
              required='required' autocomplete='off' placeholder='Who maintain equip.?' style="padding-left:15px;margin-left:70px;height:45px"/>
           </div>
            <!--end userfullname field-->
 

<!--we leave this for you ????????????????????-->
     <!-- <div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
        -->

          <div style="padding-left:300px;padding-top:10px">
    <fieldset>
             <p> Maint type?
              <br/>
            <label>
              <input type='radio' required='required' style="margin-top:20px;" name='origin'<?php
                if (isset($origin) && $origin=='inner')
                  {

                    echo 'checked';
                  }
              ?> value='inner'/> inner</label>
            
              <br />
           <label>
              <input type='radio' required='required' name='origin'<?php
                if (isset($origin) && $origin=='outer')
                
                
                echo "checked"  ;
              ?>
               value='outer'/> outer 
               
             </label>
          
</p>

</fieldset>
            </div>

       

                   
                   <div style="padding-left:300px">

                    <input type='text' name='maintprice'  required='required' style="height:45px;margin-top:20px"
                     autocomplete='off' placeholder='Maintenance price   L.E.'/> 
                        <!--data validation by client side-->
                 
                  
                    

          
            <!--start email field-->
           
              <input type='text' name='maintdate'   
               required='required'
              placeholder='dd/mm/yyyy h:m:s'  style="padding-left:15px;margin-left:70px;height:45px"/>   <!--data validation by client side-->
          
           </div>
            <!--end email field-->
             
              <!--<input type='text' name='prodesc'    required='required' style="height:45px;margin-top:20px"
              placeholder='Problem description'/> -->  <!--data validation by client side-->
           
            <div style="padding-left:300px">

           <TEXTAREA  name='prodesc' style="height:90px;width:440px;margin-top:20px"
              placeholder='Problem description' required='required'></TEXTAREA>
          </div>



            <div style="padding-left:300px">
              <input type='text' name='sparpar'  
              autocomplete='off' placeholder='If there is purchasing' style="height:45px;margin-top:20px"/>   <!--data validation by client side-->
            
           </div>



      
          
            


            <!--start submit field-->

          <!-- <div class='form-group form-group-lg'>-->
         <div style="padding-left:300px">
             <input type='submit' value='Maintain. Done' class='btn btn-lg btn-primary ' style="height:45px;margin-top:20px"/>
            <!--</div>-->
           <!--</div>-->
            <!--end submit field-->

            </div>
             </form>
            


                                                                
        <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
       <!-- <form action='?do=equi' method='POST'> -->                         <!--view btn to view start-->
         <!-- <div class='view button'>-->
           <!--<button > xxxxxxxxxxxxxx</button>-->
           
         <!--  <input type='submit' value='Add equipment' class=' btn  btn-primary ' />-->
            <!--<a href='?'></a>-->
          <!--</div>-->  
      <!--  </form>-->                        <!--view btn to view end-->                                            
     </div>
<?php      break;
          


 //////////////////////////////////////////*****///////////////////////////////////////////////         //////////////////////////////////////////*****///////////////////////////////////////////////




          case'equmaintInsert':     // Insert coupled with Add
      if ($_SERVER['REQUEST_METHOD']== 'POST')
         {
           echo '<h1 class="text-center"></h1>'; 
           echo '<div class="container" >';
          /////////////////*   Get variable from the FORM  *///////////////////
              $equipserial=$_POST['equipserial'];
              /*$equipname=$_POST['equipname'];*/            //////Non useful
              $maintainer=$_POST['maintainer'];
              $maintdate=$_POST['maintdate'];
              //$hashedupass=sha1($upass);
              $prodesc=$_POST['prodesc'];
              //$origin='null';
              /*if (isset($_POST['origin']))
              {*/
              $origin=$_POST['origin'];
              if ($origin=='inner')
              {
                $maintprice=0;
              }else
              {
                $maintprice=$_POST['maintprice'];
              }
              /*}
              else
              {
                $origin=$_POST['origin'];
                $maintprice=0;
              }*/
              //$maintprice=$_POST['maintprice'];
              $sparpar=$_POST['sparpar'];
              

              
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
             /* if (($_POST['origin']=='0') && (empty($_POST['maintprice'])))
              {
                
                  $formErrors[]='<div class="alert alert-danger">' . 'You must record Maintenance Price' .'</div>';
                
                
              }*/
              $check=noRedun('equipserial','equip',$equipserial);
              if ($check == 0)
              {
                  $formErrors[]='<div class="alert alert-danger">' . 
                      ' Equipment serial# you Entered isn\'t Exist please
                       first Insert equipment' .' '. ':(' .'</div>';
              }

              /*if (($origin!='inner') || ($origin!='outer'))
              {
                
                  $formErrors[]='<div class="alert alert-danger">' . 'You must <strong> check </strong>Maintenance type' .'</div>';
                
                
              }*/
              
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo  $error  ;
                reDir('back',3);
             }

             //check IF there no formError

             if (empty($formErrors))
             {
             
             // $dbtable='user';
              //$dbcell='user_reg_name';
              //$check=noRedun('equipserial','equip',$equipserial);               /////////////*Calling noRedun function *///////////////
              //if($check > 0){                                      ///////////////////**Use noRedun  start**///////////////
                $stmt= $con->prepare('INSERT INTO
                                                equipmaint (equipserial , maintainer,maintdate, prodesc,sparpar,maintprice,
                                                  origin)
                                     
                                     VALUES (:zur,:ze,:zp,:zuf,:zE,:z,:o)');
                                     
             $stmt->execute(array(':zur'  =>$equipserial,
                                  ':ze'   =>$maintainer,
                                  ':zp'   =>$maintdate,
                                  ':zuf'  =>$prodesc,
                                  ':zE'   =>$sparpar,
                                  ':z'    =>$maintprice,
                                  ':o'    =>$origin 
                                  ));
             echo '<div class="alert alert-success">' . $stmt->rowCount() . ' Maintenance Done Succefully ' 
             .' '.' :)</div>';
              reDir('back',1);
                           /* }    
                           else
                            {
                              echo '<div class="alert alert-danger">' . ' Equipment serial No. you Entered isn\'t Exist please first Insert equipment' .' '. ':(' .'</div>';
                            }*/
                            ///////////////////**Use noRedun  End**///////////////
               
             }
             //echo $uid . $uname . $upass . $ufullname . $uemail ;             /* stmt test*/
             
           }  // Validation the form from client side stop
          
         else
         {
          //echo 'Sorry you can\'t browse this page directly';
         header('location:dashboard.php');
         
         }
          echo '</div>';
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

       case 'equcalib':
       /*echo 'Hello my equcalib page';*/
       ?>
      
        <div class='container'>
        <form class='form-horizontal' action='?do=equcalibInsert' method='POST'>
           <!--start user name field-->
           <div style="padding-left:300px">
              <input type='text' name='equipserial'  style="height:45px;margin-top:20px" autocomplete='off' required='required' 
              placeholder='Equipment Serial No.'/>
          
          
            <!--end user name field-->
            <!--start password field-->
           <!--<div class='form-group form-group-lg'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10 col-sm-4'>
              <input type='text' name='equipname' class='password form-control'   placeholder='Functional equip name'/>
              
            </div>
           </div>-->
            <!--end password field-->
            <!--start userfullname field-->
          
              <input type='text' name='calibrator' autocomplete='off'  style="padding-left:15px;margin-left:70px;height:45px"  required='required' 
              placeholder='Who Calibrate?'/>
            </div>
           




         <div style="padding-left:300px;padding-top:10px">
        
    <fieldset>
             <p> Maint type?
              <br/>
            <label>
              <input type='radio' required='required' style="margin-top:20px;" name='origin' <?php
                if (isset($origin) && $origin=='inner')
                  {

                    echo 'checked';
                  }
              ?> value='inner'/> inner</label>
            
              <br />

           <label>
              <input type='radio' required='required' name='origin'<?php
                if (isset($origin) && $origin=='outer')
                
                
                echo "checked"  ;
               
                  



              ?>
               value='outer'/> outer</label> 
               
             
          </p>



           
     </fieldset>
   </div>

        

        <div style="padding-left:300px"> 
              <input type='text' name='calibprice'  style="height:45px" required='required'
               autocomplete='off' placeholder='Calibration price L.E.'/>
           
            </div>

            <!--end userfullname field-->
            <!--start email field-->
             <div style="padding-left:300px">
              <input type='text' name='calibdate' style="height:45px;width:200px;margin-top:10px"   
             required='required' placeholder='Now Calib dd/mm/yyyy h:m:s'/>   <!--data validation by client side-->
           </div>
            <!--end email field-->
   <div style="padding-left:300px"> 
              <input type='text' name='nextcalibdate'  style="height:45px;width:200px;margin-top:10px"   
            required='required'  placeholder='Next Calib dd/mm/yyyy h:m:s'/>   <!--data validation by client side-->
          </div>
           <!--
  <div style="padding-left:300px"> 
              <input type='text' name='notation2'  style="height:45px;margin-top:20px"   placeholder='If you have extra notation?'/>
         
  </div>-->

         <div style="padding-left:300px">
          <TEXTAREA  name='notation'     style="height:90px;width:440px;margin-top:10px"
              placeholder='notation' ></TEXTAREA>
          </div>
            <!--start submit field-->
        <div style="padding-left:300px"> 
              <input type='submit' value='Calibration Done' style="height:45px;margin-top:20px" class='btn btn-lg btn-primary ' />
           <!-- </div>-->
        </div>




            <!--end submit field-->
           
        </form>                                                        
        <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
        <form action='?do=equi' method='POST'>                          <!--view btn to view start-->
       
            <!--<a href='?'></a>-->
          <!---->  
        </form>                      <!--view btn to view end-->                                            
     </div>
<?php      break;
       

           
       

       
         
       

          //////////////////////////////////////////*****///////////////////////////////////////////////
       
          //////////////////////////////////////////*****///////////////////////////////////////////////
        //////////////////////////////////////////*****///////////////////////////////////////////////
       

          case 'equcalibInsert':
             /*echo 'Hello my equcalib page';* ///* stmt test*////
          if ($_SERVER['REQUEST_METHOD']== 'POST')
   {
           echo '<h1 class="text-center"></h1>' . '<div class="container" >'; 
           
          /////////////////*   Get variable from the FORM  *///////////////////
              $equipserial         =$_POST['equipserial'];
              $calibrator          =$_POST['calibrator'];
              $calibdate           =$_POST['calibdate'];
              $nextcalibdate       =$_POST['nextcalibdate'];
              $notation           =$_POST['notation'];
              


                   //$origin='null';
              $origin=$_POST['origin'];
              if ($origin=='inner')
              {
                $calibprice=0;
              }else
              {
                $calibprice=$_POST['calibprice'];
              }
              

              
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
               $check=noRedun('equipserial','equip',$equipserial);
               if ($check == 0)
               {
                  $formErrors[]='<div class="alert alert-danger">' . 
                   ' Equipment serial# you Entered isn\'t Exist please first Insert equipment' .' '. ':(' .'</div>';
               }


             /* if (!isset($origin) )
              {
                
                  $formErrors[]='<div class="alert alert-danger">' . 'You must <strong> check </strong>Calibration type' .'</div>';
                
                
              }*/
              
              foreach ($formErrors as $error)    //loop into Error array Echo it 
             {
                echo  $error  ;
                reDir('back', 3);
             }

             //check IF there no formError

             if (empty($formErrors))
             {
             
             



             
             
              //$check=noRedun('equipserial','equip',$equipserial);               /////////////*Calling noRedun function *///////////////
             /* if($check > 0)
              { */ 
                    /*$title='insert page';*/
                     $checkexistcalib=noRedun('equipserial' , 'equipcalib' ,$equipserial);
                    if($checkexistcalib > 0)
                    {
                          require_once 'includes/functions/function.php';

                      /*$ok=*/deleteRedun('equipserial' , 'equipcalib' ,$equipserial);
                       /*if ($ok==1)*/
                      /* {*/
                        $stmt= $con->prepare('INSERT INTO
                                                      equipcalib(equipserial,calibrator,calibdate,nextcalibdate,
                                                        calibprice,
                                                        notation,origin)
                                                        
                                                        
                                           
                                           VALUES (:zur,:ze,:zp,:zuf,:z1,:z2,:o)');
                                           
                   $stmt->execute(array(':zur'  =>$equipserial,
                                        ':ze'   =>$calibrator,
                                        ':zp'   =>$calibdate,
                                        ':zuf'  =>$nextcalibdate,

                                        ':z1'   =>$calibprice,
                                        
                                        ':z2'   =>$notation,
                                        
                                         
                                         ':o'   =>$origin
                                        ));
                   echo '<div class="alert alert-success">' . $stmt->rowCount() . 
                   'Calibration Done Succefully ' .' '.' :)</div>';
                  reDir('back',1);
                          /*header ('refresh: dashboard.php')*//////**To prevent redunduncy**///////

                       /*}*/
                    }
              else{
                $stmt= $con->prepare('INSERT INTO
                                                equipcalib(equipserial,calibrator,calibdate,nextcalibdate,calibprice,
                                                  notation,origin)
                                     
                                     VALUES (:zur,:ze,:zp,:zuf,:z1,:z2,:o)');
                                     
             $stmt->execute(array(':zur'  =>$equipserial,
                                  ':ze'   =>$calibrator,
                                  ':zp'   =>$calibdate,
                                  ':zuf'  =>$nextcalibdate,
                                  ':z1'   =>$calibprice,
                                  ':z2'   =>$notation,
                                  
                                  ':o'    =>$origin
                                  ));
             echo '<div class="alert alert-success">' . $stmt->rowCount() . 'Calibration Done Succefully ' 
             .' '.' :)</div>';
             reDir('back');
                 }                                    ///////////////////**Use noRedun  start**///////////////
               
                           
                 
       /*else
          {
           echo '<div class="alert alert-danger">' . ' Equipment serial No. you Entered isn\'t Exist please first Insert equipment' .' '. ':(' .'</div>';                     
         }*/                 
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
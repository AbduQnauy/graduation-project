<?php
   


session_start();                                                                     // start session
  //print_r($_SESSION); 
 $title='QUERY page';                                                             // title variable
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
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****///////////////////////////////////////////////
          //////////////////////////////////////////*****/////////////////////////////////////////////// 



      case 'query':
  		 /*echo 'Hello my query page';*/    /*stmt test*/
         ?>
         <h1 class='text-center'>   </h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered' style="width:70%;margin-left:170px">
                  <tr>
                   <td>QUERY RECORD</td>
                  </tr>
                  <tr><td>
                    <form action='?do=equipquery' method='POST'>

                  <p><div><h4>selection depends on ?</h4></div>  
                    <select name='equipM' style="width:200px;height:50px" >
                     <option></option>
                     <option value='ser'>serial no.</option>
                     <option value='dep'>department</option>
                    <!-- <option value='cal'>calibrated</option>
                     <option value='main'>maintained</option>-->
                    <!-- <option value='hos'>hospital</option>-->
                     
                    </select></p>
                   <div> <input type='text' name='control1' style="width:200px;height:50px;margin-bottom:10px"   placeholder='Enter what you want?'/></div>
                    

                                <input class='btn btn-lg btn-primary ' type='submit' style="width:200px;height:100px;margin-bottom:10px" value='equipment' />    
                  </form>

                </td></tr>
                  

  <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->                 



                <tr><td>
                    <form action='?do=departQuery' method='POST'>
                      <input class='btn btn-lg btn-primary ' type='submit'  style="width:200px;height:100px;margin-top:10px"  value='   department   ' />
                  
                  </form>
                </td></tr>
                  

  <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->                 





                 <!-- <tr><td>
                    <form action='?do=techempquery' method='POST'>
                    <input class='btn btn-lg btn-primary ' type='submit'  value='technical employee' />
                  <p><div>selection depends on ?</div> 
                    <select name='techempM' >
                     <option></option>
                     <option value='name'>name</option>
                     <option value='ssn'>ssn</option>
                     <option value='id'>id</option>
                     <option value='eng'>engineer</option>
                     <option value='tech'>technician</option>
                     

                    </select> </p>
                    <input type='text' name='control2'    placeholder='Enter what you want?'/>
                    
                   </form>
                </td></tr>  -->
                
                  
                                            
          <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->                 



            <!--    <tr><td>
                    <form action='' method='POST'>
                      <div><input class='btn btn-lg btn-primary ' type='submit'  value='   agency' /></div>
                      <input type='text' name='control3'    placeholder="Enter what agency'name?"/>        
                  </form>
                </td></tr> -->
                  

          <!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->                 
             

             </table>
              </div>
            </div>

       <?php
      // hello();
       //reDir();
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

       case 'departQuery':

        if ($_SERVER['REQUEST_METHOD'] == 'POST' || 'GET')
        {

        $stmt=$con->prepare("SELECT * FROM `dep` ORDER BY `dep`.`dephaveNO` ASC   ");   //select all user except ADMIN users
        $stmt->execute();
        $rows=$stmt->fetchAll();
        ?><h1 class='text-center'>Departments</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>#</td>
                   <td>department name</td>
                   
                   
                   <td>Control</td>
                  </tr><?php



               
                           foreach($rows as $row)
                           {
                            /*'<a href="#"> <?php echo $row["dephaveNO"];?></a>'*/
                            echo  '<td>' .    '<a href="?do=dephave&equipM=' . $row["dephaveNO"] .  ' ">' . $row["dephaveNO"] .'</a>'
                            . '</td>' ;
                            
                            echo '<td>' . $row['dephaveNAME'] . '</td>';
                            
                            /*echo '<td>' ./* $row[''] .              '</td>';*/

                            //"<a href='query.php?do=main&wan=" . $row["equipserial"] . " '>"  . 'Maint.' . "</a>"

                            echo '<td>'  . "<a href='query.php?do=maintdep&dep=" . $row["dephaveNO"] . "'class='btn  btn-info''>"  .  'Maint.' . "</a>" . '  ' .
                            "<a href='query.php?do=caldep&dep=" . $row["dephaveNO"] . "'class='btn  btn-info''>"  .  'Calib.' . "</a>" . '  ' .

                                         "<a href='querymoddel.php?do=deldep&dep= " . $row['dephaveNO'] 
                                 . "' class=' btn d-table-btn btn-danger confirm'>
                                 <i class='fa fa-close'></i> Delete </a>"
                              
                                            . '</td>';           
                            

                            echo '</tr>';
                           }
                           ?>
                  
                       
                
     

                </table>
             </div>
            
            </div>
            <?php



        //echo 'hello';
        }else 
        {
          //echo 'no';
          header('location:query.php');
         
        }
        break;
                ////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////

            case 'maintdep': 
                           $stmt=$con->prepare("SELECT equipserial FROM equip WHERE dephaveNO=? ");   //select all user except ADMIN users
                           $stmt->execute(array($_GET['dep']));
                            $rows=$stmt->fetchAll();
                            $ok=$stmt->rowCount();
                            if ($ok>0)

                            {
                              ?>
                             <h1 class='text-center'>Specific Depart.'s Maint. Records</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. serial</td>

                   
                   <td>Maintainer</td>
                   <td>origin</td>
                   <td>Maintenance date</td>
                   <td>Problem description</td>
                   <td>Spare part</td>
                   <td>Maintenance price</td>
                   <td>Control</td>
                  </tr>
                  <?php
                              $traffic=0;

                              foreach ($rows as $row)
                              {
                                $stmt=$con->prepare("SELECT * FROM equipmaint WHERE equipserial=? ");   
                                $stmt->execute(array($row['equipserial']));
                                $rows=$stmt->fetchAll();
                                $ok=$stmt->rowCount();
                                if ($ok>0)
                                {

                             //$traffic=0;

                                  
                                 foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipserial'] .             '</td>';
                            echo '<td>' . $row['maintainer'] .  '</td>';
                            echo '<td>' . $row['origin'] .  '</td>';
                            echo '<td>' . $row['maintdate'] .         '</td>';
                            echo '<td class="test">' . $row['prodesc'] . '</td>';
                            echo '<td>' . $row['sparpar'] . '</td>';
                            echo '<td>' . $row['maintprice'] . '</td>';
                            
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo '<td>' . /*"<a href='querymoddel.php?do=modmain&eqs= " . $row['op.No.'] . 
                            " ' class=' btn s-table-btn btn-success'>
                            <i class='fa fa-edit'></i>Edit</a>*/

                            "<a href='querymoddel.php?do=delmain&eqs= " . $row['op.No.'] . 
                            "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>"
                                           
                               . '</td>' . '</tr>';          
                            

                            //echo '</tr>';
                                    
                      
                           }
                             
                        

                            //echo  '<div class="alert alert-success">' . 'This Equipment hasn\'t been <stron> Calibrated Yet</strong>'. '</div>'; 
                           
                          ++$traffic;

                                }
                              

                       
                            }

                            if($traffic == 0)
                       {
                         ?>        
                      </table>
                         </div>
            
                            </div>
                       <?php 
                        
                       

                echo '<div class="alert alert-danger">' . 'This Department dosen\'t have <stron> Maintained Equip. Yet</strong>' 
                . '</div>'; 
                reDir('query.php?do=departQuery',2);      /////////////**********depart*******///////////

                              } else{echo '</table>' .'</div>' . '</div>';}
                            
           } break ;

              

            //////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////

             case 'caldep':




            $stmt=$con->prepare("SELECT equipserial FROM equip WHERE dephaveNO=? ");   //select all user except ADMIN users
                           $stmt->execute(array($_GET['dep']));
                            $rows=$stmt->fetchAll();
                            $ok=$stmt->rowCount();
                            if ($ok>0)
                            {
                             ?>
                             <h1 class='text-center'>Specific Depart.'s Calib. Records</h1>
             
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. serial</td>

                   
                   <td>Calibrator</td>
                   <td>origin</td>
                   <td>Calibration date</td>
                   <td>Next Calibration date</td>
                   <td>Calibration price</td>
                   <td>Notation</td>
                   <td> Last Notation </td>
                   <td>Control</td>
                  </tr>
                  <?php


                              $traffic=0;
                              foreach ($rows as $row)
                              {
                                $stmt=$con->prepare("SELECT * FROM equipcalib WHERE equipserial=? ");   
                                $stmt->execute(array($row['equipserial']));
                                $rows=$stmt->fetchAll();
                                $ok=$stmt->rowCount();
                                if ($ok>0)
                                {



                                  
                           foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipserial'] .             '</td>';
                            echo '<td>' . $row['calibrator'] .  '</td>';
                            echo '<td>' . $row['origin'] .  '</td>';
                            echo '<td>' . $row['calibdate'] .         '</td>';
                            echo '<td>' . $row['nextcalibdate'] . '</td>';
                            echo '<td>' . $row['calibprice'] . '</td>';
                            echo '<td>' . $row['notation'] . '</td>';

                            echo '<td>' . $row['notation3'] . '</td>';
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo '<td>' . "<a href='querymoddel.php?do=modcal&eqs= " . $row['equipserial'] . 
                            "&dep=" . $_GET['dep'] . " ' class=' btn s-table-btn btn-success'>
                                             <i class='fa fa-edit'></i> Edit </a> " . ' ' . 

                          "<a href='querymoddel.php?do=delcal&eqs= " . $row['equipserial'] . "&dep=" . $_GET['dep'] 
                          . "' class=' btn d-table-btn btn-danger confirm'>
                                             <i class='fa fa-close'></i> Delete </a>"
                                           
                               . '</td>' . '</tr>';          
                            

                            //echo '</tr>';
                           }
                      

                            //echo  '<div class="alert alert-success">' . 'This Equipment hasn\'t been <stron> Calibrated Yet</strong>'. '</div>'; 

                              ++$traffic;

                                }
                                //else 
                                //{
                                  //echo '<div class="alert alert-danger">' . 'This Equipment hasn\'t been <stron> Calibrated Yet</strong>' . '</div>'; 
                               // }


                              }

                              if($traffic == 0)
                       {
                         ?>        
                      </table>
                         </div>
            
                            </div>
                       <?php 
                        
                       

                echo '<div class="alert alert-danger">' . 'This Department dosen\'t have  <stron> Calibrated Equip. Yet</strong>' 
                . '</div>'; 
                reDir('query.php?do=departQuery',2);   ///////////*****depart****/////////////////

                              } else{echo '</table>' .'</div>' . '</div>';}
                            

           } break;





            
            //////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////

      case 'dephave':
      if (($_SERVER['REQUEST_METHOD']=='GET')&& isset($_GET['equipM']))
      {
       //echo  $_GET['equipM'] . 'hello';
       $dephaveNO=$_GET['equipM'];

                           $stmt=$con->prepare("SELECT * FROM equip WHERE dephaveNO=? ORDER BY equipserial ASC");   //select all user except ADMIN users
                           $stmt->execute(array($dephaveNO));
                            $rows=$stmt->fetchAll();
                            $check=$stmt->rowCount();
                            ?>

                            <h1 class='text-center'>equipments of the department</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. name</td>
                   <td>Equip. serial</td>
                   <td>Model</td>
                   <td>Equiptype</td>
                   <td>His department</td>
                   <td>Purchasing price</td>
                   
                   <td>Control</td>
                  </tr>

                            <?php
                             if ($check>0){
                           foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipname'] .             '</td>';
                            echo '<td>' . $row['equipserial'] .  '</td>';
                            echo '<td>' . $row['model'] .         '</td>';
                            echo '<td>' . $row['equiptype'] . '</td>';
                            echo '<td>' . $row['dephaveNO'] . '</td>';
                            echo '<td>' . $row['purprice'] . '</td>';
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo '<td>' . "<a href='query.php?do=main&wan=" . $row["equipserial"] . "&dep=" . $row['dephaveNO'] . "'class='btn  btn-info''>"  . 'Maint.' . "</a>" . '  ' .
                        "<a href='?do=cal&wan=" . $row["equipserial"]. "&dep=" . $row['dephaveNO'] . "'class='btn  btn-info''>"  . 'Calib.' . "</a>" . '  ' .

                             "<a href='querymoddel.php?do=mod&eqs= " . $row['equipserial'] . 
                            " ' class=' btn s-table-btn btn-success'><i class='fa fa-edit'></i> Edit </a> 

                                          <a href='querymoddel.php?do=del&eqs= " . $row['equipserial'] .
                                   "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>"
                                           
                               . '</td>';          
                            

                            echo '</tr>';
                           }
                         }else 
                         {


                          ?></table>
                         </div>
            
                            </div>
                            <?php
                            echo '<div class="alert alert-danger">' . 'There aren\'t <strong>Inserted Equipments</strong> in this department' . '</div>';
                            reDir('query.php?do=departQuery',1);


                         }
                      ?></table>
                         </div>
            
                            </div>
                            <?php
                       }
                        
                       else
                        
                       {
                        header('location:dashboard.php');
                       //echo 'hello';
                       }
     
      break;







       


case 'cal':          
          /* echo 'cal';*/             /*stmt test*/
          
               // echo 'hello';
                      
                   //$wan1=$_GET['wan'];
                   $stmt=$con->prepare("SELECT * FROM equipcalib WHERE equipserial=?");
                   $stmt->execute(array($_GET['wan']));
                   $rows=$stmt->fetchAll();
                   $ok=$stmt->rowCount();
             //$ok=noRedun('equipserial','equipcalib',$wan1);
         if ($ok>0)
         {

          /*$stmt=$con->prepare("SELECT * FROM equipcalib WHERE equipserial=?");   //select all user except ADMIN users
                           $stmt->execute(array($wan1));*/
                            //$rows=$stmt->fetch();
                             ?>
                             <h1 class='text-center'> Specific Calib. Record</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. serial</td>

                   
                   <td>Calibrator</td>
                   <td>origin</td>
                   <td>Calibration date</td>
                   <td>Next Calibration date</td>
                   <td>Calibration price</td>
                   <td>Notation</td>
                   <td>Last Notation</td>
                   <td >Control</td>
                  </tr>
                  <?php
                                 foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipserial'] .             '</td>';
                            echo '<td>' . $row['calibrator'] .  '</td>';
                            echo '<td>' . $row['origin'] .  '</td>';
                            echo '<td>' . $row['calibdate'] .         '</td>';
                            echo '<td>' . $row['nextcalibdate'] . '</td>';
                            echo '<td>' . $row['calibprice'] . '</td>';
                            echo '<td>' . $row['notation'] . '</td>';
                            echo '<td>' . $row['notation3'] . '</td>';

                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo '<td>' . "<a href='querymoddel.php?do=modcal&eqs= " . $row['equipserial'] . /*"&dep=" . $_GET['dep'] .*/ 
                             "'class=' btn s-table-btn btn-success'><i class='fa fa-edit'></i>Edit</a>" .  

                          "<a href='querymoddel.php?do=delcal&eqs= " . $row['equipserial'] .  /*"&dep=" . $_GET['dep'] .*/ 
                           "' class=' btn d-table-btn btn-danger confirm'>
                                             <i class='fa fa-close'></i>Delete</a>"
                                           
                               . '</td>';          
                            

                            echo '</tr>';
                           }
                      ?>        
                      </table>
                         </div>
            
                            </div>
                       <?php
                     
                   }
                    else
                    {
                      echo '<div class="alert alert-danger">' . 'This Equipment hasn\'t been <strong> Calibrated Yet</strong>'. '</div>';
                    
                    reDir('query.php?do=query',1);     //////////////**ser*dep***depart****///////////////
                    //reDir('query.php?do=dephave&equipM=' . $_GET['dep'],2);
                    }



               
            

           break;








          case 'main':
          //if (($_SERVER['REQUEST_METHOD']=='GET')&& isset($_GET['wan'])){
       //echo  $_GET['equipM'] . 'hello';
       
            //$wan=$_GET['wan'];

             $stmt=$con->prepare("SELECT * FROM equipmaint WHERE equipserial =?");
             $stmt->execute(array($_GET['wan']));
             $ok = $stmt->rowCount();
             $rows = $stmt->fetchAll();
             
             

            
           if ($ok > 0)
         {
          
         

         
                             ?>
                             <h1 class='text-center'>Specific Maint. Record</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. serial</td>

                   
                   <td>Maintainer</td>
                   <td>origin</td>
                   <td>Maintenance date</td>
                   <td >Problem description</td>
                   <td>Spare part</td>
                   <td>Maintenance price</td>
                   <td>Control</td>
                  </tr>
                  <?php
                                 foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipserial'] . '</td>';
                            echo '<td>' . $row['maintainer']  . '</td>';
                            echo '<td>' . $row['origin']      . '</td>';
                            echo '<td>' . $row['maintdate']   . '</td>';
                            echo '<td  class="test"  >' . $row['prodesc']     . '</td >';
                            echo '<td>' . $row['sparpar']     . '</td>';
                            echo '<td>' . $row['maintprice']  . '</td>';
                            
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo '<td>' . /*"<a href='querymoddel.php?do=modmain&eqs= " . $row['op.No.'] . 
                            " ' class=' btn s-table-btn btn-success'>
                            <i class='fa fa-edit'></i>Edit</a>*/

                            "<a href='querymoddel.php?do=delmain&eqs= " . $row['op.No.'] . 
                            "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>"
                                           
                               . '</td>';          
                            

                            echo '</tr>';
                           }
                      ?>        
                      </table>
                         </div>
            
                            </div>
                       <?php
                     //}
                   }
                    
                    else
                    {
                      echo '<div class="alert alert-danger">' . 'This Equipment hasn\'t been <strong> Maintained Yet</strong>'
                      . '</div>';
                      
                      
                      reDir('query.php?do=query',1);    ///////////****ser**dep*   depart//////////
                      // 'query.php?do=dephave&equipM=' . $_GET['dep']
                    }
      //}
           break;














       case 'equipquery':                                              /****START****/
       /*echo'welcome to equipment query';*/                      /*stmt test*/
         if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //echo 'hello';
      /* echo '<h1 class="text-center"></h1>'; 
           echo '<div class="container" >';*/



       
          if (isset($_POST['equipM'])) 
        {
           //echo 'hello hello';
          
            $ch=$_POST['equipM'];
          
          switch($ch)
          {
           

           case 'ser':               //////////////////***start ya abdu****/////////////////////
          // echo 'ser';   /*stmt test*/
           
            if (($_POST['control1'])!= null)
            {
              $serial= $_POST['control1'];
              /*echo $serial;*/                         /*****stmt test***********/
                      ////////////////////////////////////////////////////////////*************************///////////////////////////////////
                       /* require_once'init.php';*/     

            $Noredun=noRedun('equipserial' , 'equip', $serial);
            if($Noredun ==1)
            {
                                    $stmt=$con->prepare("SELECT * FROM equip WHERE equipserial=?");   //select all user except ADMIN users
                           $stmt->execute(array($serial));

           $rows=$stmt->fetchAll();                            // Conversion fetched data to variables     
            
            
           ?>
           <h1 class='text-center'>Selected equipment</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class='main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. name</td>
                   <td>Equip. serial</td>
                   <td>Model</td>
                   <td>Equiptype</td>
                   <td>His department</td>
                   <td>Purchasing price</td>
                   
                   <td>Control</td>
                  </tr>
                      <?php 
                           foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipname'] .             '</td>';
                            echo '<td>' . $row['equipserial'] .  '</td>';
                            echo '<td>' . $row['model'] .         '</td>';
                            echo '<td>' . $row['equiptype'] . '</td>';
                            echo '<td>' . $row['dephaveNO'] . '</td>';
                            echo '<td>' . $row['purprice'] . '</td>';
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo  
                             //'<a href="?do=dephave&equipM=' . $row["dephaveNO"] .  ' ">' . $row["dephaveNO"] .'</a>'
                               

                             '<td>' . "<a href='query.php?do=main&wan=" . $row["equipserial"] ./*"&dep=" . $row['dephaveNO'].*/ "'class=' btn  btn-info''>"  
                             . 'Maint.' . "</a>" . '   ' .
                        "<a href='?do=cal&wan=" . $row["equipserial"]. /*"&dep=" . $row['dephaveNO']. */ "'class='btn  btn-info''>"  
                         . 'Calib.' . "</a>" . '   ' .

                      "<a href='querymoddel.php?do=mod&eqs= " . $row['equipserial'] . 
                            " ' class=' btn s-table-btn btn-success'><i class='fa fa-edit'></i> Edit </a>

                                           <a href='querymoddel.php?do=del&eqs= " . $row['equipserial'] .
                          "' class=' btn d-table-btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>"
                              
                                            . '</td>';           
                            

                            echo '</tr>';
                           }
                      ?>
                  
                       
                
     

                </table>
             </div>
            
            </div>
            <?php
            }

            else
            {
                 echo '<div class="alert alert-danger">' . 'Sorry serial No. you entered <strong> IS NOT EXISTED </strong>'. '</div>';
                   reDir('back',1);
            }


               ///////////////////////////////////////////////////////////////////**************************/////////////////////////////////
            }

            
            else
            {
              echo '<div class="alert alert-danger">' . 'You must write Serial no. in <strong> text box </strong>'. '</div>';
               
               reDir('back',1); /////////////******ser*******////////////
            
          }
            

           break;
           

           case 'dep': 

           if (($_POST['control1'])>0)
            {
              $depnum = $_POST['control1'];
              /*echo $depnum;*/                                /*****stmt test***********/
            $ok=noRedun('dephaveNO','equip',$depnum);
                 if($ok>0)
                    {
                              /*repeated 1*/

                      $stmt=$con->prepare("SELECT * FROM equip WHERE dephaveNO=? ORDER BY equipserial ASC");   //select all user except ADMIN users
                           $stmt->execute(array($depnum));
                            $rows=$stmt->fetchAll();
                             ?>

                            <h1 class='text-center'>Selected department</h1>
             <div class='container'> 
              <div class='table-responive'>
                <table class=' main-table text-center table  table-bordered'>
                  <tr>
                   <td>Equip. name</td>
                   <td>Equip. serial</td>
                   <td>Model</td>
                   <td>Equiptype</td>
                  <!-- <td>His department</td>-->
                   <td>Purchasing price</td>
                   
                   <td>Control</td>
                  </tr>
                  <?php 
                           foreach($rows as $row)
                           {
                            echo '<tr>';
                            echo '<td>' . $row['equipname'] .             '</td>';
                            echo '<td>' . $row['equipserial'] .  '</td>';
                            echo '<td>' . $row['model'] .         '</td>';
                            echo '<td>' . $row['equiptype'] . '</td>';
                            //echo '<td>' . $row['dephaveNO'] . '</td>';
                            echo '<td>' . $row['purprice'] . '</td>';
                            /*echo '<td>' ./* $row[''] .              '</td>';*/
                            echo  
                            
                           //"<a href='query.php?do=main&wan=" . $row["equipserial"] . "'>"  . 'Maint.' . "</a>" 
                           //"<a href='query.php?do=main&wan= " . $row["equipserial"] . "'>"  . 'Maint.' . "</a>"



                            '<td>' . "<a href='query.php?do=main&wan=" . $row["equipserial"] . "&dep=" . $depnum . "'class='btn  btn-info''>"  . 'Maint.' . "</a>" . '  ' .
                             "<a href='?do=cal&wan=" . $row["equipserial"] ."&dep=" . $depnum ."'class='btn  btn-info''>"  . 'Calib.' . "</a>" . '  ' .

                              "<a href='querymoddel.php?do=mod&eqs= " . $row['equipserial'] .
                             " ' class=' btn s-table-btn btn-success'>
                             <i class='fa fa-edit'></i> Edit </a>

                                          <a href='querymoddel.php?do=del&eqs= " . $row['equipserial'] .
                               "' class=' btn d-table-btn btn-danger confirm'>
                               <i class='fa fa-close'></i> Delete </a>"
                                           
                               . '</td>';          
                            

                            echo '</tr>';
                           }
                      ?>        
                      </table>
                         </div>
            
                            </div>
                       <?php
                     }
                    else
                    {
                      echo '<div class="alert alert-danger">' . 'Department No. you entered  <strong> Not Be registered Yet</strong>'. '</div>';
                    reDir('back',1);
                    }



               }
            
            else
            {
              echo '<div class="alert alert-danger">' . 'You must write Department no. in <strong> text box </strong>' . '</div>';
               reDir('back',1);   ///////////////*********dep********//////////////////
           
            }
         
           break;



           default:
           
           echo '<div class="alert alert-danger">' . 'You must choose from<strong> drop menu box FIRST</strong>' . '</div>';
           
           reDir('back',1);    ///////***ser && dep**//////////
           break;
           exit();
          }
         
     } 
      
  }
        

        else
        {

          header('location:dashboard.php');
        }

        break;
 


  		default:

  		 header('location: dashboard.php');
  		 // echo 'hellohellohellohellohello';
       break;
  		}
  		require $tpl . "footer.php" ;                                    // FOOTER FILE    // this is the second companion of our script
  }
  else 
  {

    header('location:index.php');
  }      
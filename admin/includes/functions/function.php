<?php
//echo 'function file is here';          // stmt test
  function gettitle()
  {
  	global $title ;
  	if (isset($title))
  	{
  		echo $title ;
  	} else 
  	{
       echo 'DEFAULT';
  	}
  }

  //***************************FUNCTION noRedun()     START********************************//
  function noRedun($select,$from,$value)
  {
    global $con;
    $stmt=$con->prepare("SELECT $select FROM $from WHERE $select=?");
    $stmt->execute(array($value));
    $row=$stmt->rowCount();
    return $row;
  }


//***************************FUNCTION Calibration check exist()     START********************************//
function calcheck($select,$from)
                      {
                        global $con;
                        $stmt=$con->prepare("SELECT $select FROM $from ");
                        $stmt->execute();
                        $row=$stmt->rowCount();
                        return $row;
                      }





 

/*//////////////////////////////// function deleteRedun() start*****/////////////////////////////////////////*/
function deleteRedun($select,$from,$value)
                                                  {
                                                    global $con;
                                                    $stmt=$con->prepare(" DELETE FROM $from WHERE $select=? ");
                                                    $stmt->execute(array($value));
                                                    /*$row=$stmt->rowCount();*/
                                                   /* if(($stmt->execute(array($value))=='true')
                                                      {return 1;}*/
                                                  }
  

////////////////////////////////**function deleteRedun() end***/////////////////////////////////////////

  //***************************FUNCTION noRedun()      END********************************//
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
/***************************************   function reDir() start                ************************************/
function reDir ($url1='null', $second=2)
{

  if ($url1==='null')
  {
   $url='dashboard.php';
  }else if ($url1 =='back')
  {
    if ((isset ($_SERVER['HTTP_REFERER'])) && (!empty($_SERVER['HTTP_REFERER'])))
    {$url=$_SERVER['HTTP_REFERER'];}
    else
    {
      $url='dashboard.php';
    }
  }else
  {
    $url =$url1;
  }
  
    echo "<div class='alert alert-info'>" . 'You\'ll Return back within Seconds.' . "</div>" ;
    header("refresh:$second ; url=$url");
  
/*echo "<div class='alert alert-info'>" . 'You\'ll Return back within 4 sec.' . '</div>' ;
header('refresh:$second ; url=$url');*/
exit();  
}

function hello ()
{
 echo 'hello';
}
/***************************************   function reDirect() end                ************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                                    

  /////////////////////////////////////////////*****////////////////////////////////////////
  ////////////////////////** switch lang  start**//////////////////////////
    
  
      
  
  /////////////////////////////////////////////*****////////////////////////////////////////
  ////////////////////////** switch lang end**//////////////////////////



    /////////////////////*******************///////////////////////////
    //////////////////////* UPLOAD FUNCTION START*/////////////////////////
    


    /*function upload()
    {

    }*/



    /////////////////////*******************///////////////////////////
    //////////////////////* UPLOAD FUNCTION END*/////////////////////////
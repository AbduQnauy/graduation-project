
<?php

if (isset ($_GET['do']) && ($_GET['do'] = 'index') )
{
session_start();                      // start session
  //print_r($_SESSION); 
  $title= 'SIGN IN';
  $noNavbar= '';
  //require "init.php";
  if (isset($_SESSION['username']))
  {
    header('location: dashboard.php');  //   goto_REdirect_ another page _EX: anypage_
  }
  require_once "init.php";                 // file of routes 
  
?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') //check if user comeing from http POST REQUEST or NOT
    {
      $username= $_POST['user'];
      $password= $_POST['pass'];
      

      $hashedPass=sha1($password);           // hashed password for protection    1
        


        // echo $hashedPass . '<br>';       // hashed password for protection    2
       // check if user existing in database 
      $stmt= $con->prepare ('SELECT 
                                   user_reg_name , password ,id
                             FROM   
                                   user 
                             WHERE 
                                   user_reg_name =?  
                             AND 
                                   password =? 
                             AND  
                                   rank=1');                                  // SQL Query with high constraints 
      $stmt->execute(array($username,$hashedPass));                          // Execute SQL commands
       $count= $stmt->rowCount();                                           //count Query' records
       //echo $count;                                           //print NO. of Query' records      //this is our helper
       
       $row=$stmt->fetch();
       if ( $count > 0)    // check if count > 0  this is mean database contain record about this user
       {
        //echo ' WELCOME ' . $username;
         $_SESSION['username'] = $username ;          //  Register Session Name
         $_SESSION['id']= $row['id'];                //   Register Session id    
         header('location: dashboard.php');          //   goto_REdirect_ another page _EX: anypage_   
         exit();
       }


    }
   
   
    ?>
     <form class='login' action='<?php echo 'index.php?do=index'?>' method='POST' >
      <h3 class='text-center' style="color:black;">SIGN IN</h3>
      <input class='form-control input-lg' type='text' name='user' placeholder='Username' autocomplete='off'/>
      <input class='form-control input-lg' type='password' name='pass' placeholder='Password' autocomplete='new-password'/>
      <input class='btn btn-lg btn-primary btn-block' type='submit' value='Login'/>
    </form>
<?php
}
?>
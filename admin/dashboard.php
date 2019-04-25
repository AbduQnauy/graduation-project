<?php 
  session_start();                      // start session
  //print_r($_SESSION); 
  $title='HOME';                // title variable
  if (isset($_SESSION['username']))
  {
    //$title='ADMIN BOARD';
   //echo 'you are welcome here';
   
   /*$_SESSION['username'] = $username ;*/


   require 'init.php';

   ?>
   
     <div></div>    <!--containt 1-->

     <p style="padding-left:360px; padding-top:10px; font-size:30px;color:black"><b>Hospital Equipment Control System</b></p>

    <header id="myCarousel" class="carousel slide container"style="margin-top:15px;height:450px;width:800px" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            
        </ol>
        <!-- Wrapper for Slides -->

        <div class="carousel-inner container" >
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <a id="a1">       <div class="fill" style="background-image:url('layout/images/insert.jpg');" id="d1"></div></a>
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
              <a id="a">  <div class="fill" style="background-image:url('layout/images/query.jpg');" id="d"></div></a>
                <div class="carousel-caption">

                </div>
            </div>
         
           
        </div>
      
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>




  <?php require $tpl . "footer.php" ;      // FOOTER FILE

  } else 
  {
  	//echo 'sorry access denied';
  	header('location: index.php');
  	exit();
  }
?>


  
  
<!--noNavbar-->
<nav class="navbar navbar-inverse">
  <div class="container">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php"><i class='glyphicon glyphicon-home'></i></a>
    </div>

    
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
        <li ><a href="insert.php?do=insert"><?php echo lang('add') ; ?></a></li>
        
        <li ><a href="query.php?do=query"><?php echo lang('query') ; ?></a></li>
        <li ><a href="user.php?do=MANAGE"><?php echo lang('manage') ; ?></a></li>
      </ul>
      
      




<ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['username']  ; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color:#d9d9d9">
            <li><a href="user.php?do=MODIFY&userid= <?php echo $_SESSION['id'] ?>"><?php echo lang('edit')?></a></li>
            <li><a href="signout.php"><?php echo lang('sign_out')?></a></li>
         
          </ul>
        </li>
      </ul>















      
   


    </div>
  </div>
</nav>





<!--
  <li>



 </a>
            </li>
-->
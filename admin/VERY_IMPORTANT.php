 <?/*php

								$do='';
								$do= isset ($_GET['do'])? $_GET['do']: 'MANAGE' ;   // if statement by shortcut
    				   if ( isset ($_GET['do']))
				  {
				  	$do= $_GET['do'];
				  } else 
				  {
				   $do='MANAGE';}
  					switch ($do) {
						case 'MANAGE':
						echo 'you are welcome to our MANAGE PAGE';
						echo '<a href="page.php?do=INSERT"> INSERT NEW EQUIP +</a>';
						break;
						case 'INSERT':
						echo 'you are welcome to our INSERT PAGE';
						echo '<a href="page.php?do=MODIFY">MODIFY EQUIP</a>';
						break;
						case 'MODIFY':
						echo 'you are welcome to our MODIFY PAGE';
						echo '<a href="page.php?do=REMOVE">REMOVE EQUIP</a>';
						break;
						case 'REMOVE':
						echo 'you are welcome to our REMOVE PAGE';
						echo '<a href="page.php?do=MANAGE">GO TO MANAGE PAGE</a>';
						break;
						default:
						echo 'there\'s no page here';
						break;
						}








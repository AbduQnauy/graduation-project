<?php
session_start();                              // start session
session_unset();                             //  unsetdata
session_destroy();                          //   destroy session
header('Location:start.php');              //     goto index.php page  
exit();
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title><?php gettitle() ?></title>
        <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css"/> 
        <link rel="stylesheet" href="<?php echo $css; ?>font-awesome.min.css"/> 
        <link rel="stylesheet" href="<?php echo $css; ?>backend.css"/> 


   <script src="../js/jquery.js"></script>
    
   
    <link href="../css/full-slider.css" rel="stylesheet">
<STYLE>
.d{

display: inline-block;


 }

 td.test {
    width: 200px; 

    word-break: break-all;
         }
 

</STYLE>


    <script>

        $(function () {

            $("#d1").click(function () {

                $("#a1").attr('href', 'insert.php?do=insert');

            })
          $("#d").click(function () {

                $("#a").attr('href', 'query.php?do=query');

            })


        })

    </script>
    </head>
  <body style="background-color:white;" >

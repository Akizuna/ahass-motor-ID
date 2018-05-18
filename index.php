<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//Header
require_once 'class/PageBuilder.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Booking Service</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        session_start();
        if (null !== filter_input(INPUT_GET, "logout") and 
                filter_input(INPUT_GET, "logout") == "Logout"){
            unset($_SESSION["user"]);
            unset($_SESSION["data"]);
        }
        Kelas\PageBuilder::navbar();
        Kelas\PageBuilder::redirect();
        // put your code here
        ?>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

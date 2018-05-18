<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <?php
        // put your code here
        session_start();
        require_once 'class/PageBuilder.php';
        Kelas\PageBuilder::navbar();
        Kelas\PageBuilder::redirect();
        ?>
        
        
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

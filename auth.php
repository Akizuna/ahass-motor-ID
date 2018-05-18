<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'class/PageBuilder.php';
$status = filter_input(INPUT_GET, "status");
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $status?></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        Kelas\PageBuilder::navbar();
        // put your code here
        ?>
        <div class="container">
            <?php Kelas\PageBuilder::auth() ?>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

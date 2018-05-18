<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="js/bootstrap.min.js" type="text/javascript">
        <title>Booking Service</title>
    </head>
    <body>
        <?php
        // put your code here
        require_once 'class/PageBuilder.php';
        session_start();
        Kelas\PageBuilder::navbar();
        //Kelas\PageBuilder::redirect();
        ?>
        <div class="container">
            <form action="auth.php?book='.$random.'" method="POST">
            <div class="row" id=>
            <div class="col-12">
                <label for="keluh">Keluhan</label>
                <input type="text" class="form-control" id="keluh" name="keluh"
                       style="height: 100px">
            </div>
        </div>
                <div class="row">
                    <div class="col-12">
                    <a href="booking.php?stat=book&count=1++" class="btn btn-success">
                        Butuh Sparepart?
                    </a>
                    </div>
                    <?php
                    if(isset($count)){?>
                    <div class="row">
                        <div class="col-12">
                            <label>Nama Sparepart</label>
                            <select name="sp<?php echo $count; ?>" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                                <?php
                    }
                    ?>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Pesan">
            </form>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

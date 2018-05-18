<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Sparepart</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        // put your code here
        require_once '../class/PageBuilder.php';
        $s = new \Kelas\PageBuilder();
        $s->navbar();
        $id = filter_input(INPUT_GET, "id");
        $nama = filter_input(INPUT_GET, "nama");
        $harga = filter_input(INPUT_GET, "harga");
        $stok = filter_input(INPUT_GET, "stok")
        ?>
        <div class="container">
            <form method="post" action="manajemen.php?status=sparepart">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">ID Sparepart</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="id-sparepart" class="form-control"
                                   value="<?php echo $id; ?>">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Nama Sparepart</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="nama-sparepart" class="form-control"
                                   value="<?php echo $nama ;?>">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Harga</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="harga-sparepart" class="form-control"
                                   value="<?php echo $harga; ?>">
                        </div>
                </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Stok</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="stok-sparepart" class="form-control"
                                   value="<?php echo $stok;?>">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2"><input type="submit" name="okok" value="OK"
                                              class="btn btn-block btn-dark"></div>
                </div>
            </form>
        </div>
    </body>
</html>

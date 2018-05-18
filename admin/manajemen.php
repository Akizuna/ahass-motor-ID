<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <?php
require_once '../class/sparepart.php';
$sp = new Kelas\sparepart();
        $stat = filter_input(INPUT_GET, "status");
        if (isset($_POST["ok"]) and $_POST["ok"] == "OK"){
            $id = $_POST["id-sparepart"];
            $nama = $_POST["nama-sparepart"];
            $harga = $_POST["harga-sparepart"];
            $stok = $_POST["stok-sparepart"];
            $a = $sp->insert($id, $nama, $harga, $stok);
            if ( $a == TRUE){
                ?>
<script>alert("success");</script>
<?php
            }
        }
        if (isset($_POST["okok"]) && $_POST["okok"] == "OK") {
          // code...
          $id = $_POST["id-sparepart"];
          $nama = $_POST["nama-sparepart"];
          $harga = $_POST["harga-sparepart"];
          $stok = $_POST["stok-sparepart"];
          $sp->edit($id,$nama,$harga,$stok);
        }
        $del = filter_input(INPUT_GET, "hapus");
        if(isset($del)){
            $sp->delete($del);
        }
        ?>
        <meta charset="UTF-8">
        <title>Manajemen <?php echo $stat; ?></title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        require_once '../class/PageBuilder.php';
        $de = new \Kelas\PageBuilder();
        $de->navbar();
        ?>
        <div class="container">
        <?php if($stat == "sparepart"){ ?>
            <br>
            <button type="button" class="btn btn-dark" id="plus">Input</button>
            <a href="index.php" class="btn btn-dark">Kembali</a>
            <br>
            <form method="post" action="" id="input">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">ID Sparepart</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="id-sparepart" class="form-control">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Nama Sparepart</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="nama-sparepart" class="form-control">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Harga</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="harga-sparepart" class="form-control">
                        </div>
                </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Stok</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="stok-sparepart" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2"><input type="submit" name="ok" value="OK"
                                              class="btn btn-block btn-dark"></div>
                </div>
            </form>
            <?php
                        $arr = $sp->view();
                        $rows = $sp->numRow();
            ?>
            <br>
            <table class="table table-striped table-active">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th colspan="2">Menu</th>
            </tr>
            <tr>
                <?php
                if($arr !== NULL){
                            for ($i = 0; $i < $rows; $i++){
                                ?>
            <tr>
                <td><?php echo $arr[$i][0]; ?></td>
                <td><?php echo $arr[$i][1]; ?></td>
                <td><?php echo $arr[$i][2];?></td>
                <td><?php echo $arr[$i][3];?></td>
                <td>
                    <a id="edit" class="btn btn-outline-info"
                       href="<?php  echo 'sparepart.php?id='.$arr[$i][0]
                               . '&nama='.$arr[$i][1]
                               . '&harga='.$arr[$i][2]
                               . '&stok='.$arr[$i][3];?>">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="<?php
                    echo 'manajemen.php?status=sparepart&hapus='.$arr[$i][0];
                    ?>"
                       id="hapus" class="btn btn-outline-info">
                        hapus
                    </a>
                </td>
            </tr>
                <?php
                            }
                } else { ?>
            <td colspan="6">Kosong</td>
             <?php   }
                ?>
            </tr>
        </table>
        <?php }elseif ($stat == "motor") {?>
            <br>
            <form method="post" action="">
            <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Nama Motor</div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="motor" class="form-control">
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2"><input type="submit" name="ok" value="OK"
                                              class="btn btn-block btn-dark"></div>
                </div>
            </form>
        <?php }elseif ($stat == "service") {
     header("Location: detil.php");
        } else {
     header("Location: index.php");
                    } ?>
        </div>
        <script src="../js/jquery-3.3.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script>
                $("document").ready(function(){
                    $("#input").hide();
                    $("#plus").click(function(){
                        $("#input").show();
                    });
                });
            </script>
    </body>
</html>

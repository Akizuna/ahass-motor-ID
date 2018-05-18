<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Utama</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/custom.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        if (NULL !== filter_input(INPUT_POST, "oke") and filter_input(INPUT_POST, "oke") == "oke");
        $user = filter_input(INPUT_POST, "user");
        $pass = filter_input(INPUT_POST, "pass");
        $_SESSION["user"] = "admin";
        require_once '../class/PageBuilder.php';
        $de = new \Kelas\PageBuilder();
        $de->navbar();
        if(@$_SESSION["user"] !== "admin"){
        ?>
        <!--
        Jika user adalah admin maka lakukan ...
       -->
        <form class="form-signin" method="POST" enctype="multipart/form-data"
                action="">
        <h2 class="form-signin-heading">Silahkan Login</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control"
               placeholder="Username" required autofocus name="user">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control"
               placeholder="Password" required name="pass">
        <input type="submit" class="btn btn-primary" value="oke" name="oke">
      </form>
        <?php } else {
          //?>
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Manajemen Sparepart</div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Input dan Edit data mengenai sparepart yang tersedia</p>
                            <a href="manajemen.php?status=sparepart" 
                               class="btn btn-block btn-outline-primary">OKE</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Manajemen Pelayanan Konsumen</div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Input dan Edit data mengenai tipe-tipe motor yang dilayani</p>
                            <a href="manajemen.php?status=motor" 
                               class="btn btn-block btn-outline-primary">OKE</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Manajemen Service</div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Membuat form WO, review data booking, dan masih banyak lagi</p>
                            <a href="manajemen.php?status=sparepart" 
                               class="btn btn-block btn-outline-primary">OKE</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

            <?php } ?>
       <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
       <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

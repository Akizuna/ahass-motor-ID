<?php

/*
 * Ini blueprint-nya si tukang buat halaman
 * Tiap alur ada petunjuk
 */
namespace Kelas;
require_once 'konsumen.php';
/**
 * Description of PageBuilder
 *  Kelas Pencipta halaman 
 * @author reza
 */
class PageBuilder {
    //put your code here
    public static function navbar(){
    if (isset($_SESSION["user"])){
        //navbar bagian ini kalo user udah login
    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#bleh" aria-controls="bleh" aria-expanded="false"
                    aria-label="Navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="bleh">
                <ul class="navbar-nav">
                <li>
                    <a class="btn btn-success nav-link" href="index.php?logout=Logout">
                        Log Out
                        </a>
                </li>
                </ul>
            </div>
        </nav>';
    }else {
        //Kalo belum kayak gini
        echo '<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php"> Home </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#kecil" aria-controls="kecil" aria-expanded="false" 
                    aria-label="Navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="kecil">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary nav-link"
                           href="auth.php?status=Login">
                            Login
                        </a>
                    </li>&nbsp; &nbsp;
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary nav-link"
                           href="auth.php?status=Daftar">
                            Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </nav>';
        
        }
    }

    public static function redirect(){
        $stat = filter_input(INPUT_GET, "stat");
        if($stat == "log"){
            //Setelah User Login Langsung ke laman booking
            //Jika user login, verifikasikan dulu...
            $user = filter_input(INPUT_POST, "user");
            $pass = filter_input(INPUT_POST, "pass");
            $konsumen = new konsumen();
            if( $konsumen->cek($user,$pass) === FALSE){
                return 0;
            } else {
                $_SESSION["data"] = serialize($konsumen);
                $_SESSION["user"] = $user;
                header("Location: booking.php?stat=book");
            }
        }elseif ($stat == "reg") {
            //Sama kayak yang diatas
            //atau kalo user mendaftar, ya... di daftarin
                    $nama = filter_input(INPUT_POST, "nama");
            $usern = filter_input(INPUT_POST, "username");
            $passw = filter_input(INPUT_POST, "password");
            $tipemotor = filter_input(INPUT_POST, "tipemotor");
            $nohp = filter_input(INPUT_POST, "nohp");
            $nopol = filter_input(INPUT_POST, "nopol");
            $alamat = filter_input(INPUT_POST, "alamat");
            $customer = new konsumen();
            if($customer->register($nama,$usern,$passw,$tipemotor,$nohp,$nopol,$alamat)){
                $_SESSION["user"] = $usern;
                $_SESSION["data"] = serialize($customer);
            }
            header("Location: booking.php?stat=book");
        }elseif ($stat == "book") {
            //tiba di halaman, booking verifikasikan kalo user tak 
            //sembarangan masuk
            $random = random_int();
            $_SESSION["rand"] = $random;
            echo '<div class="container">
            <form action="auth.php?book='.$random.'" method="POST">
            <div class="row" id=>
            <div class="col-12">
                <label for="keluh">Keluhan</label>
                <input type="text" class="form-control" id="keluh" name="keluh"
                       style="height: 100px">
                       </div>
                       </div>
                <br>
                Harga: <!-- PHP Generator -->
                <br>
                <br>
                <input type="submit" class="btn btn-success" value="Pesan">
            </form>
        </div>';
        }else{
            if(isset($_SESSION["user"])){
                //Di index.php, jika user udah login, tampilin menu...
                echo '<div class="container">
            <div class="card-deck">
                   <div class="card">
                       <img class="card-img-top" src="image/akun.png" alt="Booking Service">
                    <div class="card-body">
                    <h4 class="card-title">Kustomisasi Akun</h4>
                    <a class="btn btn-primary" href="">Booking</a>
                   </div>
                   </div>
                <div class="card">
                    <img class="card-img-top" src="image/unnamed.png" alt="Booking Service">
                <div class="card-body">
                    <h4 class="card-title">Booking Service</h4>
                        <a class="btn btn-primary" href="booking.php?stat=book">Booking</a>
                </div>
                </div>
            </div>
        </div>';
            } else {
                //atau tampilin laman depan kalo belum login
                echo '<main role="main" >
            <div class="jumbotron" 
                 style="background-image: url(image/Untitled.png);
                 background-repeat: no-repeat;
                 background-size: 100%;
                 background-origin: border-box">
        <div class="container ">
            <h1 class="display-3" style=" color: white">Lorem Ipsum Gipsum</h1>
            <p style=" color: wheat">ba bi bu be bo pa pi pu pe po</p>
            <p><a class="btn btn-primary btn-lg" href="auth.php?status=Daftar" role="button">Daftar Sekarang !</a></p>
        </div>
      </div>
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                <h2>Beep</h2>
            </div>
                <div class="col-md-4">
                    <h2>Bop</h2>
                </div>
                <div class="col-md-4">
                    <h2>Beep</h2>
                </div>
            </div>
        
        </div>
        </main>';
            }
        }
    }


    public static function auth(){
        if (filter_input(INPUT_GET, "status") == "Login"){
            //Ini bagian laman login
            echo '<form class="form-signin" method="POST" enctype="multipart/form-data"
                action="result.php?stat=log">
        <h2 class="form-signin-heading">Silahkan Login</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" 
               placeholder="Username" required autofocus name="user">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" 
               placeholder="Password" required name="pass">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>';
        } elseif (filter_input(INPUT_GET, "status") == "Daftar") {
            //ini bagian laman daftar
            echo '<form method="POST" enctype="multipart/form-data" 
                action="result.php?stat=reg">
                <h3>Silahkan isi data Dibawah Ini</h3>
                <div class="row">
                    <div class="col-4">
                <label for="nama" class="form-check-label">Nama</label>
                <input type="text" class="form-control" name="nama"
                       id="nama" required>
                    </div>
                    <div class="col-4">
                <label for="user" class="form-check-label">Username</label>
                <input type="text" class="form-control" name="username"
                       id="user" required>
                    </div>
                    <div class="col-4">
                <label for="pass" class="form-check-label">Password</label>
                <input type="password" class="form-control" name="password"
                       id="pass" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="tipemotor" class="form-check-label">Tipe Motor</label>
                        <select name="tipemotor" id="tipemotor" 
                                class="form-control">';
            $tipe = new konsumen();
            $tipe->make();
            echo '</select>
                    </div>
                    <div class="col-4">
                <label for="nohp" class="form-check-label">Nomor HP</label>
                <input type="text" class="form-control" name="nohp"
                       id="nohp" required>
                    </div>
                    <div class="col-4">
                <label for="nopol" class="form-check-label">Nomor Polisi</label>
                <input type="text" class="form-control" name="nopol"
                       id="nopol" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                <label for="alamat" class="form-check-label">Alamat</label>
                <input type="text" class="form-control" name="alamat"
                       id="alamat" style=" height: 100px" required>
                    </div>
                </div>
                <br>
                    <div class="row">
                        <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </div>
            </form>
            </div>';
        }elseif (filter_input(INPUT_GET, "book") == $_SESSION["rand"]) {
            
        }else{
            //Script Error...
            die("Error, Tidak ada data untuk Diproses!");
        }
    }
}

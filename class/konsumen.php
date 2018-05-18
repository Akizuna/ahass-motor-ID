<?php

/*
 * Kelas ini mengandung semua data tentang user yang diabadikan nantinya didalam 
 * session bernama $_SESSION["data"], berguna untuk kustomisasi akun
 */

/**
 * Description of konsumen
 *
 * @author reza
 */

namespace Kelas;
require_once 'tipemotor.php';
use Exception;
use mysqli;

class konsumen extends tipemotor {

    protected $id_konsumen;
    protected $nama;
    protected $alamat;
    protected $no_hp;
    private $pwd;
    private $username;
    protected $nopol;


    public function cek(String $username= "",String $password = "") {
        $query = "select id_konsumen from konsumen where username=? and pwd=?";
        $mysqli = new mysqli("localhost", "root", "", "mike");
        try{
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            if ($stmt->execute() == FALSE){
                throw new Exception("gagal login, coba lagi nanti",1);
            }
            $result = $stmt->get_result();
            $id = $result->fetch_array();
            if ($id == NULL){
                throw new Exception("Maaf, anda tidak terdaftar sebagai anggota",2);
            }
            $this->id_konsumen = $id[0];
            $this->username = $username;
            $this->pwd= $password;
            $this->generate();
        } catch (Exception $ex){
            if($ex->getCode() == 1){
                echo '<div class="container">';
                echo '<h1>'.$ex->getMessage().'</h1>';
                echo '<a class="btn btn-danger" href="index.php">';
                echo 'Kembali ke Beranda';
                echo '</a>';
                echo '</div>';
                return FALSE;
            }elseif ($ex->getCode() == 2) {
                echo '<div class="container">';
                echo '<h1>'.$ex->getMessage().'</h1>';
                echo '<a class="btn btn-danger" href="index.php">';
                echo 'Kembali ke Beranda';
                echo '</a>';
                echo '&nbsp';
                echo '<a class="btn btn-success" href="auth.php?status=Daftar">';
                echo 'Mendaftar Sekarang';
                echo '</a>';
                echo '</div>';
                return FALSE;
            }
        }
            
    }
    
    public function __sleep() {
        return array_keys(get_object_vars($this));
    }
    
    public function generate(){
        $id = $this->id_konsumen;
        $query = "select * from konsumen where id_konsumen=?";
            $mysqli = new mysqli("localhost", "root", "", "mike");
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $hasil = $stmt->get_result();
            while ($arr = $hasil->fetch_assoc()){
                $this->alamat = $arr["alamat"];
                $this->nama = $arr["nama"];
                $this->no_hp = $arr["no_hp"];
                $this->nopol = $arr["nopol"];
                $this->namamotor = $arr["type_motor"];
                $this->genMotor();
            }
    }
    
    public function genMotor(){
        $query = "select id_motor from motor where nama=?";
        $motor = $this->namamotor;
        $mysqli = new mysqli("localhost", "root", "", "mike");
        try{
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $motor);
            if($stmt->execute()){
                throw new Exception("Error memeriksa motor", 3);
            }
            $stmt->bind_result($this->idmotor);
        } catch (Exception $ex) {
            $error = [$ex->getMessage(), $ex->getCode()];
            return $error;
        }
    }

        public function register($nama,$usern,$pass,$tipemotor,$nohp,$nopol,$alamat){
        $query = "insert into konsumen values(0,?,?,?,?,?,?,?)";
        $mysqli = new mysqli("localhost", "root", "", "mike");
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssssss", $nama,
                $alamat,
                $nohp,
                $pass,
                $usern,
                $nopol,
                $tipemotor);
        if($stmt->execute()){
            $this->id_konsumen = $stmt->insert_id;
            $this->generate();
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

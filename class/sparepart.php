<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kelas;

/**
 * Description of sparepart
 *
 * @author reza
 */
class sparepart {
    //put your code here
    public function view(){
        $query = "select * from sparepart";
        $conn = new \mysqli("localhost","root","","mike");
        try {
            if($conn->error){
                throw new Exception("Error koneksi DB");
            }
            $stmt = $conn->prepare($query);
            if($stmt->execute() == FALSE){
                throw new Exception("Gagal Memasukkan data ke DB, coba lagi nanti");
            }
            $result = $stmt->get_result();
            $array = $result->fetch_all();
            return $array;
        } catch (Exception $ex) {

        }
    }

    public function numRow(){
        $query = "select * from sparepart";
        $conn = new \mysqli("localhost","root","","mike");
        try {
            if($conn->error){
                throw new Exception("Error koneksi DB");
            }
            $stmt = $conn->prepare($query);
            if($stmt->execute() == FALSE){
                throw new Exception("Gagal Memasukkan data ke DB, coba lagi nanti");
            }
            $result = $stmt->get_result();
            $rows = $result->num_rows;
            return $rows;
        } catch (Exception $ex){

        }
    }

    public function insert($id, $nama, $harga, $stok){
        $query = "insert into sparepart values(?,?,?,?)";
        $conn = new \mysqli("localhost", "root", "","mike");
        try {
            if($conn->error){
                throw new Exception($conn->error);
            }
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $id,$nama,$harga,$stok);
            $stmt->execute();
            return TRUE;
        } catch (Exception $ex) {

        }
    }

    public function edit($id,$nama,$harga,$stok){
        $query = "update from sparepart set id_sparepart=?, nama_sparepart=?, harga=?, stok=? where id_sparepart=?";
        $conn = new \mysqli("localhost", "root", "","mike");
        try{
           if($conn->error){
                throw new Exception($conn->error);
            }
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss",$id,$nama,$harga,$stok,$id);
            $stmt->execute();
            return TRUE;
        } catch (Exception $ex) {

        }
    }

    public function delete($id){
        $query = "delete from sparepart where id_sparepart=?";
        $conn = new \mysqli("localhost", "root", "","mike");
        try{
           if($conn->error){
                throw new Exception($conn->error);
            }
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return TRUE;
        } catch (Exception $ex) {

        }
    }
}

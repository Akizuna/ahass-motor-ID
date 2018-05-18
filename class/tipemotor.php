<?php

/*
 * Ini orangtuanya si konsumen. cuman beberapa tambahan tentang
 * tipemotor yang ada di DB biar teratur
 */

namespace Kelas;

/**
 * Description of tipemotor
 *
 * @author reza
 */
class tipemotor {
    //put your code here
    protected $idmotor;
    protected $namamotor;
    
    public function make(){
        $query = "select * from motor";
        $mysqli = new \mysqli("localhost", "root", "", "mike");
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($rows = $result->fetch_assoc()){
            if ($rows === NULL){
                return 0;
            }
                echo '<option value="'.$rows["id_motor"].'">'.$rows["nama"].'</option>';
            }
            $result->free_result();
    }
}

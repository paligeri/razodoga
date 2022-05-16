<?php 
        require_once 'db.php';

        $sql = "SELECT hirdetes_infok.id, cim, fokepURL, ar, feladas_datum, telepulesek.nev FROM `hirdetes_infok` INNER JOIN telepulesek ON telepulesek_id = telepulesek.id;";

        $stmt = $db -> query($sql);
        echo json_encode($stmt -> fetchAll());

?>
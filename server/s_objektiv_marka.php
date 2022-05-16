<?php 
require_once 'db.php';

$sql = "SELECT id, nev FROM `objektiv_marka`;";

$stmt = $db -> query($sql);
echo json_encode($stmt -> fetchAll());

?>
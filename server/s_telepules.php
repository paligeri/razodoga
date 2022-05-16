<?php 
require_once 'db.php';

$sql = "SELECT * FROM `telepulesek`;";

$stmt = $db -> query($sql);
echo json_encode($stmt -> fetchAll());

?>
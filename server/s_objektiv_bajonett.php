<?php 
require_once 'db.php';

$sql = "SELECT * FROM `objektiv_bajonett`;";

$stmt = $db -> query($sql);
echo json_encode($stmt -> fetchAll());

?>
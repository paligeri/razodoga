<?php
require_once "db.php";

$neve=$_GET['nev'];
$neme=$_GET['ferfi'];
$sql="insert into maszo values (null,'{$neve}','{$neme}')";
$stmt=$db->exec($sql);
echo $stmt;
?>
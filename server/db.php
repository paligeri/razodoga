<?php
$host = 'localhost';        // host neve
$db_name = 'aprofoto';      // adatbázis neve
$db_username = 'root';      // adatbázis felhasználóneve
$db_password = '';          // adatbázis jelszava

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];     
try{
    $db = new PDO("mysql:host=$host;dbname=$db_name; charset=utf8",$db_username,$db_password,$options);
}catch(PDOException $e)	{
    echo "Hiba, az adatbázis kapcsolódás sikertelen.".$e->getMessage();
    exit;
}		
?>
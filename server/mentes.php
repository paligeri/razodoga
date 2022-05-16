<?php
require_once "db.php";
require_once "folders.php";

extract($_POST);
$kepString;
//$_cim = mysql_real_escape_string($cim);
// PDO::prepare
$sql = "INSERT INTO hirdetes_infok (cim, ar, elerheto, leiras)
        VALUES ('{$cim}',{$ar},1,'{$leiras}');";
echo $sql;
//$stmt=$db->exec($sql);
$hirdetes_infok_id = $db->lastInsertId();


    mkdir("../hirdetesek/objektivek/".$hirdetes_infok_id);
    mkdir("../hirdetesek/objektivek/".$hirdetes_infok_id."/img");
    
    $target_dir ="../hirdetesek/objektivek/".$hirdetes_infok_id."/img/";    // //img/   ?
    
    $target_file = $target_dir.basename($_FILES["fokep"]["name"]);
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;
    
    $check = getimagesize(($_FILES["fokep"]["tmp_name"]));
    if($check !== false){
        $uploadOk = 1;
    }else{
        echo '<script> alert("A kiválasztott fájl nem kép, válasszon ki egy képet");</script>';
        $uploadOk = 0;
    }
    
    
    if ($_FILES["fokep"]["size"] > 500000) {
        // HA a kép nagyobb mint 500KB akkor nem fogja felölteni.
        echo "A kép mérete túl nagy.";
        $uploadOk = 0;
      }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Csak JPG, JPEG, PNG & GIF formátumú képek elfogadottak.";
      $uploadOk = 0;
    }
    
    if($uploadOk == 0){
        echo "A fájl nem lett feltöltve";
        // valahogy jelezni, kell, hogy nem megfelelő valami, pl. file méret
    }else {
        $temp = explode(".", $_FILES["fokep"]["name"]);
        $newfilename ="fokep".'.'.end($temp);
        move_uploaded_file($_FILES["fokep"]["tmp_name"],$target_dir.basename($newfilename));
    
        $fileCount = count($_FILES["kepek"]["name"]);
    
        for($i=0; $i<$fileCount; $i++){
            $fileName = $_FILES["kepek"]["name"][$i];
            $temp = explode(".", $_FILES["kepek"]["name"][$i]);
            $newfilename=$i.'.'.end($temp);
            $kepString += $i.'.'.end($temp)+";";
            move_uploaded_file($_FILES["kepek"]["tmp_name"][$i], $target_dir.basename($newfilename));
        }
        $sql = "INSERT INTO kepek (kep_string, count_kepek)
        VALUES ('$kepString',$fileCount);";
        $stmt=$db->exec($sql);
    }
    $target_dir ="hirdetesek/objektivek/".$hirdetes_infok_id."/img/";
    $target_file = $target_dir .basename($_FILES["fokep"]["name"]);




$sql = "INSERT INTO hirdetes_infok (cim, ar, elerheto, leiras)
        VALUES ('{$cim}',{$ar},1,'{$leiras}');";
echo $sql;
//$stmt=$db->exec($sql);
$hirdetes_infok_id = $db->lastInsertId();

$sql = "UPDATE hirdetes_infok SET fokepURL = \"$target_file\" WHERE id = $hirdetes_infok_id;";
//$stmt=$db->exec($sql);

//eddig csak a hirdetes infok

if($kategoriak==1){
    if(!isset($_POST['fix_fokusz'])){   $fix_fokusz=0;  }
    if(!isset($_POST['fix_rekesz'])){   $fix_rekesz=0;  }
    if(!isset($_POST['stablizator'])){  $stablizator=0; }
    if(!isset($_POST['autofokusz'])){   $autofokusz=0;  }

    if($fix_rekesz=="on"){ $fix_rekesz=1; } else { $fix_rekesz=0; }
    if($fix_fokusz=="on"){ $fix_fokusz=1; } else { $fix_fokusz=0; }
    if($autofokusz=="on"){ $autofokusz=1; } else { $autofokusz=0; }
    if($stablizator=="on"){ $stablizator=1; } else { $stablizator=0; }


    $sql="INSERT INTO objektiv_hirdetesek (hirdetes_infok_id, objektiv_marka_id, kategoriak_id, fix_fokusztav, min_fokusztav, max_fokusztav, rekesz_fix, rekesz_min, rekesz_max, stabilizator, autofokusz, bajonett_id)
        VALUES ({$hirdetes_infok_id},{$objektiv_marka},{$kategoriak},{$fix_fokusz},{$min_fokusztav},{$max_fokusztav},{$fix_rekesz},{$min_rekesz},{$max_rekesz},{$stablizator},{$autofokusz},{$bajonett})";
    //$stmt=$db->exec($sql);
    echo $sql;
}



?>
<!--
    restricted characters:    
        
        '";()\%,
-->
<!-- 
    Last edit 2022.04.06 14:12
-->
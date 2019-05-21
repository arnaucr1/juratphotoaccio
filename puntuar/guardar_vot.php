<?php
include "../php/bbdd.php";

if (isset($_POST["punts"])) {
    $puntuacio3 = $_POST["punts"];
    $idfoto = $_POST["idfoto"];
    $id_soci = $_POST["idsoci"];
    $id_concurs = $_POST["idconcurs"];
    
    $insertar = insertar_puntuacio($id_concurs, $id_soci, $idfoto, $puntuacio3);
    if ($insertar == "ok") {
        print "<script>window.location='index.php#$idfoto';</script>";	
    }else{
        echo "ERROR";
    }

}
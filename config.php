<?php
    $kasutaja = "kadri";
    $dbserver = "localhost";
    $andmebaas = "maraton";
    $pw = "kadri";

    $yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmebaas);

    if(!$yhendus){
        die("Sa jälle ebaõnnestusid!");
    }

?>
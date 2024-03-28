<?php include("config.php"); ?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="favicon.png" type="image/png">
<title>MySql</title>
</head>
<body>

<div class="container">

<h2>Tallinna Maratoni Andmed</h2>

<div class="row">
    <div class="col">
        <h3>1. Päring: Kuvage id, nimi ja riik piirates tulemusi esimese 10ni.</h3>
        <?php


$sql = "SELECT id, nimi, riik FROM tallinn_marathon LIMIT 10";
$result = $yhendus->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        print_r("ID: " . $row["id"]. " - Nimi: " . $row["nimi"]. " - Riik: " . $row["riik"]. "<br>");
    }
} else {
    echo "Andmeid ei leitud";
}
        ?>
    </div>
</div>



<div class="row">
    <div class="col">
        <h3>2. Päring: Valige osalejad Soomest, kes on registreerunud pärast 1. märts 2024, ja sorteerige tulemused finišiaja järgi.</h3>
        <?php
$sql = "SELECT * FROM tallinn_marathon WHERE riik = 'Soomest' AND registreerimine > '2024-03-01' ORDER BY finish";
$result = $yhendus->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Andmeid ei leitud";
}
        ?>
    </div>
</div>




<div class="row">
    <div class="col">
        <h3>3. Päring: Arvutage, mitu osalejat oli igas vanusegrupis 18-30.</h3>
        <?php
$sql = "SELECT COUNT(*) AS osalejate_arv FROM tallinn_marathon WHERE vanus BETWEEN 18 AND 30";
$result = $yhendus->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    print_r($row["osalejate_arv"]);
} else {
    echo "Andmeid ei leitud";
}
        ?>
    </div>
</div>


<div class="row">
    <div class="col">
        <h3>4. Päring: Valige 3 juhuslikku osalejat, kelle sugu on 'Female' ja kes lõpetasid maratoni, kuvage nende nimed.
.</h3>
        <?php
$sql = "SELECT nimi FROM tallinn_marathon WHERE sugu = 'Female' AND finish IS NOT NULL ORDER BY RAND() LIMIT 3";
$result = $yhendus->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        print_r($row['nimi']);
        echo "<br>";
    }
} else {
    echo "Andmeid ei leitud";
}
        ?>
    </div>
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
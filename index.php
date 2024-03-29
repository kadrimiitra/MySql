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
        <?php
        $paring = "SELECT id, nimi, riik FROM tallinn_marathon LIMIT 10";
        $valjund = mysqli_query($yhendus, $paring);
        ?>
        <h3>1. Päring: Kuvage id, nimi ja riik piirates tulemusi esimese 10ni.</h3>
         <?php print_r( $paring); ?>
         <table class="table">

            <thead>
                <tr>
                    <th class="table-primary">ID</th>
                    <th class="table-primary">Nimi</th>
                    <th class="table-primary">Riik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rida = mysqli_fetch_assoc($valjund)) {
                    echo "<tr>";
                    echo "<td>" . $rida['id'] . "</td>";
                    echo "<td>" . $rida['nimi'] . "</td>";
                    echo "<td>" . $rida['riik'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<div class="row">
    <div class="col">
    <?php
        $paring = "SELECT * FROM tallinn_marathon WHERE riik = 'Finland' AND registreerimine > '03-01-2024' ORDER BY finish";
        $valjund = mysqli_query($yhendus, $paring);
        ?>
        <h3>2. Päring: Valige osalejad Soomest, kes on registreerunud pärast 1. märts 2024, ja sorteerige tulemused finišiaja järgi.</h3>
        <?php print_r( $paring); ?>
                <table class="table">
            <thead>
                <tr>
                    <th class="table-primary">ID</th>
                    <th class="table-primary">Nimi</th>
                    <th class="table-primary">Riik</th>
                    <th class="table-primary">Registreerimine</th>
                    <th class="table-primary">Finish</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rida = mysqli_fetch_assoc($valjund)) {
                    echo "<tr>";
                    echo "<td>" . $rida['id'] . "</td>";
                    echo "<td>" . $rida['nimi'] . "</td>";
                    echo "<td>" . $rida['riik'] . "</td>";
                    echo "<td>" . $rida['registreerimine'] . "</td>";
                    echo "<td>" . $rida['finish'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col">
    <?php
        $paring = "SELECT COUNT(*) AS osalejate_arv FROM tallinn_marathon WHERE vanus BETWEEN 18 AND 30";
        $valjund = mysqli_query($yhendus, $paring);
        ?>
        <h3>3. Päring: Arvutage, mitu osalejat oli igas vanusegrupis 18-30.</h3>
        <?php print_r( $paring); ?>
                <table class="table">
            <thead>
                <tr>
                    <th class="table-primary">Osalejate arv vanusegrupis 18-30</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php

                        while ($rida = mysqli_fetch_assoc($valjund)) {
                            echo "<tr>";
                            echo "<td>" . $rida['osalejate_arv'] . "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<div class="row">
    <div class="col">
    <?php
        $paring = "SELECT nimi FROM tallinn_marathon WHERE sugu = 'Female' AND finish IS NOT NULL ORDER BY RAND() LIMIT 3";
        $valjund = mysqli_query($yhendus, $paring);
        ?>
        <h3>4. Päring: Valige 3 juhuslikku osalejat, kelle sugu on 'Female' ja kes lõpetasid maratoni, kuvage nende nimed.</h3>
        <?php print_r($paring); ?>
                <table class="table">
            <thead>
                <tr>
                    <th class="table-primary">Osaleja nimi</th>
                </tr>
            </thead>
            <tbody>
                <?php



                    while($rida = mysqli_fetch_assoc($valjund)) {
                        echo "<tr>";
                        echo "<td>";
                        print_r($rida['nimi']);
                        echo "</td>";
                        echo "</tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
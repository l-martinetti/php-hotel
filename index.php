<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

$parking_requested = false;

if (isset($_GET['parking']) && $_GET['parking'] == "on") {
    $parking_requested = true;
}

$minimum_vote = 0;

if(isset($_GET['minimum_vote']) && is_numeric($_GET['minimum_vote']) && $_GET['minimum_vote'] >= 0 && $_GET['minimum_vote'] <= 5){
    $minimum_vote = (int)$_GET['minimum_vote'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
    
    <title>PHP Hotel</title>

</head>
<body>

<h1 class='m-2 text-center'>Hotels</h1>
<hr>

<!-- Form di filtraggio -->
<form method="GET" class="w-50 mx-auto my-4 d-flex justify-content-between">
    <div class="form-control">
        <label for="parking">Parcheggio</label>
        <input type="checkbox" id="parking" name="parking">
    </div>

    <div class="form-control mx-3">
        <label for="minimum_vote">Voto minimo</label>
        <input id="minimum_vote" name="minimum_vote" type="number" min="1" max="5">
    </div>

    <button type="submit" class="btn btn-primary">Filtra</button>
</form>

<!-- Tabella -->
<table class="table w-75 mx-auto mt-4">
  <thead>
    <tr>
        <?php 
        foreach($hotels[0] as $key => $value) {
            echo "<th scope='col'>" . ucfirst($key) . "</th>";
        }
        ?>
    </tr>
  </thead>
  <tbody>
        <?php
        foreach ($hotels as $hotel) {

            // controllo parcheggio
            if($parking_requested) {
                if(!$hotel['parking'] ){
                    
                    continue;
                }
            }

            // controllo voto
            if($hotel['vote'] < $minimum_vote ){

                continue;
            }

            echo "<tr>";
            foreach ($hotel as $key => $value) {
                if ($key == 'parking') {
                    echo "<td>" . ($value ? 'Si' : 'No') . "</td>";
                } else {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";  
        }
        ?>
  </tbody>
</table>
    
</body>
</html>

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

<h1>Lista hotel</h1>

<?php

?>

<table class="table">
  <thead>
    <tr>
        <?php 

        foreach($hotels[0] as $key => $value) {
            $key = ucfirst($key);
            echo "<th scope='col'>$key</th>";
        }

      ?>
    </tr>
  </thead>
  <tbody>
            <?php

        foreach($hotels as $hotel){
            
            foreach($hotel as $key => $value){
                
                if ($key == 'parking' && $value == true){
                    echo "<td>Si</td>";
                } elseif ($key == 'parking' && $value == false) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>$value</td>";
                }
            }

           echo "<tr></tr>";  
        }
            ?>
  </tbody>
</table>
    
</body>
</html>
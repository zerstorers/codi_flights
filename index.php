<?php
    $db = new PDO('mysql:host=localhost;dbname=codi_flight' , "root" , "plop");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Airbn'Rbib</title>
</head>

<body>
    <main class="w-50 m-auto bg-dark text-light text-center">

        <!-- FLIGHT LIST -->
        <h1>Listes de tout les viols : </h1>
        
        <div class="w-50 m-auto">

            <table class="table text-light">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Pris à</th>
                    <th scope="col">Jusqu'à</th>
                    <th scope="col">Depuis le</th>
                    <th scope="col">Jusqu'au</th>
                    </tr>
                </thead>

                <p>Si je suis sous une vieille peux t'on dire que je suis soul'agée ?</p>
                <p>Rigole ou je t'imole.</p>
         
                <tbody>
                    <?php

                        // $req = $db->query('SELECT * FROM airport INNER JOIN flight ON airport.code = flight.airport_from ORDER BY departure_date');
                        // $req2 = $db->query('SELECT * FROM airport INNER JOIN flight ON airport.code = flight.airport_to');

                        $req = $db->query('SELECT flight.* , from_city.city AS depart , to_city.city AS arrival FROM flight 
                        INNER JOIN airport AS from_city ON flight.airport_from = from_city.code 
                        INNER JOIN airport AS to_city ON flight.airport_to = to_city.code
                        ORDER BY departure_date');
                        

                        // $req=$db->query('SELECT flight.*,
                        //     fromcity.city AS depart,
                        //     tocity.city AS arrival
                        //     FROM  flight
                        //     INNER JOIN airport AS fromcity ON flight.airport_from = fromcity.code
                        //     INNER JOIN airport AS tocity ON flight.airport_to = tocity.code
                        //     ORDER BY departure_date');
                        
                        foreach($req as $row) {

                    ?>
                    <tr>
                    <th scope="row"><?php echo $row["id"] ?></th>      
                    <td class="text-white"><?php echo $row["code"] ?></td class="text-white">
                    <td class="text-white"><?php echo $row["depart"] ?></td class="text-white">
                    <td class="text-white"><?php echo $row["arrival"] ?></td class="text-white">
                    <td class="text-white"><?php echo $row["departure_date"] ?></td class="text-white">
                    <td class="text-white"><?php echo $row["arrival_date"] ?></td class="text-white">
                    </tr>
                    <?php
                        }
                    ?>

                    
                </tbody>
            </table>

        </div>
        <!-- FLIGHT LIST -->

        

    </main>


    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>



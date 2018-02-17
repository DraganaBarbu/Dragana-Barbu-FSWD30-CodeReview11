<?php
		include_once 'dbconnect.php';
        header("Content-Type: application/json; charset=UTF-8");

        $obj = json_decode($_GET["office"], false); // Convert the request into an object

        $result = $conn->query("SELECT php_car_rental_agency.id,php_car_rental_agency.office_name,address.zip,address.city,address.country,address.area  FROM php_car_rental_agency INNER JOIN address on php_car_rental_agency.fk_address_id = address.address_id");

        $outp = array(); // create an empty array
        $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>ID</th><th>Office Name</th><th>ZIP Code</th><th>City</th><th>Country</th><th>Area</th></tr></thead>";
        foreach($outp as $row){
              	echo "<tr><td>";
                echo $row['id'];
                echo "</td><td>";
                echo $row['office_name'];
                echo "</td><td>";
                 echo $row['zip'];
                echo "</td><td>";
                 echo $row['city'];
                echo "</td><td>";
                 echo $row['country'];
                echo "</td><td>";
                 echo $row['area'];
                echo "</td></tr>";



            }
            echo "</table>";


        //echo json_encode($outp); // return the object as JSON


?>

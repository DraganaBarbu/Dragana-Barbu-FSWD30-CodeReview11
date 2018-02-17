<?php
		include_once 'dbconnect.php';
        header("Content-Type: application/json; charset=UTF-8");

        $obj = json_decode($_GET["location"], false); // Convert the request into an object

        $result = $conn->query("SELECT customer.location, count(customer.location) as 'NOF' FROM customer INNER JOIN cars on customer.fk_car_id = cars.car_id GROUP BY customer.location;");

        $outp = array(); // create an empty array
        $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>Location</th><th>Number Of Cars</th></tr></head>";
        foreach($outp as $row){
              echo "<tr><td>";
                echo $row['location'];
                echo "</td><td>";
                echo $row['NOF'];
                echo "</td></tr>";

            }
            echo "</table>";


        //echo json_encode($outp); // return the object as JSON


?>

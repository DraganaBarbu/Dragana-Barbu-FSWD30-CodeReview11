<?php
		include_once 'dbconnect.php';
        header("Content-Type: application/json; charset=UTF-8");

        $obj = json_decode($_GET["locar"], false); // Convert the request into an object

        $result = $conn->query("SELECT cars.car_id,cars.car_name, customer.location FROM cars right JOIN customer on cars.car_id = customer.fk_car_id ;");

        $outp = array(); // create an empty array
        $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>Car ID</th><th>Car Name</th><th>Location</th></tr></thead>";
        foreach($outp as $row){
                echo "<tr><td>";
                echo $row['car_id'];
                echo "</td><td>";
                echo $row['car_name'];
                echo "</td><td>";
                echo $row['location'];
                echo "</td></tr>";

            }
            echo "</table>";
        //echo json_encode($outp); // return the object as JSON
?>

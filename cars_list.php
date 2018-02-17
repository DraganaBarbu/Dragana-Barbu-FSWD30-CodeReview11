<?php
		include_once 'dbconnect.php';
        header("Content-Type: application/json; charset=UTF-8");

        $obj = json_decode($_GET["CarList"], false); // Convert the request into an object

        $result = $conn->query("SELECT cars.car_id,cars.car_name,cars.car_type,cars.module,php_car_rental_agency.office_name,cars.status FROM cars INNER JOIN php_car_rental_agency ON cars.fk_office_id  = php_car_rental_agency.id
");

        $outp = array(); // create an empty array
        $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<table class='table table-striped'><thead><tr><th>ID</th><th>Car Name</th><th>Type</th><th>Module</th><th>Office Name</th><th>Status</th></tr></thead>";
        foreach($outp as $row){
              echo "<tr><td>";
                echo $row['car_id'];
                echo "</td><td>";
                echo $row['car_name'];
                echo "</td><td>";
                echo $row['car_type'];
                echo "</td><td>";
                echo $row['module'];
                echo "</td><td>";
                echo $row['office_name'];
                echo "</td><td>";
                echo $row['status'];
                echo "</td></tr>";

            }
            echo "</table>";


        //echo json_encode($outp); // return the object as JSON


?>

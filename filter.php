<?php

include_once 'dbconnect.php';

$options = $_POST['options'];

$sql = "SELECT cars.car_id,cars.car_name,cars.car_type,cars.module,php_car_rental_agency.office_name,customer.location FROM cars INNER JOIN php_car_rental_agency ON cars.fk_office_id = php_car_rental_agency.id INNER JOIN customer on customer.fk_car_id = cars.car_id where location = '$options'" ;
if (mysqli_query($conn,$sql)){
    echo "Successfuly selected";
} else {
    echo "failed to select";
}

?>

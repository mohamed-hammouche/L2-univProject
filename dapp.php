<?php

include 'db.php';

$currentDateTime = date('Y-m-d H:i:s');

$sql = "DELETE FROM Appointment 
        WHERE CONCAT(appointment_date, ' ', appointment_time) < ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $currentDateTime);


?>
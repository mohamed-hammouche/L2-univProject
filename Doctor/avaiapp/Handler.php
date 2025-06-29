<?php

include '../../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $block_date = $_POST['block_date'];

    $currentDate = date('Y-m-d');
    if ($block_date < $currentDate) {
        die("Error: You cannot block a date in the past.");
    }

    $stmt = $conn->prepare("SELECT * FROM Appointment WHERE appointment_date = ? AND Availbility = '2'");
    $stmt->bind_param("s", $block_date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo("Error: This date is already blocked.");
        header("Refresh: 2; URL= ../Dashboard/dash.php");
    }

    $timeSlots = ['9h00', '9h30', '10h00', '10h30', '11h00', '11h30', '12h00', '13h00', '13h30', '14h00', '14h30', '15h00'];
    foreach ($timeSlots as $timeSlot) {
        $stmt = $conn->prepare("INSERT INTO Appointment (appointment_date, appointment_time, Availbility, patient_name, ID_P) 
                                VALUES (?, ?, '2', '', 0)
                                ON DUPLICATE KEY UPDATE Availbility = '2'");
        $stmt->bind_param("ss", $block_date, $timeSlot);
        $stmt->execute();
    }

    echo "The day has been successfully blocked.";
    header("Location: ../Dashboard/dash.php");
    exit;
} else {
    echo "Invalid request method.";
}

$conn->close();
?>

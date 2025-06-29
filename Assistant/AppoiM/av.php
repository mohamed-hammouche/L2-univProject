<?php

include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $currentDate = date('Y-m-d'); 
    $maxDate = date('Y-m-d', strtotime('+3 months')); 

    if ($appointment_date < $currentDate) {
        die("Error: Appointment date cannot be in the past.");
    }

    if ($appointment_date > $maxDate) {
        die("Error: Appointment date cannot be more than 3 months from today.");
    }

    $stmt = $conn->prepare("SELECT CONCAT(family_name, ' ', name) AS patient_name FROM Patient WHERE id = ?");
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patient_name = $row['patient_name'];

        $stmt = $conn->prepare("INSERT INTO Appointment (ID_P, patient_name, appointment_date, appointment_time, Availbility) VALUES (?, ?, ?, ?, '1')");
        $stmt->bind_param("isss", $patient_id, $patient_name, $appointment_date, $appointment_time);

        if ($stmt->execute()) {
            $updateStmt = $conn->prepare("UPDATE Patient SET app = 2 WHERE id = ?");
            $updateStmt->bind_param("i", $patient_id);
            $updateStmt->execute();
            echo "Your request has been taken.";
            header("Refresh: 3; URL=Addapp.php");
            
            exit;
        } else {
            echo "Error in demand appointment: " . $stmt->error;
        }
    } else {
        echo "Patient not found.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
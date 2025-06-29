<?php

include '../../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $checkStmt = $conn->prepare("SELECT app FROM Patient WHERE id = ?");
    
    $checkStmt->bind_param("i", $patient_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
   
    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        if ($row['app'] === '2') {
            echo "You are already in the waiting list.";
            header("Refresh: 3; URL=appointment_rqst.php");
            exit;
        }
        if ($row['app'] === '3') {
            echo "Your appointment request has been rejected. go see the assistant.";
            header("Refresh: 3; URL=appointment_rqst.php");
            exit;
        }
        if ($row['app'] === '1') {
            echo "you have been accepted.";
            header("Refresh: 3; URL=appointment_rqst.php");
            exit;
        }
    }
    
    $currentDate = date('Y-m-d');
    $maxDate = date('Y-m-d', strtotime('+3 months'));
    
    if ($appointment_date < $currentDate) {
        echo "Error: Appointment date cannot be in the past.";
        header("Refresh: 3; URL=appointment_rqst.php?error=past_date");
        exit;
    }
    
    if ($appointment_date > $maxDate) {
        echo "Error: Appointment date cannot be more than 3 months from today.";
        header("Refresh: 3; URL=appointment_rqst.php?error=too_far");
        exit;
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

            echo "Appointment request submitted successfully.";
            exit;
        } else {
            echo "Error submitting appointment request: " . $stmt->error;
        }
    } else {
        echo "Patient not found.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
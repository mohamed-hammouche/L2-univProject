<?php
session_start(); 
include '../db.php';

if (isset($_GET['id']) && isset($_GET['email'])) {
    $id = intval($_GET['id']);
    $email = $_GET['email'];

    if (isset($_SESSION['user_email'])) {
        $deleted_by = $_SESSION['user_email'];
        
    }
    $stmt = $conn->prepare("DELETE FROM Consulatation WHERE ID_Patient = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    $stmt = $conn->prepare("DELETE FROM Appointment WHERE ID_P = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    $stmt = $conn->prepare("DELETE FROM connexion_patient WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
    }

    $stmt = $conn->prepare("DELETE FROM Patient WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Patient deleted successfully. You will be redirected in 5 seconds...";
            header("Refresh: 5; URL=../Doctor/Dashboard/Patient_table/ptable.php");
        } else {
            echo "Error deleting patient: " . $stmt->error;
        }
        $stmt->close();
    }

    $conn->close();
    exit();
} else {
    echo "Invalid or missing parameters. You will be redirected in 5 seconds...";
    header("Refresh: 5; URL=../Doctor/Dashboard/Patient_table/ptable.php");
    exit();
}
?>

<?php
session_start();
include '../db.php';

if (isset($_GET['name']) && isset($_GET['email'])) {    
    $name = $_GET['name'];
    $email = $_GET['email'];

    $stmt = $conn->prepare("DELETE FROM connexion_assistante_doc WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Deleted from connexion_assistante_doc.<br>";
    } else {
        echo "Error deleting from connexion_assistante_doc: " . $stmt->error . "<br>";
    }
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM assistante WHERE name = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo "Assistant deleted successfully. You will be redirected in 5 seconds...";
        header("Refresh: 5; URL=../Doctor/Dashboard/Patient_table/ptable.php");
    } else {
        echo "Error deleting assistant: " . $stmt->error;
    }
    $stmt->close();

    $conn->close();
    exit();
} else {
    echo "Invalid or missing parameters.";
    header("Refresh: 5; URL=../Doctor/Dashboard/Patient_table/ptable.php");
    exit();
}
?>

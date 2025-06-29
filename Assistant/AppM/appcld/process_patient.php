<?php

include '../../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && is_array($_POST['action'])) {
        foreach ($_POST['action'] as $patient_id => $action) {
            $patient_id = intval($patient_id); // Sanitize patient ID
            if ($action === 'accept') {
                $stmt = $conn->prepare("UPDATE Patient SET app = '1' WHERE id = ?");
                $stmt->bind_param("i", $patient_id);
                $stmt->execute();

            } elseif ($action === 'reject') {
                $stmt = $conn->prepare("UPDATE Patient SET app = '3' WHERE id = ?");
                $stmt->bind_param("i", $patient_id);
                $stmt->execute();
                
                $deleteStmt = $conn->prepare("DELETE FROM Appointment WHERE ID_P = ?");
                $deleteStmt->bind_param("i", $patient_id);
                $deleteStmt->execute();
            }
        }
        echo "Actions processed successfully.";
        header("Refresh: 3; URL=AppCld.php");
        exit;
    } else {
        echo "No actions submitted.";
        header("Refresh: 3; URL=AppCld.php");
        exit;
    }
} else {
    echo "Invalid request method.";
    header("Refresh: 3; URL=AppCld.php");
    exit;
}

$conn->close();
?>
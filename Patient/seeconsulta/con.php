<?php

include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['patient_id'];

    $stmt = $conn->prepare("SELECT id, consult FROM Patient WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['consult'] === 2) {
            $stmt = $conn->prepare("SELECT ID, ID_Patient, Pinfos, Datee, Orodonnace FROM Consulatation WHERE ID_Patient = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $consultation_result = $stmt->get_result();

            if ($consultation_result->num_rows > 0) {
                while ($consultation = $consultation_result->fetch_assoc()) {
                    echo "Patient Info: " . $consultation['Pinfos'] . "<br>";
                    echo "Date: " . $consultation['Datee'] . "<br>";
                    echo "Ordonnance: " . $consultation['Orodonnace'] . "<br><br>";
                }
            } else {
                echo "No consultations found for this patient.";
            }
        } else {
            echo "This patient has not yet had a consultation.";
        }
    } else {
        echo "No patient found with the given ID.";
    }
} 
$conn->close();
?>
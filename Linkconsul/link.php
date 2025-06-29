<?php

include '../db.php';

session_start();

$stmt = $conn->prepare("SELECT id, name, family_name, dtn, consult FROM Patient");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $fulln = $user['family_name'] . " " . $user['name'];
    $ID = $user['id'];
    if ($user['consult'] == '2') {
        echo "This patient has already had a consultation.";
    } else {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $des = $_POST['desc'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $ord = $_POST['ord'];
            $stmt = $conn->prepare("INSERT INTO `Consulatation` (ID_Patient,Pinfos, `Datee`, `Timee`, descrption,Orodonnace) VALUES (?, ?, ?, ?, ? , ?)");
            $stmt->bind_param("isssss", $ID ,$fulln, $date, $time, $des,$ord);

            if ($stmt->execute()) {
                $updateStmt = $conn->prepare("UPDATE Patient SET consult = 2 WHERE id = ?");
                $updateStmt->bind_param("i", $user['id']);
                $updateStmt->execute();

                echo "Consultation added successfully.";
                header("Refresh: 5; URL=../Doctor/consult/addcosult.php");
            } else {
                echo "Error inserting consultation: " . $stmt->error;
            }
        }
    }
} else {
    echo "No patients found.";
}

?>

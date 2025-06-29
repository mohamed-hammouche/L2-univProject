<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name= $_POST['first_name'];
    $name= $_POST['name'];
    $dtn= $_POST['dtn'];
    $sex = $_POST['gender'];
    $contact  = $_POST['contact'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $profile_type = $_POST['account_type'];

    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $consult_status = 1;

    $stmt = $conn->prepare("INSERT INTO Patient (name, family_name, sex, email, dtn, tel, consult,app) VALUES (?, ?, ?, ?, ?, ?, ?,'0')");
    $stmt->bind_param("ssssssi", $first_name, $name, $sex, $email, $dtn, $contact, $consult_status);

    if ($stmt->execute()) {
      
        $stmt = $conn->prepare("INSERT INTO connexion_patient (email, psw) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_mdp);

        if ($stmt->execute()) {
          
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = $profile_type;

            
            switch ($profile_type) {
                case 3: 
                    header("Refresh: 3; URL=../Patient/login/patient_login.php");
                    echo "Patient added successfully! You will be redirected   in 3 seconds...";
                    break;
                case 2: 
                    header("Refresh: 3; URL=../Assistant/assitante/dash.php");
                    echo "Patient added successfully! You will be redirected in 3 seconds...";
                    break;
                case 1: 
                    header("Refresh: 3; URL=../Doctor/Dashboard/Add_patient/addp.php");
                    echo "Patient added successfully! You will be redirected in 3 seconds...";
                    break;
                default:
                    echo "Unknown account type.";
                    break;
            }

        } else {
            echo "Error inserting into connexion_patient: " . $stmt->error;
        }
    } else {
        echo "Error inserting into Patient: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

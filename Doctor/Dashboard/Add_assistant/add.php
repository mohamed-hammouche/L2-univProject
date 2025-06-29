<?php

include '../../../db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $name = $_POST['name'];
    $dtn = $_POST['dtn'];
    $sex = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $stf = $_POST['stf'];
    $etude = $_POST['etude'];
    $mdp = $_POST['mdp'];
    $role = "assi";
    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Assistante (`name`, `family_name`, `sex`, `email`, `tel`, `dtn`, `situation_familial`, `etude`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $first_name, $name, $sex, $email, $contact, $dtn, $stf, $etude);


    if ($stmt->execute()) {        
        $stmt = $conn->prepare("INSERT INTO connexion_assistante_doc (role,email, psw) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",$role, $email, $hashed_mdp);

        if ($stmt->execute()) {
            echo "Assistant added successfully!";
            header("Refresh: 5; URL=add.php");
            exit;
            }

            }
         else {
            echo "Error in adding to connexion assitante: " . $stmt->error;
        }
    } else {
        echo "Error in adding to assitante: " . $stmt->error;
    }

    $stmt->close();

$conn->close();
?>
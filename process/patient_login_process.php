
<?php

include '../db.php';
include '../dapp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT psw FROM connexion_patient WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['psw'])) {
            $stmt = $conn->prepare("SELECT id, name, family_name, dtn, consult FROM Patient WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0) {
                $patient = $result->fetch_assoc();
                $id = $patient['id'];



                header("Location: ../Patient/dashboard/main/patient_dashboard.php?id=" . urlencode($id));            }
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
}
    $stmt->close();


$conn->close();
?>
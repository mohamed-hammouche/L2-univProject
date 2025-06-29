
<?php
include '../db.php'; 
include '../dapp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT psw, role FROM connexion_assistante_doc WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['psw'])) {
            if ($user['role'] === 'assi') {
                header("Location: ../Assistant/assitante/dash.php");
                $stmt->close();
                $conn->close();
                exit;
            } else {
                header("Location:../Doctor/Dashboard/dash.php ");
                $stmt->close();
                $conn->close();
                exit;
            }
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>
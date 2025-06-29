<?php
include '../../../db.php';

$toch = $_GET['id'];

$stmt = $conn->prepare("SELECT consult FROM Patient WHERE id = ?");
$stmt->bind_param("i", $toch);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['consult'] == 2) {
        $stmt = $conn->prepare("SELECT ID_Patient, Pinfos, Datee, Timee, descrption, Orodonnace FROM Consulatation WHERE ID_Patient = ?");
        $stmt->bind_param("i", $toch);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            echo "<h1>Consultation Details for Patient ID: " . htmlspecialchars($toch) . "</h1>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='consultation'>";
                echo "<p><strong>Consultation ID:</strong> " . htmlspecialchars($row['ID_Patient']) . "</p>";
                echo "<p><strong>Patient Info:</strong> " . htmlspecialchars($row['Pinfos']) . "</p>";
                echo "<p><strong>Date:</strong> " . htmlspecialchars($row['Datee']) . "</p>";
                echo "<p><strong>Time:</strong> " . htmlspecialchars($row['Timee']) . "</p>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($row['descrption']) . "</p>";
                echo "<p><strong>Ordonnance:</strong> " . htmlspecialchars($row['Orodonnace']) . "</p>";
                echo "<hr>";
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "<p class='error'>This patient is not marked for consultation.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            background-color: #d32f2f;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .consultation {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .consultation p {
            font-size: 16px;
            line-height: 1.6;
        }
        .consultation strong {
            color: #d32f2f;
        }
        .error {
            color: #d32f2f;
            text-align: center;
            font-size: 18px;
            margin-top: 50px;
        }
        hr {
            border: 1px solid #d32f2f;
        }
    </style>
</head>
<body>
</body>
</html>

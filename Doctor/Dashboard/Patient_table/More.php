<?php

include '../../../db.php';

session_start();

// Check if 'id' is provided in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Error: Invalid patient ID.");
}

$patient_id = $_GET['id'];

// Fetch patient details from the database
$stmt = $conn->prepare("SELECT id, name, family_name, sex, email, dtn, tel, consult, app FROM Patient WHERE id = ?");
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: Patient not found.");
}

$patient = $result->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" href="more.css">
</head>
<body>
    <div class="content">
        <h3>Patient Details</h3>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($patient['id']); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($patient['name']); ?></td>
            </tr>
            <tr>
                <th>Family Name</th>
                <td><?php echo htmlspecialchars($patient['family_name']); ?></td>
            </tr>
            <tr>
                <th>Sex</th>
                <td><?php echo htmlspecialchars($patient['sex']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($patient['email']); ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo htmlspecialchars($patient['dtn']); ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo htmlspecialchars($patient['tel']); ?></td>
            </tr>
            <tr>
                <th>Consultation Status</th>
                <td><?php echo $patient['consult'] === '1' ? 'Pending' : 'Completed'; ?></td>
            </tr>
            <tr>
                <th>Appointment Status</th>
                <td><?php echo $patient['app'] === '1' ? 'No Appointment' : 'Has Appointment'; ?></td>
            </tr>
        </table>
        <br>
        <a href="ptable.php">Back to Patient List</a>
    </div>
</body>
</html>
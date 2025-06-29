<?php

include '../../../db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Error: Invalid patient ID.");
}

$patient_id = $_GET['id'];

$stmt = $conn->prepare("SELECT id, name, family_name FROM Patient WHERE id = ?");
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

$patient = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #d32f2f;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 18px;
            display: block;
            margin-bottom: 8px;
            color: #d32f2f;
        }
        input[type="date"], select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }
        input[type="submit"] {
            background-color: #d32f2f;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #b71c1c;
        }
        a {
            text-decoration: none;
            color: #d32f2f;
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
        a:hover {
            color: #b71c1c;
        }
    </style>
</head>
<body>
    <h1>Request Appointment for <?php echo htmlspecialchars($patient['family_name'] . " " . $patient['name']); ?></h1>
    <form action="addp.php" method="post">
        <input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>">

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required>
        <br><br>

        <label for="appointment_time">Appointment Time:</label>
        <select id="appointment_time" name="appointment_time" required>
            <option value="">Select a Time</option>
            <option value="9h00">9:00 AM</option>
            <option value="9h30">9:30 AM</option>
            <option value="10h00">10:00 AM</option>
            <option value="10h30">10:30 AM</option>
            <option value="11h00">11:00 AM</option>
            <option value="11h30">11:30 AM</option>
            <option value="12h00">12:00 PM</option>
            <option value="13h00">1:00 PM</option>
            <option value="13h30">1:30 PM</option>
            <option value="14h00">2:00 PM</option>
            <option value="14h30">2:30 PM</option>
            <option value="15h00">3:00 PM</option>
        </select>
        <br><br>

        <input type="submit" value="Request Appointment">
    </form>

    <a href="../main/patient_dashboard.php">Back to Dashboard</a>
</body>
</html>
<?php
$conn->close();
?>

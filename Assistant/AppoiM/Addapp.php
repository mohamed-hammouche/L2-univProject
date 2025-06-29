<?php

include '../../db.php';

$stmt = $conn->prepare("SELECT id, name, family_name, app FROM Patient");
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <style>
        body, html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: rgb(193, 245, 245);
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 1px 1px 30px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        input, select {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 50%;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            color: #2980b9;
        }

        #back {
            margin-top: 20px;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Add Appointment for Existing Patient</h1>
    <form action="av.php" method="post">
        <label for="patient">Choose a Patient:</label>
        <select name="patient_id" id="patient" required>
            <option value="">Select a Patient</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php if ($row['app'] === '1'): ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo htmlspecialchars($row['family_name'] . " " . $row['name']); ?>
                    </option>
                <?php endif; ?>
            <?php endwhile; ?>
        </select>
        <br><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required><br><br>

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

        <input type="submit" value="Add Appointment">
        <a href="../AppM/apoitement/App.php" id="back">Back</a>
    </form>

</body>
</html>
<?php
$conn->close();
?>

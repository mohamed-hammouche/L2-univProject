<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../db.php'; 
$sql = "SELECT 
            patient_name, 
            appointment_date, 
            appointment_time 
        FROM Appointment 
        WHERE appointment_date >= CURDATE() 
        AND Availbility = '1' 
        ORDER BY appointment_date ASC, appointment_time ASC 
        LIMIT 1";
$result = $conn->query($sql);

$nextAppointment = null;
if ($result->num_rows > 0) {
    $nextAppointment = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <nav>
        <div id="dash"><h3>Dashboard</h3></div>
        <hr id="lineh">    
        <a href="../Dashboard/Profile/profile.php"><h4 id="profile">My profile</h4></a>
        <details>
            <summary>Assistant</summary>
            <ul>
                <a href="Add_assistant/addassist.php"><li>Add Assistant</li></a>
                <a href="Assistant_table/atable.php"><li>View All Assistants</li></a>
            </ul>
        </details>
        <details>
            <summary>Patient</summary>
            <ul>
                <a href="Add_patient/addp.php"><li>Add Patient</li></a>
                <a href="Patient_table/ptable.php"><li>View All Patients</li></a>
            </ul>
        </details>
        <details>
            <summary>consult</summary>
            <ul>
                <a href="../consult/addcosult.php"><li>consult</li></a>
            </ul>
        </details>
        <details>
            <summary>Appointment</summary>
            <ul>
                <a href="Tapp/tapp.php"><li>Today's Appointments</li></a>
                <a href="../avaiapp/ava.php"><li>Blocked days</li></a>
            </ul>
        </details>
    </nav>
    <div id="body">
        <h1 id="overview">-- Overview --</h1>
        <div id="clock">
        <?php  
    echo '<p id="time">' . date('l, F j Y | h:i A', strtotime('-1 hour')) . '</p>';
    ?>
        </div>
        <table>
            <tr>
                <th>Appointments left</th>
            </tr>
            <tr>
                <td>XX</td>
            </tr>
        </table>
        <div class="napp">
            <h3 id="firsttext">Next Appointment!</h3>
            <?php if ($nextAppointment): ?>
                <p>Patient: <?php echo htmlspecialchars($nextAppointment['patient_name']); ?></p>
                <p>Date: <?php echo htmlspecialchars($nextAppointment['appointment_date']); ?></p>
                <p>Time: <?php echo htmlspecialchars($nextAppointment['appointment_time']); ?></p>
            <?php else: ?>
                <p>No upcoming appointments.</p>
            <?php endif; ?>
        </div>
        <footer>
            <p>&copy; 2025, All rights reserved by www.HealthCare.com</p>
        </footer>
    </div>
</body>
</html>
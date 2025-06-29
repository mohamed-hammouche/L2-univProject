<?php

include '../../../db.php';

$sql = "SELECT 
            Patient.name AS patient_name, 
            Patient.family_name AS family_name, 
            Patient.dtn AS date_of_birth, 
            Appointment.appointment_date AS appointment_date, 
            Appointment.appointment_time AS appointment_time, 
            Appointment.ID_P AS patient_id, 
            Appointment.Availbility AS availability 
        FROM Appointment
        INNER JOIN Patient ON Appointment.ID_P = Patient.id
        WHERE Patient.app = '2'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Appointments</title>
    <link rel="stylesheet" href="tapp.css">
</head>
<body>
    <nav>
        <a href="../dash.php"><div id="dash"><h3>Dashboard</h3></div></a>
        <hr id="lineh">    
        <a href="../Profile/profile.php"><h4 id="profile">My profile</h4></a>
        <details>
            <summary>Assistant</summary>
            <ul>
                <a href="../Add_assistant/addassist.php"><li>Add Assistant</li></a>
                <a href="../Assistant_table/atable.php"><li>View All Assistants</li></a>
            </ul>
        </details>
        <details>
            <summary>Patient</summary>
            <ul>
                <a href="../Add_patient/addp.php"><li>Add Patient</li></a>
                <a href="../Patient_table/ptable.php"><li>View All Patients</li></a>
            </ul>
        </details>
        <details>
            <summary class="App">Appointment</summary>
            <ul>
                <li id="tapp">All Appointments</li>
            </ul>
        </details>
    </nav>
    <div id="body">
        <h3>All Appointments</h3>

        <table>
            <tr>
                <th>Patient Name</th>
                <th>Date of Birth</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Availability</th>
                <th>More</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['patient_name'] . ' ' . $row['family_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['availability'] === '1' ? 'Available' : ($row['availability'] === '2' ? 'Pending' : 'Confirmed')); ?></td>
                    <td><a href="../Patient_table/More.php?id=<?php echo $row['patient_id']; ?>">More</a></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No appointments found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
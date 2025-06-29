<?php

include '../../../db.php'; 

$sql = "SELECT 
            Patient.id, 
            CONCAT(Patient.name, ' ', Patient.family_name) AS full_name, 
            Appointment.appointment_date, 
            Appointment.appointment_time 
        FROM Patient
        INNER JOIN Appointment ON Patient.id = Appointment.ID_P
        WHERE Patient.app = '2'";
$result = $conn->query($sql);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients with Appointments</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Manage Patient Appointments</h1>
    <form action="process_patient.php" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                            <td>
                                <select name="action[<?php echo htmlspecialchars($row['id']); ?>]">
                                    <option value="accept">Accept</option>
                                    <option value="reject">Reject</option>
                                </select>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No patients found with app = '2'</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <button type="submit">Submit</button>
    </form>
        <a href="../../assitante/dash.php">Back to Dashboard</a>
</body>
</html>
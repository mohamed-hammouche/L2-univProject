<?php

include '../../../db.php';

// Fetch all patients from the database
$stmt = $conn->prepare("SELECT id, name, family_name, dtn, email FROM Patient");
$stmt->execute();
$result = $stmt->get_result();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <style>
        body, html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: rgb(193, 245, 245);
        }

        .sidebar {
            width: 200px;
            background-color: #fff;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 1px 1px 30px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 10;
            font-size: 18px;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            margin-top: 10px;
        }

        .sidebar a:hover {
            background-color: #f1f1f1;
            color: #3498db;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        h3 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .patient-list-box {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        table td a {
            color: #3498db;
            text-decoration: none;
        }

        table td a:hover {
            color: #2980b9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Adding a line below the column headers */
        table th {
            border-bottom: 2px solid #3498db;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="../addpatient/AddPatient.php">Add Patient</a>
        <a href="../../assitante/dash.php">Back</a>
    </div>
    <div class="content">
        <h3>Patient List</h3>
        <div class="patient-list-box">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Family Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['family_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['dtn']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <a href="More.php?id=<?php echo $row['id']; ?>">More</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

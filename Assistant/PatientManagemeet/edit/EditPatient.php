<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link rel="stylesheet" href="edt.css">
</head>
<body>
    <div class="container">
        <h1>Edit Patient</h1>
        <form action="EditPatientHandler.php" method="post">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required><br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <input type="submit" value="Update Patient">
        </form>

        <a href="../patientlist/PatientList.php" class="back-link">Back</a>
    </div>
</body>
</html>
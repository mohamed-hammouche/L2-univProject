<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylep2.css">
    <title>Sign up</title>
</head>
<body>
    <h1>creat account </h1>
    <form action="../../creation/addpatient.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <input type="hidden" name="account_type" value="3" />

        <label for="last_name">Last Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dtn" name="dtn" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mdp">Password:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>

        <input type="submit" value="Add Patient">
    </form>

    <a href="../../HealWell-Dashboard.php">Back</a>
</body>
</html>
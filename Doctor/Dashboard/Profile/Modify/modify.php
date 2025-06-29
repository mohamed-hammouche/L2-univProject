<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="modify.css">
</head>
<body>

<div class="container">
    <h2>Edit Profile</h2>
    <form action="update_profile.php" method="POST">

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="johndoe@example.com" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="+1234567890" required>

        <label for="specialty">Specialty:</label>
        <select id="specialty" name="specialty">
            <option value="general">General Medicine</option>
            <option value="dentist">Dentist</option>
            <option value="cardiologist">Cardiologist</option>
            <option value="dermatologist">Dermatologist</option>
        </select>

        <div class="buttons">
            <a href="../profile.php" class="back-btn">Back</a>
            <button type="submit" class="save-btn">Save</button>
        </div>
    </form>

    <a href="../../../Change_password/changepass.php"><button id="change-password-btn" >Change Password</button></a>
</div>

</body>
</html>

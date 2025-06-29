<?php
session_start(); 


if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    
    session_unset();
    session_destroy();

    
    header("Location: ../../../HealWell-Dashboard.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="profile.css">

</head>
<body>
    <nav>
    <a href="../dash.php"><div id="dash"><h3>Dashboard</h3></div></a>
        <hr id="lineh">    
        <h4 id="profile">My profile</h4>
        <details>
            <summary>Assistant</summary>
            <ul>
                <a href="../Add_assistant/addassist.php"><li>Add Assistant</li></a>
                <a href="../Assistant_table/atable.php"><li>View All Assistants</li></a>
            </ul>
        </details>
        <details>
            <summary class="pat">Patient</summary>
            <ul>
                <a href="../Add_patient/addp.php"><li>Add Patient</li></a>
                <a href ="../Patient_table/ptable.php"><li>View All Patients</li></a>
            </ul>

        </details>
        <details>
            <summary>consult</summary>
            <ul>
                <a href="../../consult/addcosult.php"><li>consult</li></a>
               
            </ul>
        </details>
        <details>
            <summary>Appointment</summary>
            <ul>
                <a href="../Tapp/tapp.php"><li>Today's Appointments</li></a>
                <a href="../../avaiapp/ava.php"><li>Blocked days</li></a>
            </ul>
        </details>
    </nav>
    <div id="body">
        <h3 id="mprofile">My Profile</h3>
        <div id="profile-details">
            <img id="profilepic" src="../../../portrait-cheerful-male-doctor_171337-1491.jpg">
            <div id="line"></div>
            <div id="info">
                <p><strong>Name:</strong> Dr. John Doe</p>
                <p><strong>Email:</strong> M.Docteur@gmail.com</p>
                <p><strong>Specialty:</strong> Cardiology</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
            </div>
            <a href="?logout=true"><button id="modify-btn">Log out</button></a>
        </div>
    </div>
    
</body>
</html>
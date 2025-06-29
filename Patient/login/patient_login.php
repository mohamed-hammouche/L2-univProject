<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Account</title>
    <link rel="stylesheet" href="stylep1.css">
    <link rel="icon" href="../img/pan.ico">
</head>
<body>
    <header>
        <a href="../../HealWell-Dashboard.php">
            <img src="../img/pan.png" alt="logo" id="logo">
        </a>
    </header>
    <div class="main">
        <h1 id="title1">Patient's Space</h1>
        <img src="../img/10413062-removebg-preview.png" alt="patient" id="img">
        <form action="../../process/patient_login_process.php" method="post"> 
            <div class="email1">
                <div>Email</div>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="password1">
                <div>Password</div>
                <button type="button" id="buttonshow" onclick="togglePassword()">Show</button>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div class="buttonsl">
                <button id="login" type="submit">Log in</button>
                </form>
    </div> 

                <a href = "../sign-up/patient_singup.php"><button id="back">sign up</button></a>       </div>

</body>
</html>



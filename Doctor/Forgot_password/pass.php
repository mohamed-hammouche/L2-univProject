<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="pass.css">
    

</head>
<body>
    
    <div class="loginbox">
        
        <h2 id="login">Update Password</h2>
        <form action="" method="post">
            <label for="mail" id="mailtext" >Email :</label>
            <input type="email" name="email" id="mail" placeholder="doctor@gmail.com" required>
            <br>
            <label for="key" id="keytxt">Key :</label>
            <input type="password" name="key" id="key" placeholder="key" required>
            
            <div class="newpas">
                <label for="newpass" id="newtext">New Password :</label>
                <input type="password" name="newpass" id="newpass" placeholder="new password" required>
            </div>
            
           <div class="repas">
                <label for="repass" id="repastext">Re-enter Password :</label>
                <input type="password" name="repass" id="repass" placeholder="re-enter password" required>
           </div>
        </form>
        <div id="move">
            <a href="../Login/login.php"><button id="back">Back</button></a>
            <a href="../Login/login.php"><button id="confirm">Confirm</button></a>
        </div>
    </div>
</body>
</html>
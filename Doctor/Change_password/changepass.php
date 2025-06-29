<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="changepass.css">
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
            
            <div class="pas">
                <label for="password" >Currrent Password :</label>
                <input type="password" name="password" id="password" placeholder="password" required>
            </div>
            
            <div class="newpas">
                <label for="newpass" id="newtext">New Password :</label>
                <input type="password" name="newpass" id="newpass" placeholder="new password" required>
            </div>
            
           <div class="repas">
                <label for="repass" id="repastext">Re-enter Password :</label>
                <input type="password" name="repass" id="repass" placeholder="re-enter password" required>
           </div>
            <div id="extra">
                <input type="reset" id="reset" value="Clear">
            </div>
        </form>
        <div id="move">
            <a href="../Dashboard/Profile/profile.php"><button id="back">Back</button></a>
            <a href="../Dashboard/Profile/profile.php"><button id="log">Confirm</button></a>
        </div>
    </div>
</body>
</html>

<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
    

</head>
<body>
    
    <div class="loginbox">
        
        <h2 id="login">Doctor Login</h2>
        <form action="../../process/auth_doc_assitante.php" method="post">
            <label for="mail" >Email :</label>
            <input type="email" name="email" id="mail" placeholder="doctor@gmail.com" required>
            <br>
            <label for="password" >Password :</label>
            <input type="password" name="password" id="password" placeholder="password" required>
            <div id="extra">
                
                <input type="reset" id="reset" value="Clear">
            </div>
     
        <div id="move">
        <button type="submit" id="log">Login</button>        
    </form>
    </div>

            <a href="../../HealWell-Dashboard.php"><button id="back">Back</button></a>
    </div>

</body>
</html>


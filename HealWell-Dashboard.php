<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(135deg, rgba(14, 55, 82, 0.9), rgba(22, 101, 133, 0.9)), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
        }

        .hospital-name {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            border: 3px solid #ffffff;
            padding: 12px 35px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            margin-bottom: 25px;
            text-transform: uppercase;
            backdrop-filter: blur(5px);
        }

        .header {
            font-size: 26px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header .emoji {
            font-size: 34px;
        }

        .login-container {
            display: flex;
            flex-direction: row;
            width: 80%;
            max-width: 1000px;
            height: 60vh;
            gap: 20px;
        }

        .login-option {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            padding: 25px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-option:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.2);
        }

        .doctor {
            background: linear-gradient(to bottom, #05bb66, #A8C0FF);
        }
        .assistant {
            background: linear-gradient(to bottom, #3F2B96, #A8C0FF);
        }
        .patient {
            background: linear-gradient(to bottom, #d61e1e, #A8C0FF);
        }

        .login-option img {
            width: 70px;
            height: 70px;
            margin-bottom: 15px;
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.2));
        }
        p{
            padding-right: 2%;
            
        }
        a{
            text-decoration: none;
        }

        
    </style>
</head>
<body>
    <div class="hospital-name">
        HealWell Hospital
    </div>

    <div class="header">
        <span class="emoji">🔑</span> Login As
    </div>

    <div class="login-container">
            <div class="login-option doctor">
                <a href="Doctor/Login/login.php">  
                    <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" alt="Doctor Icon">
                    <p> Doctor</p>
                </a>
            </div>
        
            <div class="login-option assistant">
                <a href="Assistant/Assitantelogin/login.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/9370/9370137.png" alt="Assistant Icon">
                   <p> Assistant </p>
                </a> 
            </div>
        
            <div class="login-option patient">
                <a href="Patient/login/patient_login.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/3209/3209993.png" alt="Patient Icon">
                    <p>Patient</p>
                </a>
            </div>
    </div>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <style>
        body, html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: rgb(193, 245, 245);
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }

        details {
            width: 300px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 1px 1px 30px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        summary {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        details[open] summary {
            background-color: #3498db;
            color: white;
        }

        details summary:after {
            content: " ▼";
            transition: transform 0.3s;
        }

        details[open] summary:after {
            content: " ▲";
        }

        a {
            display: block;
            text-decoration: none;
            padding: 8px;
            margin-bottom: 10px;
            color: #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <details>
            <summary>
                <span>Pages</span>
            </summary>
            <div class="ml-6 mt-2">
                <a href="../../AppoiM/Addapp.php">Appointment</a>
                <a href="../appcld/AppCld.php">appointement acc</a>
                <a href="../../assitante/dash.php">Back</a>
            </div>
        </details>
    </div>
</body>
</html>

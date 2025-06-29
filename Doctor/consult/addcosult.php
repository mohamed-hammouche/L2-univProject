<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Consultation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f4f8;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button,
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background-color: #0077cc;
            color: white;
        }

        button:hover {
            background-color: #005fa3;
        }

        a {
            background-color: #ccc;
            color: #000;
            margin-left: 10px;
        }

        a:hover {
            background-color: #aaa;
        }
    </style>
</head>
<body>
    <h1>Add Consultation</h1>
    <form action="../../Linkconsul/link.php" method="post">
        <label for="patient">Choose a Patient:</label>
        <select name="patient_id" id="patient" required>
            <option value="">Select a Patient</option>
            <?php
                include '../../db.php';
                session_start();
                $stmt = $conn->prepare("SELECT id, name, family_name, dtn, email, consult FROM Patient");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
                    if ($row['consult'] === '1'):
            ?>
                <option value="<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['family_name'] . ' ' . $row['name']) ?>
                </option>
            <?php 
                    endif;
                endwhile; 
                $conn->close();
            ?>
        </select>

        <label for="date">Consultation Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Consultation Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="desc">Description:</label>
        <textarea id="desc" name="desc" rows="4" required></textarea>

        <label for="ord">Ordonnance:</label>
        <textarea id="ord" name="ord" rows="4" required></textarea>

        <button type="submit">Add Consultation</button>
        <a href="../Dashboard/dash.php">Back</a>
    </form>
</body>
</html>

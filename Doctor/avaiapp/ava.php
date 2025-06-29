
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block Days</title>
</head>
<body>
    <h1>Block Specific Days</h1>
    <form action="Handler.php" method="post">
        <label for="block_date">Select Date to Block:</label>
        <input type="date" id="block_date" name="block_date" required>
        <br><br>

        <input type="submit" value="Block Day">
    </form>

    <a href="../Dashboard/dash.php">Back </a>
</body>
</html>
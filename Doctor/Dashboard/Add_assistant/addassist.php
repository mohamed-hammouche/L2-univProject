<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Assistant</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-box {
      background: #fff;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    h1 {
      text-align: center;
      font-size: 22px;
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
      margin-top: 10px;
      display: block;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-top: 4px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    input[type="submit"] {
      background: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background: #0056b3;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 12px;
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h1>Add Assistant</h1>
    <form action="add.php" method="post">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" required>

      <label for="name">Last Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="dtn">Date of Birth:</label>
      <input type="date" id="dtn" name="dtn" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>

      <label for="stf">Situation Familial:</label>
      <input type="text" id="stf" name="stf" required>

      <label for="etude">Etude:</label>
      <input type="text" id="etude" name="etude" required>

      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="mdp">Password:</label>
      <input type="password" id="mdp" name="mdp" required>

      <input type="submit" value="Add Assistant">
    </form>
    <a href="../dash.php">Back</a>
  </div>
</body>
</html>

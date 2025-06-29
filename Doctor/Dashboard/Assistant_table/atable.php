<?php

include '../../../db.php';

session_start();


$search_query = '';
$search_filter = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['search-bar'])) {
        $search_query = $_GET['search-bar'];
    }
    if (isset($_GET['search-filter'])) {
        $search_filter = $_GET['search-filter'];
    }
}

$sql = "SELECT name, family_name, email, dtn FROM Assistante";
if (!empty($search_query) && !empty($search_filter)) {
    switch ($search_filter) {
        case 'first-name':
            $sql .= " WHERE name LIKE ?";
            break;
        case 'last-name':
            $sql .= " WHERE family_name LIKE ?";
            break;
        case 'email':
            $sql .= " WHERE email LIKE ?";
            break;
        case 'phone':
            $sql .= " WHERE tel LIKE ?";
            break;
        default:
            $sql .= " WHERE name LIKE ?"; 
    }
}

$stmt = $conn->prepare($sql);
if (!empty($search_query) && !empty($search_filter)) {
    $stmt->bind_param("s", $search_query);
}
$stmt->execute();
$result = $stmt->get_result();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="atable.css">
</head>
<body>
    <nav>
        <a href="../dash.php"><div id="dash"><h3>Dashboard</h3></div></a>
        <hr id="lineh">    
        <a href="../Profile/profile.php"><h4 id="profile">My profile</h4></a>
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
                <a href="../Patient_table/ptable.php" ><li>View All Patients</li></a>
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
        <h3>List of ALL Assistants</h3>
    
        <form id="search-form" method="GET" action="ptable.php">
            <input type="text" id="search-bar" name="search-bar" placeholder="Search..." value="<?php echo htmlspecialchars($search_query); ?>">
            
            <div id="select">
                <label><input type="radio" name="search-filter" value="first-name" <?php echo $search_filter === 'first-name' ? 'checked' : ''; ?>> First Name</label>
                <label><input type="radio" name="search-filter" value="last-name" <?php echo $search_filter === 'last-name' ? 'checked' : ''; ?>> Last Name</label>
                <label><input type="radio" name="search-filter" value="email" <?php echo $search_filter === 'email' ? 'checked' : ''; ?>> Email</label>
                <label><input type="radio" name="search-filter" value="phone" <?php echo $search_filter === 'phone' ? 'checked' : ''; ?>> Phone Number</label>
            </div>
        
            <button type="submit" id="search-btn">Search</button>
            <button type="reset" id="clear-btn" onclick="window.location.href='ptable.php';">Clear</button>
        </form>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Family Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['family_name']); ?></td>
                <td><?php echo htmlspecialchars($row['dtn']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                
                <td>
                    <a href="../../../creation/deleteAssi.php?name=<?php echo urlencode($row['name']); ?>&email=<?php echo urlencode($row['email']); ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
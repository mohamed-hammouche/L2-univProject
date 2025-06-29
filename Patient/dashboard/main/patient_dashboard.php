<?php
$id = $_GET['id']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Portal - Doctor Account</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../img/pan.ico">
</head>
<body>
    <aside class="sidebar">
        <a href="../../../HealWell-Dashboard.php">
            <img src="../../img/pan.png" alt="Logo" class="logo">
        </a>
        <nav>
            <ul>
    
            <li><a href="../request/apointment_rqst.php?id=<?php echo $id; ?>"><u>apointment</u></a></li>
            <li><a href="../seec/consu.php?id=<?php echo $id; ?>"><u>consultation</u></a></li>

                <li><button type="submit" onclick="window.location.href='../../login/patient_login.php'"class="logout-btn">logout</button></li>
            </ul>
        </nav>
    </aside>

    <main class="content">
        <h1>Welcome to Your Health Portal</h1>
        <p>
            Your health is our priority. Stay informed with daily health tips and answers to common health-related questions.
        </p>
        <img src="../../img/date-treatment-with-copy-space.jpg" alt="Health Image" class="header-img">

        <section class="tips">
            <h2>Health Tips</h2>
            <ul>
                <li>💧 Stay hydrated by drinking at least 8 glasses of water daily.</li>
                <li>🥗 Eat a balanced diet rich in fruits, vegetables, and whole grains.</li>
                <li>🏋️‍♂️ Exercise regularly to maintain a healthy weight and boost immunity.</li>
                <li>😴 Get 7-9 hours of sleep every night for better mental and physical health.</li>
                <li>🩺 Schedule regular health check-ups to detect issues early.</li>
            </ul>
        </section>

        <section class="faq">
            <h2>Frequently Asked Questions (FAQ)</h2>
            <div class="faq-item">
                <h3>1. How can I schedule an appointment?</h3>
                <p>You can schedule an appointment by visiting the "Appointments" page and selecting a preferred date and time.</p>
            </div>
            <div class="faq-item">
                <h3>2. What should I do if I miss an appointment?</h3>
                <p>If you miss an appointment, you can reschedule it by contacting your doctor or using the rescheduling option in your account.</p>
            </div>
            <div class="faq-item">
                <h3>3. How can I update my personal information?</h3>
                <p>Go to the "Edit Information" page and update your details such as phone number, email, or address.</p>
            </div>
            <div class="faq-item">
                <h3>4. Where can I find my medical history?</h3>
                <p>Your medical history is available under the "History" section of your account.</p>
            </div>
        </section>

        <img src="../../img/c676a988-409b-4ba9-b45e-f9827e0ab3ba.jpg" alt="Health Portal" class="footer-img">
    </main>
</body>
</html>

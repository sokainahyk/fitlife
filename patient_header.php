
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife Tracker</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<header>
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.PNG" alt="Your Logo">
        </a>
    </div>
    <div class="p">
        <?php
       if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

        // Check if the patient is logged in
        
            // Retrieve the patient's ID from the session
            $patientId = $_SESSION['Patient_id'];

            // Query the database to get the patient's name
            include 'config.php'; // Include your database connection file

            $sql = "SELECT `Patient_name` FROM `patients` WHERE `P-ID` = $patientId";
            $result = $conn->query($sql);

            // Check if the query was successful
            if ($result && $result->num_rows > 0) {
                // Fetch the patient's name
                $patientData = $result->fetch_assoc();
                echo $patientData['Patient_name'];
            } 
        
        ?>
    </div>
</header>


</html>
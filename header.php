
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
        // Start the session (if not already started)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the patient is logged in
        
            // Retrieve the patient's ID from the session
            $dietitian_id = $_SESSION['dietitian_id'];

            // Query the database to get the patient's name
            include 'config.php'; // Include your database connection file

            $sql = "SELECT `Dietitian name` FROM `dietitian` WHERE `D-ID` = $dietitian_id";
            $result = $conn->query($sql);

            // Check if the query was successful
            if ($result && $result->num_rows > 0) {
                // Fetch the patient's name
                $dietitianData = $result->fetch_assoc();
                echo $dietitianData['Dietitian name'];
            } 
        
        ?>
    </div>

        <nav>
        <ul>
        <li><a href="patients.php"><i class="fa-solid fa-user-group"></i></a></li>
        <li><a href="dietplans.php"><i class="fa-solid fa-utensils"></i></a></li>
        <li><a href="exercise_dietitian.php"><i class="fa-solid fa-dumbbell"></i></a></li>
        </ul>
        </nav>
    </header>

</html>
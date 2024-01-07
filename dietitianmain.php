<?php include 'header.php';
include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/dietitianmain.css">
    <title>Main dietitian Page</title>
    <style>
        body {
            background-image: url('images/ll.JPEG');
            margin: 0;
        padding: 0;
        background-size:cover;
        background-repeat: no-repeat; 
        }

        
    </style>
</head>
<body>

<div class="button-container">
    <div class="button">
        <a href="patients.php">
        <img src="images/patientlogo.PNG" alt="Button 1"></a>
        <p>Patients</p>
    </div>
    
    <div class="button">
        <a href="dietplans.php"><img src="images/dietlogo.PNG" alt="Button 2"></a>
        <p>Diet plans</p>
    </div>

    <div class="button">
        <a href="exercise_dietitian.php">
        <img src="images/exelogo.PNG" alt="Button 3"></a>
        <p>Exercises</p>
    </div>
</div>

</body>
</html>

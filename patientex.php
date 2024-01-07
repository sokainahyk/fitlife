<?php
// Include your database connection file (e.g., config.php)
include 'config.php';

session_start();

// Assuming you have a session started with the logged-in patient's information
if (isset($_SESSION['Patient_id'])) {
    // Retrieve patient's ID
    $patientId = $_SESSION['Patient_id'];
    

    $lastVisitQuery = "SELECT `exercise routine` FROM `vists` WHERE `PatientID` = $patientId ORDER BY `visit date` DESC LIMIT 1";

// Execute the query
$lastVisitResult = $conn->query($lastVisitQuery);

// Check if the query was successful
if ($lastVisitResult && $lastVisitResult->num_rows > 0) {
    // Fetch the result
    $lastVisitData = $lastVisitResult->fetch_assoc();

    // Get the exercise routine ID from the last visit
    $exerciseRoutineID = $lastVisitData['exercise routine'];

    // Query to get the exercise routine name based on the ID
    $exerciseRoutineNameQuery = "SELECT `routine-name` FROM `exercise routines` WHERE `ER-ID` = $exerciseRoutineID";
    $exerciseRoutineNameResult = $conn->query($exerciseRoutineNameQuery);

    // Check if the query was successful
    if ($exerciseRoutineNameResult && $exerciseRoutineNameResult->num_rows > 0) {
        // Fetch the result
        $exerciseRoutineNameData = $exerciseRoutineNameResult->fetch_assoc();

        // Get the exercise routine name
        $exerciseRoutineName = $exerciseRoutineNameData['routine-name'];
        
        // Query to get the exercise routine details based on the name
        $exerciseRoutineQuery = "SELECT * FROM `exercise routines` WHERE `routine-name` = '$exerciseRoutineName'";
        $exerciseRoutineResult = $conn->query($exerciseRoutineQuery);

        // Check if the query was successful
        if ($exerciseRoutineResult && $exerciseRoutineResult->num_rows > 0) {
            // Fetch exercise routine details
            $row = $exerciseRoutineResult->fetch_assoc();

            // Start HTML page
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Exercise Routine Details</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
   

        
    </style>
            </head>
            <?php include 'patient_header.php'; ?>
            <body>

                <div class="container mt-5">
                    

                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['routine-name']; ?></h5>
                            <p class="card-text">Time: <?php echo $row['time']; ?></p>
                            <p class="card-text">Description: <?php echo $row['description']; ?></p>
                        </div>
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Exercise Routine Image">
                    </div>

                </div>

            </body>
            </html>

            <?php
        } else {
            echo "Exercise routine not found for the last visit of the patient.";
        }
    } else {
        echo "No visits found for the patient.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the patient is not logged in
    echo "Patient not logged in.";
}}
?>

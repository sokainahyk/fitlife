<?php
include 'config.php';
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the inputs
    $patient_id = $_POST["patient_id"];
    $visit_date = mysqli_real_escape_string($conn, $_POST["visit_date"]);
    $weight = mysqli_real_escape_string($conn, $_POST["weight"]);
    $height = mysqli_real_escape_string($conn, $_POST["height"]);
    $bmi = mysqli_real_escape_string($conn, $_POST["bmi"]);
    $fat_mass = mysqli_real_escape_string($conn, $_POST["fat_mass"]);
    $muscles_mass = mysqli_real_escape_string($conn, $_POST["muscles_mass"]);
    $patient_progress = mysqli_real_escape_string($conn, $_POST["patient_progress"]);
    $diet_plan = mysqli_real_escape_string($conn, $_POST["diet_plan"]);
    $exercise_routine = mysqli_real_escape_string($conn, $_POST["exercise_routine"]);
    $next_appointment = mysqli_real_escape_string($conn, $_POST["Next_appointment"]);


    // Retrieve Dietitian ID from the session
    $dietitian_id = $_SESSION['dietitian_id'];

    // Insert data into the visits table with the captured Dietitian ID
    $insert_query = "INSERT INTO vists (PatientID, DietitianID, `visit date`, weight, height, BMI, `fat mass`, `muscles mass`, PatientProgress, `diet plan`, `exercise routine`,`Next appointment`)
                     VALUES ('$patient_id', '$dietitian_id', '$visit_date', '$weight', '$height', '$bmi', '$fat_mass', '$muscles_mass', '$patient_progress', '$diet_plan', '$exercise_routine',' $next_appointment')";

   if (mysqli_query($conn, $insert_query)) {
    header("Location: patients.php");
        echo "Visit record added successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

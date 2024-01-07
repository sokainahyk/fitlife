<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the inputs
    $patient_name = mysqli_real_escape_string($conn, $_POST["patient_name"]);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $birth_date = mysqli_real_escape_string($conn, $_POST["birth_date"]);
    $dietitian_id = $_SESSION['dietitian_id'];
    

    // Insert data into the patients table
    $insert_query = "INSERT INTO patients (Patient_name, password, `birth date`, `D-ID`) 
                     VALUES ('$patient_name', '$password', '$birth_date', '$dietitian_id')";

    if (mysqli_query($conn, $insert_query)) {
        header("Location: patients.php");
        echo "Patient added successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

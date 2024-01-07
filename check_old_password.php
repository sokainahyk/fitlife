<?php
// check-the-password.php

include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['Patient_id'])) {
        $patientID = $_SESSION['Patient_id'];

        // Get the old password from the AJAX request
        $oldPassword = $_POST["oldPassword"];

        // Fetch the current hashed password from the database
        $stmt = $conn->prepare("SELECT password FROM patients WHERE `P-ID` = ?");
        $stmt->bind_param("i", $patientID);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // Verify the old password
            if (password_verify($oldPassword, $row['password'])) {
                // Old password is correct
                header("location:patientprofile.php");
                $response = ['status' => 'success'];
            } else {
                // Old password is incorrect
                $response = ['status' => 'error'];
            }
        } else {
            // Error in database query
            $response = ['status' => 'error'];
        }

        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    } else {
        // Patient not logged in
        $response = ['status' => 'error'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
       
        
    }
}
?>

<?php
// Include the database configuration
include 'config.php';

// Start the session (assuming you're using sessions for authentication)


// Check if the patient is logged in and retrieve the patient ID from the session
if (isset($_SESSION['Patient_id'])) {
    $patientID = $_SESSION['Patient_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM patients WHERE `P-ID` = ?");
    $stmt->bind_param("i", $patientID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $patientDetails = $result->fetch_assoc();
    // print_r($patientDetails);die();

    } else {
        $patientDetails = false;
    }


    // Close the statement
    $stmt->close();
} else {
    // Patient not logged in, handle accordingly
    $patientDetails = false;
}

// Close the database connection
$conn->close();

// Now $patientDetails is declared and contains patient information (or false if not logged in)
?>

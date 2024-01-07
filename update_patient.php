<?php
// update_patient.php
include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['Patient_id'])) {
        $patientID = $_SESSION['Patient_id'];
        
        // Get the form data
        $newPassword = $_POST["newPassword"];
        $newName = $_POST["patientName"];
        $newBirthdate = $_POST["birthDate"];

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the name, birthdate, and password in the patients table
        $sql = "UPDATE patients SET Patient_name = ?, `birth date` = ?, password = ? WHERE `P-ID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $newName, $newBirthdate, $hashedPassword, $patientID);
        
        if ($stmt->execute()) {
            // Successful update
            header("location:patientprofile.php");
            echo '<script>alert("Profile updated successfully!");</script>';
        } else {
            // Error in update
            echo "Error updating profile: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Patient not logged in, handle accordingly
        echo "Patient not logged in.";
    }
}
?>

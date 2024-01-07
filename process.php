<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $dietitianName = $_POST['dietitianName'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $birthDay = $_POST['birthDay'];
    

    // Prepare and execute SQL query to insert data into the dietitian table
    $sql = "INSERT INTO `dietitian` (`Dietitian name`, `address`, `phone number`, `password`, `birth date`)
            VALUES ('$dietitianName', '$address', '$phoneNumber', '$password', '$birthDay')";
    if ($conn->query($sql) === TRUE) {

        // Start a session
        session_start();

        // Store some information in the session
        $_SESSION['success_message'] = "New record created successfully";
        
        // Redirect to the form page or any other page as needed
        header("Location: adminmain.php");
        exit();
    } else {
        // Start a session
        session_start();

        // Store error message in the session
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        
        // Redirect to the form page or any other page as needed
        header("Location: adminmain.php");
        exit();
    }
}

// Close the database connection
$conn->close();
?>

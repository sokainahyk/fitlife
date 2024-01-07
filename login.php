<?php
 session_start(); 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use a secure method to hash passwords before checking (e.g., password_hash())
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Assuming you have a connection to your database
    include 'config.php';
    if (isset($_POST["submit"])) {
    // Query to check if the user is an admin
    $sql = "SELECT * FROM admin WHERE `user name`='$username'";
    $result = $conn->query($sql);

    $user = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if ($user && $password==$user["password"]) {
            // User is an admin
            header("Location: adminmain.php");
        } else {
            echo "Invalida username or password";
        }
    } else {
        // Check if the user is a dietitian
        $sql = "SELECT * FROM dietitian WHERE `Dietitian name`='$username'";
        $result = $conn->query($sql);
        $user = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify the password
            if ($user && password_verify($password, $user["password"])) {
                $_SESSION['dietitian_id']= $user['D-ID'];
                // User is a dietitian
                header("Location: dietitianmain.php");
            } else {
                echo "Invalidd username or password";
            }
        } else {
            // Check if the user is a patient
            $sql = "SELECT * FROM patients WHERE `Patient_name`='$username'";
            $result = $conn->query($sql);
            $user = mysqli_fetch_assoc($result);
    

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Verify the password
                if ($user && password_verify($password, $user["password"])) {
                    $_SESSION['Patient_id']= $user['P-ID'];

                    // User is a patient
                    header("Location: patientmain.php");
                } else {
                    echo "Invalidp username or password";
                }
            } else {
                // User not found, handle accordingly (e.g., display an error message)
                echo "Invalidsss username or password";
            }
        }
    }}

    $conn->close();
}
?>


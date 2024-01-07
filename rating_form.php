<!-- rate_dietitian.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Your Dietitian</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url('images/ll.JPEG');
        margin: 0;
        padding: 0;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
</head>
<?php include 'patient_header.php';?>
<body>

<div class="container mt-5">

    <?php
    // Include your database configuration file (e.g., config.php)
    include 'config.php';

   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['Patient_id'])) {
            // Fetch the list of dietitians for the logged-in patient
            $patientID = $_SESSION['Patient_id'];

            // Fetch the patient's dietitian from the database
            $sql = "SELECT `D-ID` FROM patients WHERE `P-ID` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $patientID);
            $stmt->execute();
            $stmt->bind_result($dietitianID);
            $stmt->fetch();
            $stmt->close();

            if (!$dietitianID) {
                echo '<div class="alert alert-danger" role="alert">Patient does not have an assigned dietitian.</div>';
            } else {
                // Process the form submission and save the rating to the database
                $rating = $_POST["rating"];

                // Insert the rating into the database
                $sql = "INSERT INTO rating (PatientID, DietitianID, rate) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iis", $patientID, $dietitianID, $rating);
                $stmt->execute();
                $stmt->close();

                echo '<div class="alert alert-success" role="alert">Rating submitted successfully!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">You need to be logged in to rate your dietitian.</div>';
        }
    }
    ?>

    <h2>Rate Your Dietitian</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="rating">Rate Your Dietitian (1 to 5):</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Rating</button>
    </form>

</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

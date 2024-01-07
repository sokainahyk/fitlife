<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Assuming you have an input field with the id "oldPasswordInput"
    $('#oldPasswordInput').on('input', function() {
        var oldPassword = $(this).val();

        // Perform AJAX request to check old password
        $.ajax({
            type: 'POST',
            url: 'check_old_password.php',
            data: { oldPassword: oldPassword },
            success: function(response) {
                if (response.status === 'success') {
                    // Old password is correct, change input color to green
                    $('#oldPasswordInput').css('border-color', 'green');
                } else {
                    // Old password is incorrect, change input color to red
                    $('#oldPasswordInput').css('border-color', 'red');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error checking old password:', error);
            }
        });
    });
});
</script>
</head>
<style>
    body {
        background-image: url('images/ll.JPEG');
        margin: 0;
        padding: 0;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<?php
include 'patient_header.php';
?>
<body>

<div class="container mt-5">

    <?php include 'get_patient_details.php'; ?>

    <?php if ($patientDetails): ?>
        <h2>Edit Patient Information</h2>
        <!-- Add a form for checking the old password -->
        <form action="check_old_password.php" method="post">
            <div class="form-group">
                <label for="oldPassword">Old Password:</label>
                <input type="password" class="form-control" id="oldPasswordInput" name="oldPassword" placeholder="Enter old password" required>

                <button type="submit" class="btn btn-secondary mt-2">Check Old Password</button>
            </div>
        </form>

        <!-- Form for updating patient information -->
        <form action="update_patient.php" method="post">
            <div class="form-group">
                <label for="patientName">Patient Name:</label>
                <input type="text" class="form-control" id="patientName" name="patientName" value="<?php echo $patientDetails['Patient_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date:</label>
                <input type="text" class="form-control" id="birthDate" name="birthDate" value="<?php echo $patientDetails['birth date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password" required>
            </div>
            <!-- Add more fields as needed -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    <?php else: ?>
        <p>Error fetching patient details or patient not logged in.</p>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

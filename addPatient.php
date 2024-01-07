<?php
// Include your database connection file (e.g., config.php)
include 'config.php';

// Fetch all patients from the database
$sql = "SELECT * FROM `patients`";
$result = $conn->query($sql);


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url('images/ll.JPEG');
            margin: 0;
        padding: 0;
        background-size:cover;
        background-repeat: no-repeat; 
        }

        
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2 class="pt-3">Add New Patient</h2>
    <form id="newPatient" action="add_patient.php" method="post" class="mb-4">
        <div class="w-100 p-3 m-0 border-0 bd-example m-0 border-0">
            <div class="row pt-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Patient Name" name="patient_name" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" required>
                </div>
            </div>
            <div class="d-grid gap-2 pt-3">
                <button class="btn btn-primary" type="submit">Add Patient</button>
            </div>
        </div>
    </form>

    <!-- Display Patients Table -->
    <div class="container mt-4">
        <h2>Patients List</h2>
        <table class="table table-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Birth Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['P-ID'] . '</th>';
                        echo '<td>' . $row['Patient_name'] . '</td>';
                        echo '<td>' . $row['birth date'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No patients found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

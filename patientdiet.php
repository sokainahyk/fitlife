
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">

    <style>
        /* Custom CSS for table styling */
        body {
            font-family: 'Lora', serif;
         background-color: white; /* Light Pink background */

        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: top 5%;
          
            
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff; /* Bootstrap Primary color for table header */
            color: white;
        }
        td {
            background-color: #ffffff; /* White color for table cells */
        }
        h2 {
            color: #007bff; /* Bootstrap Primary color for heading */
        }
    </style>
    <title>Diet Plan Details</title>
</head>
<?php
include 'patient_header.php';
?>
<body>

<?php

include 'config.php';

// Assuming you have a session started with the logged-in patient's information
if (isset($_SESSION['Patient_id'])) {
    // Retrieve patient's ID
    $patientId = $_SESSION['Patient_id'];

    // Query the database to get the planID of the last visit for the logged-in patient
    $lastVisitQuery = "SELECT `diet plan` FROM `vists` WHERE `PatientID` = $patientId ORDER BY `visit date` DESC LIMIT 1";

    // Execute the query
    $lastVisitResult = mysqli_query($conn, $lastVisitQuery);

    // Check if the query was successful
    if ($lastVisitResult && mysqli_num_rows($lastVisitResult) > 0) {
        // Fetch the result
        $lastVisitData = mysqli_fetch_assoc($lastVisitResult);

        // Get the planID from the last visit
        $lastPlanID = $lastVisitData['diet plan'];

        // Query the database to get the diet name for the last planID
        $dietNameQuery = "SELECT `Diet name` FROM `diet plan` WHERE `planID` = $lastPlanID";
        $dietNameResult = $conn->query($dietNameQuery);

        // Display diet plan details
        if ($dietNameResult->num_rows > 0) {
            $dietNameRow = $dietNameResult->fetch_assoc();
            $dietName = $dietNameRow['Diet name'];
            echo "<h2 class='text-center mt-4'> $dietName </h2>";

            echo "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th></th>"; // Empty cell for the top-left corner

            // Display weekdays as column headers
            $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            foreach ($weekdays as $weekday) {
                echo "<th>$weekday</th>";
            }

            echo "</tr>
                    </thead>
                    <tbody>";

            // Display meal types and details in one cell for each row
            $mealTypes = array("Breakfast", "Lunch", "Dinner", "First_Snack", "Second_Snack");
            foreach ($mealTypes as $mealType) {
                if ($mealType !== "Breakfast") { // Skip the "calories" for Breakfast
                    echo "<tr>
                            <th scope='row'>$mealType</th>"; // Meal type in the first column

                    // Query the database to get meal details for the specified diet plan
                    $mealDetailsQuery = "SELECT * FROM `meals` WHERE `planID` = $lastPlanID AND `mealType` = '$mealType'";
                    $mealDetailsResult = $conn->query($mealDetailsQuery);

                    // Display details for each weekday excluding "calories"
                    foreach ($weekdays as $weekday) {
                        $mealDetails = "";
                        if ($mealDetailsResult->num_rows > 0) {
                            while ($row = $mealDetailsResult->fetch_assoc()) {
                                if ($row['dayOfWeek'] === $weekday) {
                                    $mealDetails = "{$row['proteins']}<br>{$row['carbs']}<br>{$row['vegetablesFruits']}<br>{$row['fats']}";
                                    break;
                                }
                            }
                        }

                        echo "<td>$mealDetails</td>";
                    }

                    echo "</tr>";
                }
            }

            echo "</tbody>
                </table>";
        } else {
            echo "<p class='text-center mt-4'>Diet name not found for Diet Plan $lastPlanID.</p>";
        }
    } else {
        // Handle the case when there are no visits for the patient
        echo "<p class='text-center mt-4'>No visits found for the patient.</p>";
    }
} else {
    // Redirect to the login page if the patient is not logged in
    header("Location: login.php");
    exit();
}

// Close connection
$conn->close();
?>

<?php
include 'config.php';

?>

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
<body>

<?php
include 'header.php';
// Check if the query parameter 'planId' is set
if (isset($_GET['planId'])) {
    // Retrieve the value of 'planId'
    $planId = $_GET['planId'];

    // Use the value to query the database for diet plan details
    $sql = "SELECT * FROM `meals` WHERE `planID` = $planId";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Fetch the diet name associated with the planID
            $dietNameQuery = "SELECT `Diet name` FROM `diet plan` WHERE `planID` = $planId";
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

                        // Display details for each weekday excluding "calories"
                        foreach ($weekdays as $weekday) {
                            // Find the corresponding meal for the given weekday and meal type
                            $mealDetails = "";
                            $result->data_seek(0);
                            while ($row = $result->fetch_assoc()) {
                                if ($row['dayOfWeek'] === $weekday && $row['mealType'] === $mealType) {
                                    $mealDetails = "{$row['proteins']}<br>{$row['carbs']}<br>{$row['vegetablesFruits']}<br>{$row['fats']}";
                                    break;
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
                echo "<p class='text-center mt-4'>Diet name not found for Diet Plan $planId.</p>";
            }
        } else {
            echo "<p class='text-center mt-4'>No data found for Diet Plan $planId.</p>";
        }
    } else {
        // Handle the case when the query fails
        echo "<p class='text-center mt-4'>Error executing the query: " . $conn->error . "</p>";
    }
} else {
    // Handle the case when 'planId' is not set
    echo "<p class='text-center mt-4'>planId is not set in the URL</p>";
}

// Close connection
$conn->close();
?>

</body>
</html>



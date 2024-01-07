<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Diet Plan</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-image: url('images/ll.JPEG');
            margin: 0;
        padding: 0;
        background-size:cover;
        background-repeat: no-repeat; 
        }

        
   
        /* Customize the style for days boxes (pink color) */
        .card-header {
            background-color: white; /* Pink color */
            color: black;
            font-weight: bold;
        }

        /* Customize the style for meals boxes (light blue color) */
        .card-body {
            background-color: white; /* Light Blue color */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2>Create New Diet Plan</h2>
        <form action="newdietcode.php" method="post">
            <div class="form-group">
                <label for="planName">Diet Plan Name:</label>
                <input type="text" class="form-control" id="planName" name="planName" required>
            </div>

            <h3>Meals for Each Day:</h3>

            <div class="accordion" id="daysAccordion">
                <?php
                $daysOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

                foreach ($daysOfWeek as $dayOfWeek) {
                    echo '<div class="card">';
                    echo '<div class="card-header" id="' . $dayOfWeek . 'Heading">';
                    echo '<h2 class="mb-0">';
                    echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' . $dayOfWeek . 'Collapse" aria-expanded="true" aria-controls="' . $dayOfWeek . 'Collapse">';
                    echo $dayOfWeek;
                    echo '</button>';
                    echo '</h2>';
                    echo '</div>';

                    echo '<div id="' . $dayOfWeek . 'Collapse" class="collapse" aria-labelledby="' . $dayOfWeek . 'Heading" data-parent="#daysAccordion">';
                    echo '<div class="card-body">';

                    // Nested accordion for meals inside each day
                    echo '<div class="accordion" id="' . $dayOfWeek . 'MealsAccordion">';

                    $meals = array("Breakfast", "Lunch", "Dinner", "First_Snack", "Second_Snack");

                    foreach ($meals as $meal) {
                        echo '<div class="card">';
                        echo '<div class="card-header" id="' . $dayOfWeek . $meal . 'Heading">';
                        echo '<h2 class="mb-0">';
                        echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' . $dayOfWeek . $meal . 'Collapse" aria-expanded="true" aria-controls="' . $dayOfWeek . str_replace(' ', '', $meal) . 'Collapse">';
                        echo $meal;  // Using meal type as the header
                        echo '</button>';
                        echo '</h2>';
                        echo '</div>';

                        echo '<div id="' . $dayOfWeek . $meal . 'Collapse" class="collapse" aria-labelledby="' . $dayOfWeek . $meal . 'Heading" data-parent="#' . $dayOfWeek . 'MealsAccordion">';
                        echo '<div class="card-body">';

                        // Display input fields for each meal
                        
                        // Add more input fields as needed

                        echo "<div class='form-group'>";
                        echo "<label for='" . $dayOfWeek . $meal . "_calories'>Calories:</label>";
                        echo "<input type='text' class='form-control' id='" . $dayOfWeek . $meal . "_calories' name='" . $dayOfWeek . $meal . "_calories'>"; // required
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='" . $dayOfWeek . $meal . "_proteins'>Proteins:</label>";
                        echo "<input type='text' class='form-control' id='" . $dayOfWeek . $meal . "_proteins' name='" . $dayOfWeek . $meal . "_proteins' >";
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='" . $dayOfWeek . $meal . "_carbs'>Carbs:</label>";
                        echo "<input type='text' class='form-control' id='" . $dayOfWeek . $meal . "_carbs' name='" . $dayOfWeek . $meal . "_carbs' >";
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='" . $dayOfWeek . $meal . "_vegetablesFruits'>Vegetables/Fruits:</label>";
                        echo "<input type='text' class='form-control' id='" . $dayOfWeek . $meal . "_vegetablesFruits' name='" . $dayOfWeek . $meal . "_vegetablesFruits' >";
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='" . $dayOfWeek . $meal . "_fats'>Fats:</label>";
                        echo "<input type='text' class='form-control' id='" . $dayOfWeek . $meal . "_fats' name='" . $dayOfWeek . $meal . "_fats' >";
                        echo "</div>";

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                    echo '</div>'; // End of nested accordion for meals inside each day

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <button type="submit" class="btn btn-primary">Create Diet Plan</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

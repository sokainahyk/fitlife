<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $planName = mysqli_real_escape_string($conn, $_POST["planName"]);

    // Insert diet plan into the 'diet_plan' table
    $insertDietPlanQuery = "INSERT INTO `diet plan` (`Diet name`) VALUES (?)";
    $stmt = mysqli_prepare($conn, $insertDietPlanQuery);
    mysqli_stmt_bind_param($stmt, "s", $planName);
    mysqli_stmt_execute($stmt);

    // Get the planID of the inserted diet plan
    $planID = mysqli_insert_id($conn);

    $daysOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $meals = array("Breakfast", "Lunch", "Dinner", "First_Snack", "Second_Snack");

    foreach ($daysOfWeek as $dayOfWeek) {
        foreach ($meals as $meal) {
            // $mealType = mysqli_real_escape_string($conn, $_POST[$dayOfWeek . $meal]);
            $calories = mysqli_real_escape_string($conn, $_POST[$dayOfWeek . $meal . "_calories"]);
            $proteins = mysqli_real_escape_string($conn, $_POST[$dayOfWeek . $meal . "_proteins"]);
            $carbs = mysqli_real_escape_string($conn, $_POST[$dayOfWeek. $meal . "_carbs"]);
            $vegetablesFruits = mysqli_real_escape_string($conn, $_POST[$dayOfWeek . $meal . "_vegetablesFruits"]);
            $fats = mysqli_real_escape_string($conn, $_POST[$dayOfWeek . $meal . "_fats"]);

            // Insert meal into the 'meals' table
            $insertMealQuery = "INSERT INTO `meals` (`planID`, `dayOfWeek`, `mealType`, `calories`, `proteins`, `carbs`, `vegetablesFruits`, `fats`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                
            $stmt = mysqli_prepare($conn, $insertMealQuery);
            mysqli_stmt_bind_param($stmt, "isssssss", $planID, $dayOfWeek, $meal    , $calories, $proteins, $carbs, $vegetablesFruits, $fats);
            mysqli_stmt_execute($stmt);
        }
    }

    // Redirect to a success page or display a success message
    header("Location: dietplans.php");
    exit();
}
?>

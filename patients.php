<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/patients.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Patients</title>
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

<!-- Search Form -->
<div class="container w-50">
    <form id="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <input class="form-control" type="text" name="search" placeholder="Search for the patient:" required>
        <button class="btn btn-pink mt-2" type="submit">Search for patient</button>
        <style>
            .btn-pink {
                background-color:#f48fb1; /* Pink 500 - Change the color code according to your preference */
                color: #fff; /* Text color for better visibility */
            }
        </style>
        <a class="btn btn-primary mt-2" href="addPatient.php" role="button">Add new Patient</a>
    </form>
</div>

<?php
include 'config.php';
// Assuming you have a connection named $conn

// Check if the search parameter is set
if (isset($_GET['search'])) {
    // Get the search term
    $searchTerm = $_GET['search'];

    // Perform the database query to fetch patient and visit details
    $sql = "SELECT patients.*, vists.* 
        FROM patients 
        LEFT JOIN vists ON patients.`P-ID` = vists.`PatientID` 
        WHERE patients.Patient_name LIKE '%$searchTerm%'";

    $result = mysqli_query($conn, $sql);

    // Check if there are results
    if ($result && mysqli_num_rows($result) > 0) {
        // Display the search results in a table
        echo '<div class="container w-80">
                <table class="table table-hover table-primary" border="1">
                    <tr>
                        <th>Patient Name</th>
                        <th>Visit Date</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>BMI</th>
                        <th>Fat Mass</th>
                        <th>Muscles Mass</th>
                        <th>Patient Progress</th>
                        <th>Diet Plan</th>
                        <th>Exercise Routine</th>
                        <th>Next Visit</th>
                    </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . ($row['Patient_name'] ?? '') . '</td>';
            echo '<td>' . ($row['visit date'] ?? '') . '</td>';
            echo '<td>' . ($row['weight'] ?? '') . '</td>';
            echo '<td>' . ($row['height'] ?? '') . '</td>';
            echo '<td>' . ($row['BMI'] ?? '') . '</td>';
            echo '<td>' . ($row['fat mass'] ?? '') . '</td>';
            echo '<td>' . ($row['muscles mass'] ?? '') . '</td>';
            echo '<td>' . ($row['PatientProgress'] ?? '') . '</td>';
            echo '<td>' . ($row['diet plan'] ?? '') . '</td>';
            echo '<td>' . ($row['exercise routine'] ?? '') . '</td>';
            echo '<td>' . ($row['Next appointment'] ?? '') . '</td>';
            echo '</tr>';
        }

        echo '</table></div>';
    } else {
        echo 'No results found.';
    }
}

// Do not close the database connection here
// mysqli_close($conn);
?>

<!-- Form for adding a new visit record -->
<h2>Add New Visit Record</h2>
<form id="newV" action="add_visit.php" method="post">
    <?php
    // Check if the search parameter is set
    if (isset($_GET['search'])) {
        // Get the search term
        $searchTerm = $_GET['search'];

        // Perform the database query to fetch patient details
        $patientQuery = "SELECT `P-ID`, `Patient_name` FROM `patients` WHERE `Patient_name` LIKE '%$searchTerm%'";
        $patientResult = mysqli_query($conn, $patientQuery);

        // Check if there are results
        if ($patientResult && mysqli_num_rows($patientResult) > 0) {
            $patient = mysqli_fetch_assoc($patientResult);
            echo '<input type="hidden" name="patient_id" value="' . $patient['P-ID'] . '">';
            echo 'Patient Name: ' . $patient['Patient_name'] . '<br>';
        } else {
            echo 'No patient found.';
        }
    }
    ?>

        <!-- Continue with the rest of the form fields -->
        <div class="w-100 p-3 m-0 border-0 bd-example m-0 border-0">
              <div class="row">
               <div class="col col-primary"> <input type="date" class="form-control" placeholder="visit date" name="visit_date" required> </div>
              
            </div>
              <div class="row pt-2">
              <div class="col"> <input type="text" class="form-control" placeholder="weight" name="weight" required></div>
               <div class="col"> <input type="text" class="form-control" placeholder="height" name="height" required> </div>
               </div>
              <div class="row pt-2 ">
              <div class="col"> <input type="text" class="form-control" placeholder="bmi" name="bmi" required></div>
              <div class="col"> <input type="text" class="form-control" placeholder="fat mass" name="fat_mass" required> </div>
             
              </div>
    <div class="row pt-2">
    <div class="col"> <input type="text" class="form-control" placeholder="muscles mass" name="muscles_mass" required></div>
    <div class="col"> <input type="text" class="form-control" placeholder="% progress" name="patient_progress" required> </div>
    </div> 
           <div class="row pt-2">
              
           <div class="row pt-2">
    <div class="col">
        <select class="form-select" name="diet_plan" required>
            <option value="" disabled selected>Select Diet Plan</option>

            <?php
            // Perform the database query to fetch all diet plans
            $dietPlanQuery = "SELECT `planID`, `Diet name` FROM `diet plan`";
            $dietPlanResult = mysqli_query($conn, $dietPlanQuery);

            // Check if there are results
            if ($dietPlanResult && mysqli_num_rows($dietPlanResult) > 0) {
                // Display each diet plan as an option in the dropdown
                while ($dietPlan = mysqli_fetch_assoc($dietPlanResult)) {
                    echo '<option value="' . $dietPlan['planID'] . '">' . $dietPlan['Diet name'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No diet plans found</option>';
            }
            ?>

        </select>
    </div>
    <div class="col pr-5">
        <select class="form-select" name="exercise_routine" required>
            <option value="" disabled selected>Select Exercise Routine</option>

            <?php
            // Perform the database query to fetch all exercise routines
            $exerciseRoutineQuery = "SELECT `ER-ID`, `routine-name` FROM `exercise routines`";
            $exerciseRoutineResult = mysqli_query($conn, $exerciseRoutineQuery);

            // Check if there are results
            if ($exerciseRoutineResult && mysqli_num_rows($exerciseRoutineResult) > 0) {
                // Display each exercise routine as an option in the dropdown
                while ($exerciseRoutine = mysqli_fetch_assoc($exerciseRoutineResult)) {
                    echo '<option value="' . $exerciseRoutine['ER-ID'] . '">' . $exerciseRoutine['routine-name'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No exercise routines found</option>';
            }
            ?>

        </select>
    </div>
              </div>
    <div class="row pt-2">
       
    <div class="col col-primary"> Next visit</label><input type="date" class="form-control" placeholder="Next appointment" name="Next appointment" required> </div>
    </div>
          
           <div class="d-grid gap-2 pt-3">
  
  <button class="btn btn-primary " type="submit" value="Add Visit">Add</button>
</div>
       </div>
    </form>

    <?php
    
    // Close the database connection at the end of the script
    mysqli_close($conn);
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patient main</title>
    <link rel="stylesheet" href="styles/patientmain.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+6L5QvQjGO5u78P4gTPdH6L5b5U2ExT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add this after the jQuery script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/src/js.cookie.min.js"></script>

<script>
    // Add this script after the Bootstrap JS is included
    $(document).ready(function(){
        $('#ratingModal').modal({
            show: false
        });
    });
</script>

<style>

    .navbar-vertical .navbar-toggler {
        margin-top: 0;
        vertical-align: middle;
    }
    .navbar-nav .nav-link {
    transition: color 0.2s ease; /* Add smooth transition for color change */
}

.navbar-nav .nav-link:hover {
    color: black; /* Change the color to your desired hover color */
}

</style>
</head>
<body>

<?php include 'patient_header.php'; ?>

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Left Side: Image Slider and Next Appointment -->
        <div class="col-md-6">
            <!-- Image Slider -->
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/qout1.jpg" class="d-block w-100" alt="...">
                    </div>
                  <!-- <div class="carousel-item">
                        <img src="images/qout2.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/qout3.png" class="d-block w-100" alt="...">
                    </div>-->
                </div>
            </div>

            <!-- Next Appointment Box -->
            
            <?php
// Assuming you have a connection named $conn
include 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in

    $patientId = $_SESSION['Patient_id'];

    // Query the database to get the last visit for the logged-in patient
    $lastVisitQuery = "SELECT `Next appointment` FROM `vists` WHERE `PatientID` = $patientId ORDER BY `visit date` DESC LIMIT 1";
    $lastVisitResult = mysqli_query($conn, $lastVisitQuery);

    // Check if there are results
    if ($lastVisitResult && mysqli_num_rows($lastVisitResult) > 0) {
        $lastVisit = mysqli_fetch_assoc($lastVisitResult);
        $nextAppointmentDate = $lastVisit['Next appointment'];
        echo "<div class='pt-5 pl-5 ml-5'>
                <h4>Next Appointment Date:</h4>
                <p>$nextAppointmentDate</p>
              </div>";
    } else {
        echo "No visits found for the logged-in patient.";
      
    }
 
?>

            
        </div>

        <!-- Right Side: Checkbox Box and Vertical Navbar -->
        <div class="col-md-6">
            <div class="row">
            <div class="container col-md-7 ml-5 h-25 ">
                <h3>Your Daily Progress</h3>
                <form id="checkbox-form">
                    <!-- Checkbox Box and Database Insert code remains the same -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox[]" value="1">
                        <label class="form-check-label" for="checkbox1">Breakfast</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox2" name="checkbox[]" value="2">
                        <label class="form-check-label" for="checkbox2">First Snack</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox3" name="checkbox[]" value="3">
                        <label class="form-check-label" for="checkbox3">Lunch</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox4" name="checkbox[]" value="4">
                        <label class="form-check-label" for="checkbox4">Second Snack</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox5" name="checkbox[]" value="5">
                        <label class="form-check-label" for="checkbox5">Dinner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox6" name="checkbox[]" value="6">
                        <label class="form-check-label" for="checkbox6">Drink 2L water</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox7" name="checkbox[]" value="7">
                        <label class="form-check-label" for="checkbox7">Sport</label>
                    </div>

                    <button type="button" class="btn btn-primary mt-3 mb-3" onclick="calculatePercentage()">I'm Done</button>
                    
                </form>

            </div>
            <div class="container2 col-md-2 mr-2 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-right w-25 navbar-vertical">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="patientprofile.php"><i class="fa-solid fa-user"></i>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patientdiet.php"><i class="fa-solid fa-utensils"></i>Diet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patientex.php"><i class="fa-solid fa-dumbbell"></i>Exercise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rating_form.php"><i class="fa-regular fa-star"></i>rating</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="library.php"><i class="fa-solid fa-book-open"></i>library</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Rate Your Dietitian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Include the rating form here -->
                <?php include 'rating_form.php'; ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
            <!-- Vertical Navbar on the Right Side -->
           
        </div>
        
    </div>
</div>


<script>
    // JavaScript to handle the image slider
    $(document).ready(function () {
            // Check if there's a saved image index in the cookie
            let savedIndex = Cookies.get('carouselImageIndex');
            let startIndex = savedIndex ? parseInt(savedIndex) : 0;

            // Initialize the carousel with the starting image index
            $('#carouselExampleSlidesOnly').carousel({
                interval: 1000 * 60 * 60 * 24, // Change image every 24 hours
                ride: false, // Prevents cycling when clicking next/prev
                start: startIndex
            });

            // Save the current image index to the cookie when the slide changes
            $('#carouselExampleSlidesOnly').on('slide.bs.carousel', function (event) {
                let newIndex = event.to;
                Cookies.set('carouselImageIndex', newIndex);
            });
        });


    // JavaScript to calculate the percentage of checked checkboxes
    function calculatePercentage() {
        var totalCheckboxes = document.querySelectorAll('input[name="checkbox[]"]').length;
        var checkedCheckboxes = document.querySelectorAll('input[name="checkbox[]"]:checked').length;

        var percentage = (checkedCheckboxes / totalCheckboxes) * 100;

        // Update the form with the calculated percentage
        document.getElementById("checkbox-form").innerHTML +=
            '<input type="hidden" name="percentage" value="' + percentage + '">';

        // Submit the form
        document.getElementById("checkbox-form").submit();
    }
</script>

</body>
</html>

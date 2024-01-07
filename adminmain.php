
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+6L5QvQjGO5u78P4gTPdH6L5b5U2ExT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Dietitian Information Form</title>
</head>

<body>
<header>
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.PNG" alt="Your Logo">
        </a>
    </div>
</header>
<h2>Dietitian Information Form</h2>

<?php
// Start a session


// Check for success or error messages in the session
if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>".$_SESSION['success_message']."</p>";
    unset($_SESSION['success_message']); // Clear the message
}

if (isset($_SESSION['error_message'])) {
    echo "<p style='color: red;'>".$_SESSION['error_message']."</p>";
    unset($_SESSION['error_message']); // Clear the message
}
?>
<form action="process.php" method="post">
<div class="w-100 p-3 m-0 border-0 bd-example m-0 border-0">
        <div class="row pt-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Dietitian name" name="dietitianName" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Adress" name="address" required>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Phone number" name="phoneNumber" required>
            </div>
        
            <div class="col">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                <input type="date" class="form-control" placeholder="Birth Date" name="birthDay" required>
            </div>
           
        </div>
        <div class="d-grid gap-2 pt-3">
            <button class="btn btn-primary" type="submit">Add Dietitian</button>
        </div>
 
</form>

</body>
</html>

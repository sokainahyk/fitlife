<?php
include 'config.php';
include 'header.php'; // Assuming your database connection is in config.php

$sql = "SELECT * FROM `exercise routines`";
$result = $conn->query($sql);

$names = array(); // Initialize the array to avoid undefined variable warning

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $names[$row["ER-ID"]] = $row["routine-name"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Diet Plans</title>
    <script>
        function redirectToDetails(id) {
            window.location.href = 'routinesdetails.php?ER-Id=' + encodeURIComponent(id);
        }
    </script>
     <style>
        body {
            background-image: url('images/ll.JPEG');
            margin: 0;
        padding: 0;
        background-size:cover;
        background-repeat: no-repeat; 
        }

        
    </style>
    <style>
    button {
        padding: 5%;
        margin: 5%;
        font-size: 2vh;
        background-color: rgba(3, 152, 238, 0.493);
        border-radius:2vh
       
    }
    .container{
    
    }
    
    </style>
</head>
<body>
     
    <div>
    <a class="btn btn-primary w-100 mt-5 mb-5" href="uploadexercises.php" role="button">Add new Routine</a>    
 
  
</div>
    <div class="container">
    <?php
    if (!empty($names)) {
        foreach ($names as $id => $name) {
            echo '<button type="button" onclick="redirectToDetails('.$id.')">' . $name . '</button>';
        }
    } else {
        echo 'No routiens available.';
    }
    ?>
   </div>

</body>
</html>

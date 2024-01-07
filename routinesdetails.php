<?php
// Include your database connection file (e.g., config.php)
include 'config.php';

if (isset($_GET['ER-Id'])) {
    // Retrieve the value of 'ER-Id'
    $ER_Id = $_GET['ER-Id'];

    // Use the value to query the database for exercise routines details
    $sql = "SELECT * FROM `exercise routines` WHERE `ER-ID` = $ER_Id";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Fetch exercise routine details
            $row = $result->fetch_assoc();

            // Start HTML page
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Exercise Routine Details</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
       

        
    </style>
            </head>
            <?php include 'header.php'; ?>
            <body>

                <div class="container mt-5">
                   

                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['routine-name']; ?></h5>
                            <p class="card-text">Time: <?php echo $row['time']; ?></p>
                            <p class="card-text">Description: <?php echo $row['description']; ?></p>
                        </div>
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Exercise Routine Image">
                    </div>

                </div>

            </body>
            </html>

            <?php
        } else {
            echo "No data found for Exercise Routine $ER_Id.";
        }
    } else {
        // Handle the case when the query fails
        echo "Error executing the query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when 'ER-Id' is not set
    echo "ER-Id is not set in the URL";
}
?>

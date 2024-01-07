<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise Routine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<?php include 'header.php';?>
<body>


    <div class="container mt-5">
        <h2>Add New Exercise Routine</h2>
        <form action="process_add_routine.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="routineName">Exercise Routine Name:</label>
                <input type="text" class="form-control" id="routineName" name="routineName" required>
            </div>

            <div class="form-group">
                <label for="routineTime">Exercise Routine Time:</label>
                <input type="text" class="form-control" id="routineTime" name="routineTime" required>
            </div>

            <div class="form-group">
                <label for="routineImage">Exercise Routine Image:</label>
                <input type="file" class="form-control-file" id="routineImage" name="routineImage" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="routineDescription">Exercise Routine Description:</label>
                <textarea class="form-control" id="routineDescription" name="routineDescription" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" >Add Routine</button>
        </form>
    </div>

</body>
</html>

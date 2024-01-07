<?php include 'patient_header.php';?>
<?php
// Include your database connection file (e.g., config.php)
include 'config.php';

// Fetch all library items from the database
$sql = "SELECT * FROM `library_items`";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS styles -->
    <style>
         body {
        background-image: url('images/ll.JPEG');
        margin: 0;
        padding: 0;
        background-size: cover;
        background-repeat: no-repeat;
    }

        .container {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .library-item {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .library-item h2 {
            color: #007bff; /* Bootstrap primary color */
        }

        .library-item iframe {
            width: 100%;
            height: 315px;
        }

        .library-item a {
            display: block;
            margin-top: 10px;
            color: #28a745; /* Bootstrap success color */
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Library</h1>

    <!-- Search Form -->
    <form id="search-form">
        <div class="form-group">
            <input type="text" class="form-control" id="search-input" placeholder="Search for articles">
        </div>
    </form>

    <div id="suggestions"></div>

    <?php
    // Check if there are library items in the database
    if ($result && $result->num_rows > 0) {
        echo '<div id="library-items">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="library-item">';
            echo '<h2>' . $row['title'] . '</h2>';

            // Check if the item is a video or article
            if ($row['type'] == 'video') {
                echo '<iframe src="' . $row['url'] . '" frameborder="0" allowfullscreen></iframe>';
            } elseif ($row['type'] == 'article') {
                echo '<a href="' . $row['url'] . '" target="_blank">Read Article</a>';
            }

            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No library items available.</p>';
    }
    ?>

</div>

<!-- Bootstrap JS scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#search-input').on('input', function () {
            var keyword = $(this).val();

            $.ajax({
                type: 'GET',
                url: 'search_suggestions.php', // Create a new PHP file for handling suggestions
                data: {keyword: keyword},
                success: function (data) {
                    $('#suggestions').html(data);
                }
            });
        });
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>

    <!-- Content goes here -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php require_once("includes/header.php") ?>
    <?php 
$genres = json_decode(file_get_contents('assets/movies-list-db.json'), true)['genres'];?>
</br>
    </br>
<div class="container">
    <div class="content">
        <div class="row">
            <?php
            foreach ($genres as $index => $genre) {
                // Determine the column size based on Bootstrap's grid system
                echo "<div class='col-6 col-sm-4 col-md-3 col-lg-2 mb-3 genre-item'>"; // 5 items per row on larger screens
                echo "<strong><a href='movies.php?genre=" . $genre . "' style='color: black; text-decoration: none;'>" . htmlspecialchars($genre) . "</a></strong>";
                echo "</div>"; // Close the column div
            }
            ?>
        </div>
    </div>
</div>

        <?php include("includes/footer.php") ?>
</body>
</html>

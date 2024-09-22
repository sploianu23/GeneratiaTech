<?php
require_once('includes/header.php'); // Ensure movies are included from header.php

$filteredMovies = [];
$pageTitle = 'Movies';

// Check if 'genre' exists in the GET request
if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    $genre = htmlspecialchars($_GET['genre']); // Sanitize input

    // Filter movies by the selected genre
    $filteredMovies = array_filter($movies, function($movie) use ($genre) {
        return in_array($genre, $movie['genres']); // Assuming 'genres' is an array in each movie
    });

    // Set the title to the selected genre if there are results
    if (!empty($filteredMovies)) {
        $pageTitle = ucfirst($genre) . ' Movies';
    } else {
        // If no movies are found for the given genre, show a warning message
        $warningMessage = "No movies found in the selected genre. Showing all movies.";
        $filteredMovies = $movies; // Fall back to displaying all movies
    }
} else {
    // If 'genre' is not set or invalid, display all movies
    $filteredMovies = $movies;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body {
    background-image: url('assets/background.jpg'); /* Path to your background image */
    background-size: cover; /* Cover the entire page */
    background-attachment: fixed; /* Fixed attachment for scrolling effect */
    background-position: center; /* Center the image */
    color: #333; /* Text color for contrast */
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
    min-height: 100vh; /* Ensure body takes full height */
    display: flex; /* Enable flexbox layout */
    flex-direction: column; /* Stack elements vertically */
}
</style>
</head>
<body>

    <?php require_once("includes/header.php"); ?>

    <div class="container mt-4">
        <div class='content'>
        <h1 class="mb-4"><?php echo $pageTitle; ?></h1>
        
        <?php 
        // If there is a warning, display it
        if (isset($warningMessage)): ?>
            <div class="alert alert-warning"><?php echo $warningMessage; ?></div>
        <?php endif; ?>

        <div class="row">
            <?php 
            // Include the archive-movies.php file to display the filtered movies
            include("includes/archive-movies.php");
            ?>
        </div>
    </div>
        </div>
        </br>
    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <?php require_once('includes/header.php'); ?>

    <?php
    if (!empty($_GET['s']) && isset($_GET['s'])) {
        // Store the search phrase from the GET parameter
        $FRAZA_DE_CAUTARE = htmlspecialchars($_GET['s']);
    ?>
        <title>Search Results for "<?php echo $FRAZA_DE_CAUTARE; ?>"</title>
    </head>
    <body>
        <?php include('includes/search-form.php'); ?>

        <!-- Display the search query -->
        <div class="container mt-4">
            <h1>Search Results for: <?php echo $FRAZA_DE_CAUTARE; ?></h1>
            
            <?php
            // Assuming $movies is an array of movie data (title, genre, etc.)
            $filteredMovies = array_filter($movies, function($movie) use ($FRAZA_DE_CAUTARE) {
                return preg_match("/{$FRAZA_DE_CAUTARE}/i", $movie['title']);
            });

            // Check if any movies matched the search term
            if (!empty($filteredMovies)) {
                echo "<ul class='list-group'>";
                foreach ($filteredMovies as $movie) {
                    echo "<li class='list-group-item'>";
                    echo "<div class='d-flex align-items-start'>"; // Flexbox container for image and text
            
                    // Display the movie poster on the left
                    echo "<img src='" . $movie['posterUrl'] . "' alt='" . htmlspecialchars($movie['title']) . "' class='img-thumbnail me-3' style='width: 100px; height: auto;'>";
            
                    // Display movie details on the right
                    echo "<div>";
                    echo "<h4><a href='movie.php?movie_id=" . $movie['id'] . "' class='link-primary text-decoration-none text-primary'>" . htmlspecialchars($movie['title']) . "</a></h4>";
                    echo "<p>Genre: " . htmlspecialchars(implode(', ', $movie['genres'])) . "</p>";
                    echo "<p>Released: " . htmlspecialchars($movie['year']) . "</p>";
                    echo "</div>"; // Close movie details div
            
                    echo "</div>"; // Close flex container
                    echo "</li>";
                }
                echo "</ul>";
            
            } else {
                echo "<strong><p class='text-danger'>No results found for '$FRAZA_DE_CAUTARE'.</p></strong>";
            }
            ?>
        </div>

    <?php
    } else {
    ?>
        <title>Search Error</title>
    </head>
    <body>
        <div class="container mt-4">
            <p class="text-warning">Warning: The search value can't be blank.</p>
            <a href="index.php" class='btn btn-primary'>Go back to the Home Page</a>
        </div>
    <?php
    }
    ?>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

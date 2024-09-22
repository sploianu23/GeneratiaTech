<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("includes/header.php");

    // Check if 'movie_id' is set and valid
    if (!empty($_GET) && isset($_GET['movie_id'])) {
        $movieId = $_GET['movie_id'];
        // Filter the movie array to find the movie with the specified ID
        $filteredMovies = array_filter($movies, function($movie) use ($movieId) {
            return $movie['id'] == $movieId;
        });

        // Check if a movie was found
        if (!empty($filteredMovies)) {
            $movie = array_shift($filteredMovies);?>
    <title><?php echo $movie['title'] ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- Content goes here -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

            <div class="container mt-5">
                <div class='content'>
                <h2><?php echo $movie['title'] ?>
                    <?php if (check_old_movies($movie['year']) !== FALSE): ?>
                        <span class="badge bg-secondary">Old Movie: <?php echo check_old_movies($movie['year'])?> years</span>
                    <?php endif; ?>
                </h2>
                
                <div class="row">
                    <div class="col-3">
                        <img src="<?php echo $movie['posterUrl']?>" class="img-fluid rounded float-start" alt="">
                    </div>
                    <div class="col-9">
                        <p>Released: <?php echo $movie['year']; ?><br>
                        Runtime: <?php echo runtime_prettier($movie['runtime']); ?></p>
                        <p><?php echo $movie['plot']; ?></p>
                        <h6>Genre: <?php echo implode(", ", $movie['genres']); ?></h6>
                        <?php
                        // Display actors
                        $actorsArray = explode(", ", $movie['actors']); ?>
                        <h6>Cast:
                            <ul style='list-style-type: circle;'>
                                <?php foreach ($actorsArray as $actor) {
                                    echo "<li>" . $actor . "</li>";
                                } ?>
                            </ul>
                        </h6>
                        <h6>Directors: <?php echo $movie['director']; ?></h6>
                    </div>
                </div>
            </div>
    <?php
        } else {
            // Movie not found or invalid ID
            echo "<div class='container'>";
            echo "<p>Error: Movie not found.</p>";
            echo "<a href='movies.php' class='btn btn-primary'>Go back to Movies</a>";
            echo "</div>";
        }
    } else {
        // Missing or invalid movie ID parameter
        echo "<div class='container'>";
        echo "<p>Error: Invalid or missing movie ID.</p>";
        echo "<a href='movies.php'class='btn btn-primary'>Go back to Movies</a>";
        echo "</div>";
    }
    echo "</div>";
    include("includes/footer.php");
    ?>

</body>


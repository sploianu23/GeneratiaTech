<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    require_once("includes/header.php");

    // Check if 'movie_id' is set and valid
    if (!empty($_GET) && isset($_GET['movie_id'])) {
        $movieId = $_GET['movie_id'];
        // Filter the movie array to find the movie with the specified ID
        $filteredMovies = array_filter($movies, function($movie) use ($movieId) {
            return $movie['id'] == $movieId;
        });

        // Check if a movie was found
        if (!empty($filteredMovies)) {
            $movie = array_shift($filteredMovies); 
            $favorites_count = read_favorites_count(); // Read favorites count from JSON
            $voted_films = isset($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites'], true) : [];
            $is_favorite = in_array($movieId, $voted_films);

            // Handle adding/removing favorites
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $action = $_POST['action'] ?? '';

                if ($action === 'add' && !$is_favorite) {
                    // Add movie to favorites
                    $voted_films[] = $movieId;
                    $favorites_count[$movieId] = ($favorites_count[$movieId] ?? 0) + 1;

                } elseif ($action === 'remove' && $is_favorite) {
                    // Remove movie from favorites
                    $voted_films = array_filter($voted_films, fn($id) => $id !== $movieId);
                    
                }

                // Update cookie and JSON file
                setcookie('favorites', json_encode($voted_films), time() + (365 * 24 * 60 * 60), "/");
                save_favorites_count($favorites_count);

                // Redirect to the same page with the movie_id in the query string
                header("Location: " . $_SERVER['PHP_SELF'] . "?movie_id=" . $movieId);
                exit();
            }
            ?>
    <title><?php echo $movie['title'] ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <div class='content'>
        <h2><?php echo $movie['title'] ?>
            <?php if (check_old_movies($movie['year']) !== FALSE): ?>
                <span class="badge bg-secondary">Old Movie: <?php echo check_old_movies($movie['year']) ?> years</span>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="hidden" name="action" value="<?php echo $is_favorite ? 'remove' : 'add'; ?>">

                <!-- Display button based on favorite status -->
                <?php if ($is_favorite): ?>
                    <button class="btn btn-dark" name="action" value="remove" type="submit"><strong>Șterge din favorite</strong></button>
                <?php else: ?>
                    <button class="btn btn-outline-dark" name="action" value="add" type="submit"><strong>Adaugă la favorite</strong></button>
                <?php endif; ?>

                <!-- Display the number of times added to favorites -->
                <span class="badge bg-info"><?php echo $favorites_count[$movieId] ?? 0; ?> adăugări la favorite</span>
            </form>
        </h2>

        <div class="row">
            <div class="col-3">
                <img src="<?php echo check_poster($movie['posterUrl']) ?>" class="img-fluid rounded float-start" alt="">
            </div>
            <div class="col-9">
                <p>Released: <?php echo $movie['year']; ?><br>
                Runtime: <?php echo runtime_prettier($movie['runtime']); ?></p>
                <p><?php echo $movie['plot']; ?></p>
                <h6>Genre: <?php echo implode(", ", $movie['genres']); ?></h6>
                <h6>Cast:
                    <ul style='list-style-type: circle;'>
                        <?php foreach (explode(", ", $movie['actors']) as $actor): ?>
                            <li><?php echo $actor; ?></li>
                        <?php endforeach; ?>
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
        echo "<a href='movies.php' class='btn btn-primary'>Go back to Movies</a>";
        echo "</div>";
    }
    echo "</div>";
    include("includes/footer.php");
    ?>

</body>
</html>

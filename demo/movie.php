<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    require_once("includes/header.php");

    $ratingsFile = "assets/movie-rating.json"; // Path to the ratings file

    // Ensure the ratings file exists
    if (!file_exists($ratingsFile)) {
        file_put_contents($ratingsFile, json_encode([])); // Create an empty JSON file if it doesn't exist
    }

    // Load ratings from the JSON file
    $ratings = json_decode(file_get_contents($ratingsFile), true);

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
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
                $action = $_POST['action'];

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

            // Check if the user already rated this movie
            $userRatings = isset($_COOKIE['user_ratings']) ? json_decode($_COOKIE['user_ratings'], true) : [];
            $userRating = $userRatings[$movieId] ?? null;

            // Handle form submission for rating
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
                $rating = (int)$_POST['rating']; // Get the rating from the form

                // Update the rating in the JSON file
                if (!isset($ratings[$movieId][$rating])) {
                    $ratings[$movieId][$rating] = 0; // Initialize if rating doesn't exist
                }
                $ratings[$movieId][$rating]++; // Increment the count for the specific rating

                // Save the updated ratings to the file
                file_put_contents($ratingsFile, json_encode($ratings));

                // Set a cookie to prevent multiple ratings from the same user (lasts for 1 year)
                $userRatings[$movieId] = $rating;
                setcookie('user_ratings', json_encode($userRatings), time() + (365 * 24 * 60 * 60), "/");

                // Redirect to avoid form resubmission
                header("Location: " . $_SERVER['PHP_SELF'] . "?movie_id=" . $movieId);
                exit();
            }

            // Calculate the average rating for the movie
            $totalRatings = 0;
            $ratingCount = 0;
            if (isset($ratings[$movieId])) {
                foreach ($ratings[$movieId] as $rate => $count) {
                    $totalRatings += $rate * $count;
                    $ratingCount += $count;
                }
            }

            $averageRating = $ratingCount > 0 ? $totalRatings / $ratingCount : null;
            ?>
            <?php
            // Handle form submission
            $form_submitted = false;
            $email_exists = false;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Prelucrează datele formularului
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                

                // Mark form as submitted
                $form_submitted = true;

                //Create connection to db
                $conn = db_connect();
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                  }
                $sql = "CREATE TABLE IF NOT EXISTS reviews (
                    id INT(6) AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL,
                    message VARCHAR(1000) NOT NULL,
                    movie_id INT(6) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )";
                mysqli_query($conn, $sql);
                $sql = "SELECT * FROM reviews WHERE email = '{$email}' AND movie_id = {$movie['id']}";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)==0){
                    $sql = "INSERT INTO reviews (name, email, message, movie_id)
                    VALUES ('$name', '$email', '$message', '$movie[id]')";
                    mysqli_query($conn, $sql);
                }else{
                    $email_exists = true;
                }
                

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
                    <button class="btn btn-dark" name="action" value="remove" type="submit"><strong>Remove from favorites</strong></button>
                <?php else: ?>
                    <button class="btn btn-outline-dark" name="action" value="add" type="submit"><strong>Add to favorites</strong></button>
                <?php endif; ?>

                <!-- Display the number of times added to favorites -->
                <span class="badge bg-info"><?php echo $favorites_count[$movieId] ?? 0; ?> added to favorites</span>
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
                
                <!-- Display the average rating and total votes -->
                <div class="container mt-5">
                    <h2 class="mb-4">Rate This Movie</h2>
                    <?php if ($averageRating !== null): ?>
                        <p><?php echo $ratingCount; 
                        if($ratingCount>1){
                            echo ' visitors';
                        }else{
                            echo ' visitor';
                        }?>  rated this movie. Average Rating: <?php echo number_format($averageRating, 1); ?></p>
                    <?php else: ?>
                        <p>Be the first to rate this movie!</p>
                    <?php endif; ?>

                    <!-- Rating form -->
                    <?php if ($userRating): ?>
                        <p>You already rated this movie: <?php echo $userRating; ?></p>
                    <?php else: ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Please rate the movie:</label>
                                <div class="btn-group" role="group" aria-label="Rating group">
                                    <!-- Radio buttons styled as Bootstrap buttons -->
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <input type="radio" class="btn-check rating-input" name="rating" id="rating-<?php echo $i; ?>" value="<?php echo $i; ?>" required>
                                        <label class="btn btn-outline-dark rating-label" for="rating-<?php echo $i; ?>"><?php echo $i; ?></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Submit Rating</button>
                        </form>

                    <?php endif; ?>
                </div>
                <div class="container mt-5">
                    <h2>Leave a Review</h2>

                    <!-- Alert Box displayed after form submission -->
                    <?php if ($form_submitted):
                        if($email_exists):?>
                        <div class="alert alert-danger mt-4" role="alert">
                            This user already submited a review!
                        </div>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="dataAgreement" required>
                                <label class="form-check-label" for="dataAgreement">I agree to the collection and usage of my data</label>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Submit Review</button>
                        </form>
                        <?php else: ?>
                        <div class="alert alert-success mt-4" role="alert">
                            Your review has been successfully submitted. Thank you!
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Form Section -->
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="dataAgreement" required>
                                <label class="form-check-label" for="dataAgreement">I agree to the collection and usage of my data</label>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Submit Review</button>
                        </form>
                    <?php endif; ?>
                    <h3 class="mt-5">Reviews</h3>
                    <div id="reviews">
                        <!-- Existing reviews will be displayed here -->
                        <?php 
                        $conn = db_connect();
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                          }
                          $tableName = 'reviews';
                          $sql = "SHOW TABLES LIKE '$tableName'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0){
                                $sql = "SELECT name, message FROM reviews WHERE movie_id = {$movie['id']}";
                                $result = mysqli_query($conn,$sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              echo  "<h6>" . $row["name"] . " reviewed " . $movie['title'].  "</h6><p>\"" . $row["message"] . "\"</p><br>";
                            }
                          } else {
                            echo "<strong>No reviews yet for ".$movie['title']. ".</strong>";
                          }
                            }else{
                                echo "<strong>No reviews yet for ".$movie['title']. ".</strong>";
                            }

                        
                        ?>
                    </div>
                </div>
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
<?php 
// Check if filtered movies exist, otherwise fall back to the original movie list
$moviesToDisplay = isset($filteredMovies) ? $filteredMovies : $movies;
?>

<div class="row">
    <?php 
    $counter = 0;
    foreach ($moviesToDisplay as $movie): 
        // Start a new row after every third card
        if ($counter % 3 == 0 && $counter != 0): ?>
            </div>
            <div class="row mt-4"> <!-- Add margin-top for spacing -->
        <?php endif; ?>
        
        <div class="col-md-4 mb-4" id="<?php echo $movie['id']; ?>">
            <div class="card h-100">
            <?php echo '<img src="' . htmlspecialchars($movie['posterUrl']) . '" class="card-img-top" alt="' . htmlspecialchars($movie['title']) . '">';?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                    <p class="card-text">
                        <?php 
                        $plot = $movie['plot'];
                        if (strlen($plot) > 100) {
                            echo htmlspecialchars(substr($plot, 0, 100) . "..."); 
                        } else {
                            echo htmlspecialchars($plot); 
                        }
                        ?>
                    </p>
                    <a href="movie.php?movie_id=<?php echo $movie['id']; ?>" class="btn btn-outline-dark" style="font-weight: bold;">Read More</a>
                </div>
            </div>
        </div>
    
    <?php 
    $counter++;
    endforeach; 
    ?>
</div>

<!-- Go back to the top button -->
<div class="text-center mt-4">
    <a href="#top" class="btn btn-outline-dark">▲</a>
</div>



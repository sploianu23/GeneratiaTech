
<?php foreach ($movies as $movie): ?>
            <div class="col" id= <?php echo $movie['id'] ?>>
                <div class="card">
                    <img src="<?php echo $movie['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($movie['description']."..."); ?></p>
                        <a href="<?php echo $movie['link']; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            
        <?php endforeach; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ploianu Stefan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- Content goes here -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include("includes/header.php") ?>
      <div class="container">
      <h2>Avengers: Age of Ultron
    <?php if(check_old_movies(2015) !== FALSE): ?>
        <span class="badge bg-secondary">Old Movie: <?php echo check_old_movies(2015)?> years</span>
    <?php endif; ?>
    </h2>
        
          <div class="row">
            <div class="col-3">
              <img src="https://resizing.flixster.com/OD7TJsjRK-ad5eEMZq37OBaXguE=/206x305/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p10745606_p_v13_bh.jpg" class="img-fluid rounded float-start" alt="">
            </div>
            <div class="col-9">
             <p>Released May 1, 2015, <?php echo runtime_prettier(141) ?></p>
             <p>When Tony Stark (Robert Downey Jr.) jump-starts a dormant peacekeeping program, things go terribly awry, forcing him, Thor (Chris Hemsworth), the Incredible Hulk (Mark Ruffalo) and the rest of the Avengers to reassemble. As the fate of Earth hangs in the balance, the team is put to the ultimate test as they battle Ultron, a technological terror hell-bent on human extinction. Along the way, they encounter two mysterious and powerful newcomers, Pietro and Wanda Maximoff.
            </p>
            <ul>
              <li><h6>Cast:</h6></li>
              <li>Robert Downey Jr.</li>
              <li>Chris Evans</li>
              <li>Mark Ruffalo</li>
              <li>Chris Hemsworth</li>
              <li>...</li>
            </ul>
            <ul>
              <li><h6>Crew:</h6></li>
              <li>Anthony Russo</li>
              <li>Joe Russo</li>
              <li>...</li>
            </ul>
            </div>
          </div>
        </div>
      
      <?php include("includes/footer.php") ?>
</body>
</html>

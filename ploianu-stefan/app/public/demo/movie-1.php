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
        
      <h2>Avengers: Endgame 
    <?php if(check_old_movies(2019) !== FALSE): ?>
        <span class="badge bg-secondary">Old Movie: <?php echo check_old_movies(2019)?> years</span>
    <?php endif; ?>
    </h2>
        <div class="row">
          <div class="col-3">
            <img src="https://resizing.flixster.com/2yTtbYaljlzWgEhOCUTrH55jjfM=/206x305/v2/https://resizing.flixster.com/fC7nU6iTRQk02tS0SDS1ylx-G34=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2QxZjE5ZDgzLTRiY2MtNDFkYS04NWQ4LTRkYzc1ZTAwNWE2NC53ZWJw" class="img-fluid rounded float-start" alt="">
          </div>
          <div class="col-9">
           <p>Released Apr 26, 2019, <?php echo runtime_prettier(181) ?></p>
           <p>Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.</p>
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

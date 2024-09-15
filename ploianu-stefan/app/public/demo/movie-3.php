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
      <h2>Spider-man: No Way Home
    <?php if(check_old_movies(2019) !== FALSE): ?>
        <span class="badge bg-secondary">Old Movie: <?php echo check_old_movies(2019)?> years</span>
    <?php endif; ?>
    </h2>
        
          <div class="row">
            <div class="col-3">
              <img src="https://resizing.flixster.com/wouDuoTzmfpwzvVDiTldrBHkbTo=/206x305/v2/https://resizing.flixster.com/8PNiwC2bpe9OecfYZSOVkvYC5vk=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2U5NGM0Y2Q1LTAyYTItNGFjNC1hNWZhLWMzYjJjOTdjMTFhOS5qcGc=" class="img-fluid rounded float-start" alt="">
            </div>
            <div class="col-9">
             <p>Released Apr 26, 2019, <?php echo runtime_prettier(181) ?></p>
             <p>For the first time in the cinematic history of Spider-Man, our friendly neighborhood hero's identity is revealed, bringing his Super Hero responsibilities into conflict with his normal life and putting those he cares about most at risk. When he enlists Doctor Strange's help to restore his secret, the spell tears a hole in their world, releasing the most powerful villains who've ever fought a Spider-Man in any universe. Now, Peter will have to overcome his greatest challenge yet, which will not only forever alter his own future but the future of the Multiverse.</p>
            <ul>
              <li><h6>Cast:</h6></li>
              <li>Tom Holland</li>
              <li>Zendaya</li>
              <li>Benedict Cumberbatch</li>
              <li>Tobey Maguire</li>
              <li>Andrew Garfield</li>
              <li>...</li>
            </ul>
            <ul>
              <li><h6>Crew:</h6></li>
              <li>Jon Watts</li>
              
            </ul>
            </div>
          </div>
        </div>
      
      <?php include("includes/footer.php") ?>
</body>
</html>

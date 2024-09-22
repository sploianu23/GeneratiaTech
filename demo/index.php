<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> <!-- Custom styles if any -->
    <style>
        .dynamic-time {
            font-size: 2rem; /* Increase font size */
            color: black; 
            animation: pulse 1.5s infinite; /* Pulsing effect */
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require_once("includes/header.php"); ?>

    <div class="container flex-grow-1 d-flex justify-content-center align-items-center">
        <h4 class="dynamic-time text-center"><?php echo current_time(); ?></h4>
    </div>

    <div class="mt-auto text-center mb-4">
        <p>
            <a href="movies.php" class="btn btn-primary btn-lg">All Movies</a>
        </p>
    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

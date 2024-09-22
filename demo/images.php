<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> <!-- Custom styles if any -->
    
</head>
<body style='color:white'>
    <div class='content'>
<?php 
require_once("includes/header.php");
$images = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];





$validImages = [];
$invalidImages = [];

foreach ($images as $movie) {
    // Check if the image is valid
    if (getimagesize($movie['posterUrl'])) {
        $validImages[] = $movie['posterUrl']; // Add to valid images if no error
    } else {
        $invalidImages[] = $movie['title']; // Add to invalid images if there's an error
    }
}

// Output results


if (!empty($invalidImages)) {
    echo "Invalid Images:<br>";
    foreach ($invalidImages as $invalidImage) {
        echo "Error loading image: $invalidImage<br>";
    }
}
?>
</div>
</body>
</html>
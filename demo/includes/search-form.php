<?php
    // Variable to store any validation error message
    $error = '';
    $destination = htmlspecialchars($_SERVER['PHP_SELF']);
    $searchInput = '';
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['s'])) {
        $searchInput = trim($_GET['s']); // Remove extra spaces

        // Validate the length of the search input
        if (strlen($searchInput) < 4) {
            $error = "Please enter more than 3 characters for a search.";
            
        } else{
            $destination = 'search-results.php';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <form action="<?php echo $destination ?>" method='get' class="d-flex form-inline my-2 my-lg-0" role="search">
        <input 
            name='s' 
            class="form-control me-2" 
            type="search" 
            placeholder="Search" 
            aria-label="Search" 
            value="<?php echo isset($_GET['s']) ? htmlspecialchars($_GET['s']) : ''; ?>"
        >
        <button class="btn btn-outline-dark" type="submit" aria-label="Submit Search"><strong>Search</strong></button>
    </form>

    <?php
    // Display the error message if the input is less than 4 characters
    if (!empty($error)) {
        echo "<div class='alert alert-danger mt-3'>$error</div>";
    }
    ?>

</body>
</html>

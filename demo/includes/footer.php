<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS -->
    <title>Your Website</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Main content here -->
    <main class="flex-grow-1">
        <!-- Your main content goes here -->
    </main>

    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <div class="mb-2">
                <?php echo Logo; ?>
            </div>
            <p class="mb-2">&copy; <?php echo date("Y"); ?>. Copyright, toate drepturile rezervate.</p>
            <div>
                <a href="#" class="text-light me-3">Privacy Policy</a>
                <a href="#" class="text-light">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>

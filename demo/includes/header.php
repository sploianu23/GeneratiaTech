
<?php
$currentFile = basename($_SERVER['PHP_SELF']);
define("Logo", '<img src="assets/logo.png" alt="Your Logo" class="img-fluid" style="max-width: 50px; height: auto;">');



include('functions.php');
if($currentFile !== "index.php" && $currentFile!=="contact.php")
{$movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies']; }




$menuItems = [
    ['name' => 'Home', 'link' => 'index.php', 'active' => true],
    ['name' => 'Movies', 'link' => 'movies.php', 'active' => false],
    ['name' => 'Contact', 'link' => 'contact.php', 'active' => false],
    ['name' => 'Genres', 'link' => 'genres.php', 'active' => false],
    ['name' => 'Favorites', 'link' => 'movies.php?page=favorites', 'active' => false],
];

?>


<nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(255, 255, 255, 0.7);">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><?php echo Logo; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($menuItems as $menuItem) {
                    $activeClass = ($currentFile === $menuItem['link']) ? 'active' : '';
                    echo '<li class="nav-item">';
                    echo '<strong><a class="nav-link ' . $activeClass . '" href="' . $menuItem['link'] . '">' . $menuItem['name'] . '</a></strong>';
                    echo '</li>';
                }
                ?>
            </ul>
            <?php require_once("search-form.php") ?>
        </div>
    </div>
</nav>







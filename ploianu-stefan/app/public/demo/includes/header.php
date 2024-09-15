
<?php
$currentFile = basename($_SERVER['PHP_SELF']);
define("Logo", "PS");
include('functions.php');
if($currentFile !== "index.php" && $currentFile!=="contact.php")
{$movies = [
    [
        'id' => '0',
        'title' => 'Avengers: Endgame',
        'description' => 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle',
        'image' => 'https://resizing.flixster.com/2yTtbYaljlzWgEhOCUTrH55jjfM=/206x305/v2/https://resizing.flixster.com/fC7nU6iTRQk02tS0SDS1ylx-G34=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2QxZjE5ZDgzLTRiY2MtNDFkYS04NWQ4LTRkYzc1ZTAwNWE2NC53ZWJw',
        'link' => 'movie-1.php'
    ],
    [
        'id' => '1',
        'title' => 'Avengers: Age of Ultron',
        'description' => 'When Tony Stark (Robert Downey Jr.) jump-starts a dormant peacekeeping program, things go terribly awry, forcing him, Thor (Chris Hemsworth), the Incredible Hulk (Mark Ruffalo) and the rest of the Avengers to reassemble',
        'image' => 'https://resizing.flixster.com/OD7TJsjRK-ad5eEMZq37OBaXguE=/206x305/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p10745606_p_v13_bh.jpg',
        'link' => 'movie-2.php'
    ],
    [
        'id' => '2',
        'title' => 'Spider-Man: No Way Home',
        'description' => 'For the first time in the cinematic history of Spider-Man, our friendly neighborhood hero\'s identity is revealed',
        'image' => 'https://resizing.flixster.com/wouDuoTzmfpwzvVDiTldrBHkbTo=/206x305/v2/https://resizing.flixster.com/8PNiwC2bpe9OecfYZSOVkvYC5vk=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2U5NGM0Y2Q1LTAyYTItNGFjNC1hNWZhLWMzYjJjOTdjMTFhOS5qcGc=',
        'link' => 'movie-3.php'
    ],
];}




$menuItems = [
    ['name' => 'Home', 'link' => 'index.php', 'active' => true],
    ['name' => 'Movies', 'link' => 'movies.php', 'active' => false],
    ['name' => 'Contact', 'link' => 'contact.php', 'active' => false],
];

?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                
                foreach ($menuItems as $menuItem) {
                    
                    $activeClass = ($currentFile === $menuItem['link']) ? 'active' : '';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link ' . $activeClass . '" href="' . $menuItem['link'] . '">' . $menuItem['name'] . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
            <?php include("search-form.php") ?>
        </div>
    </div>
</nav>





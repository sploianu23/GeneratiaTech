<?php

function runtime_prettier($movie_length)
{
    $hours = floor($movie_length/60);
    $minutes = $movie_length%60;
    if($minutes != 1)
    return "{$hours} hours and {$minutes} minutes";
    else
    return "{$hours} hours and {$minutes} minute";
}

function check_old_movies($release_year)
{
    $current_year = date("Y");
    if($current_year-$release_year>40)
    return $current_year-$release_year;
    else 
    return false;
}

function current_time()
{
    date_default_timezone_set('Europe/Bucharest');
    $currentTime = date('H');
    if ($currentTime>=5 && $currentTime<12)
    {
        return "Good Morning";
    
    }elseif($currentTime >= 12 && $currentTime < 17) {
        return "Good Afternoon";
    } elseif ($currentTime >= 17 && $currentTime < 21) {
        return "Good Evening";
    } else {
        return "Good Night";
    }
}

function read_favorites_count() {
    $file_path = 'assets/movie-favorites.json';
    
    // Check if the file exists
    if (file_exists($file_path)) {
        // Read the file content
        $data = file_get_contents($file_path);
        return json_decode($data, true) ?: [];
    } else {
        // Create the file with an empty array if it doesn't exist
        file_put_contents($file_path, json_encode([]));
        return [];
    }
}

function save_favorites_count($favorites_count) {
    $file_path = 'assets/movie-favorites.json';
    file_put_contents($file_path, json_encode($favorites_count));
}

function check_poster($img_link){
    

if (@getimagesize($img_link)) {
        return $img_link;
        exit();
    } else {
        return "assets/images/placeholder.jpg";
    }
}
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


    

    function image_exists($url) {
        // Initialize a cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true); // Exclude the body of the response
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Set a timeout to avoid long waits
        curl_exec($ch);
        
        // Get the HTTP status code
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Return true if the status code is 200 (OK)
        return $code == 200;
    }
    
    function check_poster($img_url) {
        // Check if the image exists using image_exists function
        if (image_exists($img_url)) {
            return $img_url;
        } else {
            // Return the path to the placeholder image if the URL does not exist
            return "assets/images/placeholder.jpg";
        }
    }
    
    function db_connect($host = "localhost", $username = "php-user", $password = "php-password", $dbname = "php-proiect"){
        return mysqli_connect($host, $username, $password, $dbname);
       }
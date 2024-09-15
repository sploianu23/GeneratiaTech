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
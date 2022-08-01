<?php

// As a: collector
// I want: to be able to see stored information about my collection
// So that: I can show off to my friends

// Requirements:

// Items must be tied to a theme
// Each item should have at least 3 stats about it
// Database structure signed off by trainer before continuing
// Information from database must be visually displayed with the stats of each item



//set up pdo
//want to pull all stats, name, artist, tracks, length
//

require_once 'functions.php';

$db = new PDO('mysql:host=db; dbname=album-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare("SELECT `name`, `artist`, `tracks`, `length` FROM `albums`;");
$query->execute();

$albums = $query->fetchAll();



?>

<html>
    <head>

    </head>

    <body>
        <h1>Album Collection</h1>
        <main>
            <?=displayAlbums($albums);?>
        </main>
    </body>
</html>
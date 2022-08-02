<?php

require_once 'functions.php';

$db = getDB();
$albums = fetchAlbums($db);

?>

<html>
    <head>
        <title>Album Collection</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
        <link <link rel="stylesheet" href="normalize.css">
        <link <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <header>
                <h1>Album Collection</h1>
        </header>
        <main>
            <?=displayAlbums($albums);?>
        </main>
    </body>
</html>
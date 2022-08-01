<?php

require_once 'functions.php';

$db = getDB();
$albums = fetchAlbums($db);

?>

<html>
    <head>
        <title>Album Collection</title>
    </head>

    <body>
        <h1>Album Collection</h1>
        <main>
            <?=displayAlbums($albums);?>
        </main>
    </body>
</html>
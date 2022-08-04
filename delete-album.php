<?php

require_once 'functions.php';

$db = getDB();
$albums = fetchAlbums($db);

if (isset($_POST['delete'])) {
    deleteAlbum($_POST['delete'], $db);
}

header('Location: index.php');

?>

<html>
    <head>
        <title>Add Album</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
        <link <link rel="stylesheet" href="normalize.css">
        <link <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    </body>
</html>
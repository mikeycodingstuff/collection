<?php

require_once 'functions.php';

$db = getDB();
$albums = fetchAlbums($db);
$error = message();

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
        <section>
            <form action="create-album.php" method="POST">
                <div>
                    <p>Add a New Album</p>
                </div>
                <div class="error">
                    <?= $error ?>
                </div>
                <div>
                    <label for="name">Album name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="artist">Artist name:</label>
                    <input type="text" id="artist" name="artist">
                </div>
                <div>
                    <label for="tracks">Number of Tracks:</label>
                    <input type="text" id="tracks" name="tracks">
                </div>
                <div>
                    <label for="length">Album Length:</label>
                    <input type="text" id="length" name="length" title="mm:ss">
                </div>
                <div>
                    <input class="submit-button" type="submit" value="Submit">
                </div>
            </form>
        </section>
        <main>
            <?=displayAlbums($albums);?>
        </main>
    </body>
</html>
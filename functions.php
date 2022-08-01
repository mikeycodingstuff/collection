<?php

function displayAlbums(array $albums) {
    foreach ($albums as $album){
        echo '<div><p><h2>Album Title: </h2>' . $album['name'] . '</p>';
        echo '<p><h3>Artist: </h3>' . $album['artist'] . '</p>';
        echo '<p><h3>Number of Tracks: </h3>' . $album['tracks'] . '</p>';
        echo '<p><h3>Album Length: </h3>' . $album['length'] . '</p></div>';
    }
}

?>
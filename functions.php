<?php

function displayAlbums(array $albums) {
    $output = '';
    foreach ($albums as $album){
        if ($album === []) {
            return 'missing data';
        } else {
            $output .= '<div><p><h2>Album Title: </h2>' . $album['name'] . '</p><p><h3>Artist: </h3>' . $album['artist'] .
            '</p><p><h3>Number of Tracks: </h3>' . $album['tracks'] . '</p><p><h3>Album Length: </h3>' . $album['length'] . '</p></div>';
        }
    } return $output;
}

?>
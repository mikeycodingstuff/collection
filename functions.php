<?php
/**
 * Gets the db and sets fetch mode to assoc
 *
 * @return PDO the database of albums
 */
function getDB(): PDO {
    $db = new PDO('mysql:host=db; dbname=album-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db; 
}
/**
 * Query to fetch all the albums/data from the db
 *
 * @param PDO $db the db set with getDB
 * @return array multidimensional array of albums
 */
function fetchAlbums(PDO $db): array {
    $query = $db->prepare("SELECT `name`, `artist`, `tracks`, `length` FROM `albums`;");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Outputs album data for each album with html formatting
 *
 * @param array $albums array of album arrays fetched from the db
 * @return string html formatting of data in each album array
 */
function displayAlbums(array $albums):string {
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
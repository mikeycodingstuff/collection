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
            $output .= '<div class="album-container"><h2>Album Title:</h2><h3>' . $album['name'] . '</h3><div><div><h4>Artist:</h4><p>' . $album['artist'] .
            '</p></div><div><h4>Number of Tracks:</h4><p>' . $album['tracks'] . '</p></div><div><h4>Album Length:</h4><p>' . $album['length'] . '</p></div></div></div>';
        }
    } return $output;
}

?>
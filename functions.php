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
            $output .= '<div class="album-container"><h3>' . $album['name'] . '</h3><div><div><h4>Artist:</h4><p>' . $album['artist'] .
            '</p></div><div><h4>Number of Tracks:</h4><p>' . $album['tracks'] . '</p></div><div><h4>Album Length:</h4><p>' . $album['length'] . '</p></div></div></div>';
        }
    } return $output;
}

/**
 * Checks if inputs for the form are all set
 *
 * @param array $postData $_POST data array
 * @return boolean true if all inputs have been entered
 */
function checkFormIsset(array $postData): bool {
    if (isset($postData['name']) && isset($postData['artist']) && isset($postData['tracks']) && isset($postData['length'])
    && (trim($postData['name']) != '') && (trim($postData['artist']) != '') && (trim($postData['tracks']) != '') && (trim($postData['length']) != '')){
        return true;
    } else {
        return false;
    }
}

/**
 * Sanitises inputs and creates an array from the post data
 *
 * @param string $postName the post data for name
 * @param string $postArtist the post data for artist
 * @param integer $postTracks the post data for tracks
 * @param string $postLength the post data for length
 * @return array an assoc array containing all the data for the album
 */
function sanitiseAndCreateArray(string $postName, string $postArtist, int $postTracks, string $postLength ): array {
    $album = ['name' => '', 'artist' => '', 'tracks' => '', 'length' => ''];
    $name = filter_var($postName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $artist = filter_var($postArtist, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tracks = filter_var($postTracks, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $length = filter_var($postLength, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $album['name'] = $name;
    $album['artist'] = $artist;
    $album['tracks'] = $tracks;
    $album['length'] = $length;
    return $album;
}

/**
 * validates the inputs so that they must fit the requirements of the db table
 *
 * @param array $album album array created from post data previously
 * @return boolean true if it is valid
 */
function validateInputs(array $album): bool {
    if ((strlen($album['name']) <= 1000) && (strlen($album['artist']) <= 1000) && ($album['tracks'] <= 100) && (strlen($album['length']) <= 15)){
        $pattern = '/^[0-9]+:[0-5]{1}[0-9]{1}$/';
        if (preg_match($pattern, $album['length'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * adds an album to the database
 *
 * @param array $album array of data for the album you want to add
 * @param object $db database you want to add to
 * @return void function executes the db query
 */
function addToDb(array $album, object $db) {
    $query = $db->prepare("INSERT INTO `albums` (`name`, `artist`, `tracks`, `length`) VALUES (:name, :artist, :tracks, :length);");
    $query->bindParam(':name', $album['name']);
    $query->bindParam(':artist', $album['artist']);
    $query->bindParam(':tracks', $album['tracks']);
    $query->bindParam(':length', $album['length']);
    $query->execute();
}

?>
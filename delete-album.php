<?php

require_once 'functions.php';

$db = getDB();
$albums = fetchAlbums($db);

if (isset($_POST['delete'])) {
    deleteAlbum($_POST['delete'], $db);
}

header('Location: index.php');

?>
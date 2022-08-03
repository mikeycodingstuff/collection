<?php

require_once 'functions.php';

$db = getDB();

if (checkFormIsset($_POST)){
    $album = sanitiseAndCreateArray($_POST['name'], $_POST['artist'], $_POST['tracks'], $_POST['length']);

    if (validateInputs($album)) {
        addToDb($album, $db);
        header('Refresh: 3; URL=index.php');
        echo 'album accepted!';
    } else {
        header('Refresh: 3; URL=index.php');
        echo 'Please use valid inputs';
    }
    
    echo '<pre>';
    var_dump($album);
    echo '</pre>';
} else {
    header('Refresh: 3; URL=index.php');
    echo 'Please fill in all sections';
}

// try {
//     $album = sanitiseAndCreateArray($_POST['name'], $_POST['artist'], $_POST['tracks'], $_POST['length']);
// } catch ($error) {
//     echo 'Please use valid inputs';
// }

?>
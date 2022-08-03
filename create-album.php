<?php

require_once 'functions.php';

$db = getDB();

if (checkFormIsset($_POST)){
    try {
        $album = sanitiseAndCreateArray($_POST['name'], $_POST['artist'], $_POST['tracks'], $_POST['length']);
    } catch (TypeError $error) {
        header('Refresh: 3; URL=index.php');
        echo 'Please use valid inputs';
    }
    // wrap this stuff in an inf that checks to see if $album isset
    if (isset($album)) {
        if (validateInputs($album)) {
            addToDb($album, $db);
            header('Refresh: 3; URL=index.php');
            echo 'Album successfully added to the collection';
        } else {
            header('Refresh: 3; URL=index.php');
            echo 'Please use valid inputs';
        }
    }
    
} else {
    header('Refresh: 3; URL=index.php');
    echo 'Please fill in all sections';
}

?>
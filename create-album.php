<?php

require_once 'functions.php';

$db = getDB();

if (checkFormIsset($_POST)){
    //catches type errors from $_POST
    try {
        $album = sanitiseAndCreateArray($_POST['name'], $_POST['artist'], $_POST['tracks'], $_POST['length']);
    } catch (TypeError $error) {
        header('Location: index.php?error= Please use valid inputs');
    }

    if (isset($album)) {
        if (validateInputs($album)) {
            $result = addToDb($album, $db);
            if ($result) {
                header('Location: index.php');
            } else {
                header('Location: index.php?error= Unexpected error');
            }
        } else {
            header('Location: index.php?error= Please use valid inputs');
        }
    }
    
} else {
    header('Location: index.php?error= Please fill in all sections');
}

?>
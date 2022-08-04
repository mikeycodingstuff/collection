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
                // header('Refresh: 3; URL=index.php');
                echo 'Album successfully added to the collection';
            } else {
                echo 'Unexpected error';
            }
        } else {
            header('Location: index.php?error= Please use valid inputs');
        }
    }
    
} else {
    header('Location: index.php?error= Please fill in all sections');
}



?>

<html>
    <head>
        <title>Add Album</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
        <link <link rel="stylesheet" href="normalize.css">
        <link <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    </body>
</html>
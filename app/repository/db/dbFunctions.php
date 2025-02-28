<?php
include_once ('config.php');

/**
 * Connection à la DB
 */
function connectToDB() {
    try {
        $dbLink = new PDO("mysql:host=".SERVER_ADRESS.";dbname=".DB_NAME, USER_NAME);
        $dbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        $dbLink = $ex->getMessage();
    }

    return $dbLink;
}

/**
 * Déconnection à la DB
 * @param $link: Le lien de la DB
*/
function disconnectToDB(&$link) {
    $link = null;
}

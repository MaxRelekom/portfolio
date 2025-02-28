<?php

include ('././config/config.php');

class DBConnection {

    public function connect2db(&$msg): PDO {
        try {
            $dbLink = new PDO("mysql:host=" . SERVER_ADRESS . ";dbname=" . DB_NAME);
            $dbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        }

        return $dbLink;
    }

    function disconnectToDB(&$link) {
        $link = null;
    }

}

<?php

function edit($id, $nom, $description, $estFini, &$msg) {
    $result = array();
    $dbConnection = null;

    try {
        $dbConnection = connectToDB();
        $result = $dbConnection->prepare("UPDATE projet SET nom = :nom, description = :description, estFini = :estFini WHERE idProjet = :id");

        $result->bindValue(":id", $id);
        $result->bindValue(":nom", $nom);
        $result->bindValue(":description", $description);
        $result->bindValue(":estFini", $estFini);

        if ($result->execute()) { $result = true; }
    } catch (PDOException $ex) {
        $msg .= $ex->getMessage();
    }

    disconnectToDB($dbConnection);
    return $result;
}

function delete($id, &$msg) {
    $result = array();
    $dbConnection = null;

    try {
        $dbConnection = connectToDB();
        $result = $dbConnection->prepare("DELETE FROM projet WHERE idProjet = :id");

        $result->bindValue(":id", $id);

        if ($result->execute()) { $result = true; }
    } catch (PDOException $ex) {
        $msg .= $ex->getMessage();
    }

    disconnectToDB($dbConnection);
    return $result;
}

?>

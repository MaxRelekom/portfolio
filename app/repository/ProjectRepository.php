<?php

include_once ('db/dbFunctions.php');

class ProjectRepository {

    /**
     * Stocke un projet
     */
    public function store(Project $project, &$msg) {
        $result = array();
        $dbConnection = null;

        try {
            $dbConnection = connectToDB();
            $result = $dbConnection->prepare("INSERT INTO projet (nom, lien, descriptionCourte, description) VALUES (:nom, :lien, :descriptionCourte, :description)");

            $result->bindValue(":nom", $project->getNom());
            $result->bindValue(":lien", $project->getLien());
            $result->bindValue(":descriptionCourte", $project->getDescriptionCourte());
            $result->bindValue(":description", $project->getDescription());

            if ($result->execute()) {
                $result = $result->fetchAll(PDO::FETCH_OBJ);
                $msg = 'Création du projet réussie';
            }
        } catch (PDOException $ex) {
            $msg .= $ex->getMessage();
        }

        disconnectToDB($dbConnection);
        return $result;
    }

    public function getProjects(&$msg) {
        $result = array();
        $dbConnection = null;

        try {
            $dbConnection = connectToDB();
            $result = $dbConnection->prepare("SELECT * FROM projet");

            if ($result->execute()){
                $result = $result->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $ex) {
            $msg .= $ex->getMessage();
        }

        disconnectToDB($dbConnection);
        return $result;
    }
}

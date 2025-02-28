<?php

class Project {

    private string $nom;
    private string $lien;
    private string $descriptionCourte;
    private string $description;

    public function __construct(string $nom, string $lien, string $descriptionCourte, string $description){
        $this->nom = $nom;
        $this->lien = $lien;
        $this->descriptionCourte = $descriptionCourte;
        $this->description = $description;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getLien(): string {
        return $this->lien;
    }

    public function getDescriptionCourte(): string {
        return $this->descriptionCourte;
    }

    public function getDescription(): string {
        return $this->description;
    }

}

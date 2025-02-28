<?php

include_once ('app/repository/ProjectRepository.php');
include_once ('app/entities/Project.php');

$msg = "";

if (isset($_POST['validerAjoutProjet']) && !empty($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $lien = htmlspecialchars($_POST['lien']);
    $descriptionCourte = htmlspecialchars($_POST['description-courte']);
    $description = htmlspecialchars($_POST['description-complete']);

    $projectRepository = new ProjectRepository();

    $projectToStore = new Project($nom, $lien, $descriptionCourte, $description);
    $storeSuccess = $projectRepository->store($projectToStore, $msg);
}
?>

<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "utf-8">
    <title>Portfolio</title>
    <link rel = "stylesheet" type = "text/css" href = "css/styles.css">
</head>
<body>
    <header>
        <h1>Ajout d'un projet</h1>

        <nav class="flex-row">
            <a href="index.php">Home</a>
        </nav>
    </header>

    <main>
        <form action = "ajoutProjet.php" method = "post" class="flex-col add-project">
            <label for="nom">Nom<input type = "text" name = "nom"></label>
            <label for="lien">Lien<input type = "text" name = "lien"></label>
            <label for="description-courte">Description courte<textarea name="description-courte"></textarea></label>
            <label for="description-complete">Description complète<textarea name="description-complete"></textarea></label>
            <!-- <label for="image">Image<input type="file" accept=".jpg,.png" name="img"></label> !-->

            <button id = "validerAjoutProjet" type = "submit" name = "validerAjoutProjet">Ajouter projet</button>
        </form

        <div>
            <p><?php echo $msg;?></p>
        </div>
    </main>
</body>
</html>

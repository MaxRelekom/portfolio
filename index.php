<?php
include_once ('app/repository/ProjectRepository.php');
include_once ('app/entities/Project.php');

$msg = "";

$projectRepository = new ProjectRepository();
$projects = $projectRepository->getProjects($msg);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="app/CV.js" async></script>
    <title>Portfolio</title>
</head>
<body>
    <header>
        <nav class="flex-row">
            <a href="#profil-section"><p>Mon profil<p></a>
            <a href="#finished-projects"><p>Mes projets finis<p></a>
        </nav>
    </header>

    <main>
        <section class="profil-section flex-row" id="profil-section">
            <div>
                <img src="files/Photo.png" alt="Profil">
                <h1>Max Relekom, 23 ans</h1>
            </div>

            <div class="CV-div">
                <button id="showCv" name="showCv">Ouvrir mon CV</button>
            </div>
        </section>

        <!--
        <section class="knowledges">
            <h2>Mes compétences</h2>
        </section>
        !-->

        <section class="finished-projects-section" id="finished-projects">
            <h2>Projet finis</h2>

            <section class="finished-projects">
                <?php
                    foreach ($projects as $project) {
                        ?>
                <section class="finished-project">
                    <?php
                        echo "<h3>".$project['nom']."<h4>";
                        echo "<a href=\"".$project['lien']."\" target=\"_blank\">".$project['lien']."</a>";
                        echo "<p>".$project['descriptionCourte']."<p>";
                    ?>
                </section>
                <?php
                    }
                ?>
            </section>
        </section>
    </main>
</body>
</html>

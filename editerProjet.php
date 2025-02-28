<?php
include ("app/functions/functions.php");

$msg = "";
$projet = "";

if (isset($_GET['gid'])) {
    $projet = getProjectBy($_GET['gid'], $msg);
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

	<main>
		<h1>Edition du projet</h1>
        <a href = "index.php">Home</a>

        <section>
            <form action = "<?php echo "editerProjet.php?gid=".$_GET['gid']; ?>" method = "POST">
            <label for = "nomProjet">Nom projet</label><input id = "nomProjet" type = "text" name = "nomProjet" value = "<?php echo isset($_POST['nomProjet']) ? $_POST['nomProjet'] : $projet['nom']; ?>" required>
            <label for = "descriptionProjet">Description</label><input id = "descriptionProjet" type = "text" name = "descriptionProjet" value = "<?php echo isset($_POST['descriptionProjet']) ? $_POST['descriptionProjet'] : $projet['description']; ?>" required>
            <label for = "estFini">Statut</label><input id = "estFini" type = "text" name = "estFini" value = "<?php echo isset($_POST['estFini']) ? $_POST['estFini'] : $projet['estFini']; ?>" required>
            
            <button id = "valider" type = "submit" name = "valider">Valider</button>
                <?php
                $nom = isset($_POST['nomProjet']) ? $_POST['nomProjet'] : $projet['nom'];
                $description = isset($_POST['descriptionProjet']) ? $_POST['descriptionProjet'] : $projet['description'];
                $estFini = isset($_POST['estFini']) ? $_POST['estFini'] : $projet['estFini'];
                
                edit($_GET['gid'], $nom, $description, $estFini, $msg);
                ?>
            </form>
        </section>
    </main>

    </body>
</html>

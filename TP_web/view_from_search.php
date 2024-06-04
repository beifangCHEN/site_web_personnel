<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' -->

<h1>Recherche de Master par région</h1> <!-- Titre principal de la page -->

<!-- Formulaire pour la recherche de Masters par région -->
<form action="view_list_model.php" method="post">
    <label for="choix_region">Région :</label> <!-- Étiquette pour le menu déroulant des régions -->
    <select name="choix_region" id="choix_region"> <!-- Menu déroulant pour sélectionner une région -->
        <?php
        require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model

        $model = Model::getModel(); // Obtention d'une instance du modèle
        $regions = $model->getRegion(); // Appel de la méthode pour obtenir la liste des régions

        // Boucle pour afficher chaque région dans le menu déroulant
        foreach ($regions as $region) {
            echo "<option value='{$region['id_region']}'>{$region['region']}</option>"; // Option pour chaque région
        }
        ?>
    </select>
    <br>
    <br>
    <button type="submit">Rechercher</button> <!-- Bouton pour soumettre le formulaire -->
</form>

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' -->

<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' -->

<h1>Liste des Masters en Île de France</h1> <!-- Titre principal de la page -->

<table border="1"> <!-- Début du tableau avec bordure -->
    <tr>
        <th>Établissement</th> <!-- En-tête de colonne pour l'établissement -->
        <th>Libellé Diplômes</th> <!-- En-tête de colonne pour le libellé du diplôme -->
        <th>Commune</th> <!-- En-tête de colonne pour la commune -->
    </tr>

    <?php
    require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model

    $model = Model::getModel(); // Obtention d'une instance du modèle
    $idf_masters = $model->getIdf(); // Appel de la méthode pour obtenir les Masters en Île de France

    // Boucle pour afficher chaque Master trouvé
    foreach ($idf_masters as $master) {
        echo "<tr>"; // Début d'une ligne de la table
        echo "<td>{$master['etablissement']}</td>"; // Affichage de l'établissement
        echo "<td>{$master['libelle_diplome']}</td>"; // Affichage du libellé du diplôme
        echo "<td>{$master['commune']}</td>"; // Affichage de la commune
        echo "</tr>"; // Fin de la ligne de la table
    }
    ?>
</table> <!-- Fin du tableau -->

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' -->

<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' -->

<h1>Liste des Masters en Ile de france</h1> <!-- Titre principal de la page -->

<?php
require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model

// Vérification si la variable POST 'choix_region' est définie
if (isset($_POST['choix_region'])) {
    $region = $_POST['choix_region']; // Récupération de la valeur de 'choix_region'
    $model = Model::getModel(); // Obtention d'une instance du modèle
    $masters = $model->getMasterRegion($region); // Appel de la méthode pour obtenir les Masters de la région sélectionnée

    // Vérification si des Masters ont été trouvés
    if ($masters) {
        echo "<table border='1'>"; // Début de la table HTML avec bordure
        echo "<tr><th>Établissement</th><th>Libellé Diplômes</th><th>Commune</th></tr>"; // En-tête de la table

        // Boucle pour afficher chaque Master trouvé
        foreach ($masters as $master) {
            echo "<tr>"; // Début d'une ligne de la table
            echo "<td>{$master['etablissement']}</td>"; // Affichage de l'établissement
            echo "<td>{$master['libelle_diplome']}</td>"; // Affichage du libellé du diplôme
            echo "<td>{$master['commune']}</td>"; // Affichage de la commune
            echo "</tr>"; // Fin de la ligne de la table
        }
        echo "</table>"; // Fin de la table
    } else {
        echo "<p>Aucun Master trouvé dans cette région.</p>"; // Message si aucun Master n'a été trouvé
    }
} else {
    echo "<p>Aucune région sélectionnée.</p>"; // Message si aucune région n'a été sélectionnée
}
?>

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' -->

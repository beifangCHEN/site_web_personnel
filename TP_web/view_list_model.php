<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' 引入 'begin.html' 文件-->

<h1>Liste des Masters en Ile de france</h1> <!-- Titre principal de la page 页面主标题：Île de France 的硕士课程列表-->

<?php
require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model 引入 'Model.php' 文件

// Vérification si la variable POST 'choix_region' est définie 检查是否已选择地区
if (isset($_POST['choix_region'])) {
    $region = $_POST['choix_region']; // Récupération de la valeur de 'choix_region' 获取选择的地区
    $model = Model::getModel(); // Obtention d'une instance du modèle 获取 Model 类的实例
    $masters = $model->getMasterRegion($region); // Appel de la méthode pour obtenir les Masters de la région sélectionnée 获取该地区的硕士课程信息

    // Vérification si des Masters ont été trouvés 检查是否找到硕士课程
    if ($masters) {
        echo "<table border='1'>"; // Début de la table HTML avec bordure 创建带边框的表格
        echo "<tr><th>Établissement</th><th>Libellé Diplômes</th><th>Commune</th></tr>"; // En-tête de la table表格标题行

        // Boucle pour afficher chaque Master trouvé 循环显示每个硕士课程的信息
        foreach ($masters as $master) {
            echo "<tr>"; // Début d'une ligne de la table 表格行开始
            echo "<td>{$master['etablissement']}</td>"; // Affichage de l'établissement 显示院校名称
            echo "<td>{$master['libelle_diplome']}</td>"; // Affichage du libellé du diplôme 显示文凭名称
            echo "<td>{$master['commune']}</td>"; // Affichage de la commune 显示市镇名称
            echo "</tr>"; // Fin de la ligne de la table 表格行结束
        }
        echo "</table>"; // Fin de la table 表格结束
    } else {
        echo "<p>Aucun Master trouvé dans cette région.</p>"; // Message si aucun Master n'a été trouvé 如果未找到硕士课程，则显示消息
    }
} else {
    echo "<p>Aucune région sélectionnée.</p>"; // Message si aucune région n'a été sélectionnée 如果未选择任何地区，则显示消息
}
?>

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' 引入 'end.html' 文件-->

<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' 引入 'begin.html' 文件-->

<h1>Liste des Masters en Île de France</h1> <!-- Titre principal de la page 页面主标题：Île de France 的硕士课程列表-->

<table border="1"> <!-- Début du tableau avec bordure 带边框的表格开始-->
    <tr>
        <th>Établissement</th> <!-- En-tête de colonne pour l'établissement 表头：院校-->
        <th>Libellé Diplômes</th> <!-- En-tête de colonne pour le libellé du diplôme 表头：文凭名称-->
        <th>Commune</th> <!-- En-tête de colonne pour la commune 表头：市镇-->
    </tr>

    <?php
    require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model 引入 'Model.php' 文件

    $model = Model::getModel(); // Obtention d'une instance du modèle 获取 Model 类的实例
    $idf_masters = $model->getIdf(); // Appel de la méthode pour obtenir les Masters en Île de France 获取 Île de France 地区的硕士课程信息

    // Boucle pour afficher chaque Master trouvé 循环显示每个硕士课程的信息
    foreach ($idf_masters as $master) {
        echo "<tr>"; // Début d'une ligne de la table 表格行开始
        echo "<td>{$master['etablissement']}</td>"; // Affichage de l'établissement 显示院校名称
        echo "<td>{$master['libelle_diplome']}</td>"; // Affichage du libellé du diplôme 显示文凭名称
        echo "<td>{$master['commune']}</td>"; // Affichage de la commune 显示市镇名称
        echo "</tr>"; // Fin de la ligne de la table 表格行结束
    }
    ?>
</table> <!-- Fin du tableau 表格结束-->

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' 引入 'end.html' 文件-->

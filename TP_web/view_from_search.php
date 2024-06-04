<?php require "begin.html"; ?> <!-- Inclusion du fichier HTML 'begin.html' 引入 'begin.html' 文件-->

<h1>Recherche de Master par région</h1> <!-- Titre principal de la page 页面主标题：按地区搜索硕士-->

<!-- Formulaire pour la recherche de Masters par région 搜索表单，用于按地区搜索硕士-->
<form action="view_list_model.php" method="post"> <!-- 表单提交到 'view_list_model.php'，使用 POST 方法 -->
    <label for="choix_region">Région :</label> <!-- Étiquette pour le menu déroulant des régions 下拉菜单的标签 -->
    <select name="choix_region" id="choix_region"> <!-- Menu déroulant pour sélectionner une région 下拉菜单，用于选择地区-->
        <?php
        require_once "Model.php"; // Inclusion du fichier 'Model.php' qui contient la classe Model 引入 'Model.php' 文件

        $model = Model::getModel(); // Obtention d'une instance du modèle 获取 Model 类的实例
        $regions = $model->getRegion(); // Appel de la méthode pour obtenir la liste des régions 获取所有地区的信息

        // Boucle pour afficher chaque région dans le menu déroulant 循环显示每个地区的选项
        foreach ($regions as $region) {
            echo "<option value='{$region['id_region']}'>{$region['region']}</option>"; // Option pour chaque région 显示地区选项
        }
        ?>
    </select>
    <br>
    <br>
    <button type="submit">Rechercher</button> <!-- Bouton pour soumettre le formulaire 提交按钮-->
</form>

<?php require "end.html"; ?> <!-- Inclusion du fichier HTML 'end.html' 引入 'end.html' 文件-->

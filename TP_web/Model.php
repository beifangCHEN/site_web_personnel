<?php

class Model
{
    private $bd; // Propriété pour la connexion à la base de données 数据库连接
    private static $instance = null; // Propriété pour l'instance unique de la classe 类的唯一实例

    // Constructeur privé pour implémenter le pattern Singleton // 构造函数为私有的，以实现单例模式
    private function __construct()
    {
        $dsn = "pgsql:host=aquabdd;dbname=etudiants"; // Chaîne de connexion pour la base de données 数据库连接字符串
        $user = "11925670"; // Nom d'utilisateur pour la base de données 数据库用户名
        $password = "0910055968V"; // Mot de passe pour la base de données 数据库密码

        try {
            $this->bd = new PDO($dsn, $user, $password); // Création de la connexion PDO 创建 PDO 连接
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuration des attributs PDO 设置 PDO 属性
            $this->bd->query("SET NAMES 'utf8'"); // Configuration de l'encodage des caractères 设置字符编码为 UTF-8
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage(); // Affichage de l'erreur en cas d'échec de connexion 连接错误时输出错误信息
            exit; // Arrêt du script en cas d'erreur 发生错误时退出脚本
        }
    }

    // Méthode pour obtenir l'instance unique de la classe (Singleton) 获取类的唯一实例（单例模式）
    public static function getModel()
    {
        if (self::$instance === null) { // Si l'instance n'existe pas encore 如果实例不存在
            self::$instance = new self(); // Création de l'instance 创建新实例
        }
        return self::$instance; // Retour de l'instance unique 返回唯一实例
    }

    // Méthode pour obtenir les Masters d'une région spécifique 获取指定地区的硕士信息
    public function getMasterRegion($region)
    {
        $requete = $this->bd->prepare('SELECT * FROM masters WHERE id_region = :id_region'); // Préparation de la requête SQL 预处理 SQL 查询
        $requete->bindValue(':id_region', $region); // Association de la valeur de la région au paramètre de la requête  绑定地区参数
        $requete->execute(); // Exécution de la requête 执行查询
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif 返回查询结果，格式为关联数组
    }

    // Méthode pour obtenir la liste des régions disponibles 获取所有地区的信息
    public function getRegion()
    {
        $requete = $this->bd->prepare('SELECT DISTINCT id_region, region FROM masters'); // Préparation de la requête SQL pour les régions 预处理 SQL 查询以获取不同的地区
        $requete->execute(); // Exécution de la requête  执行查询
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif 返回查询结果，格式为关联数组
    }

    // Méthode pour obtenir les Masters en Île de France 获取 Île de France 地区的硕士信息
    public function getIdf()
    {
        $requete = $this->bd->prepare('SELECT * FROM masters WHERE id_region = \'R11\' ORDER BY commune'); // Préparation de la requête SQL pour Île de France 预处理 SQL 查询以获取 Île de France 地区的硕士信息，并按市镇排序
        $requete->execute(); // Exécution de la requête 执行查询
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif 返回查询结果，格式为关联数组
    }
}

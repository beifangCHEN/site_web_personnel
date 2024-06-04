<?php

class Model
{
    private $bd; // Propriété pour la connexion à la base de données
    private static $instance = null; // Propriété pour l'instance unique de la classe

    // Constructeur privé pour implémenter le pattern Singleton
    private function __construct()
    {
        $dsn = "pgsql:host=aquabdd;dbname=etudiants"; // Chaîne de connexion pour la base de données
        $user = "11925670"; // Nom d'utilisateur pour la base de données
        $password = "0910055968V"; // Mot de passe pour la base de données

        try {
            $this->bd = new PDO($dsn, $user, $password); // Création de la connexion PDO
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuration des attributs PDO
            $this->bd->query("SET NAMES 'utf8'"); // Configuration de l'encodage des caractères
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage(); // Affichage de l'erreur en cas d'échec de connexion
            exit; // Arrêt du script en cas d'erreur
        }
    }

    // Méthode pour obtenir l'instance unique de la classe (Singleton)
    public static function getModel()
    {
        if (self::$instance === null) { // Si l'instance n'existe pas encore
            self::$instance = new self(); // Création de l'instance
        }
        return self::$instance; // Retour de l'instance unique
    }

    // Méthode pour obtenir les Masters d'une région spécifique
    public function getMasterRegion($region)
    {
        $requete = $this->bd->prepare('SELECT * FROM masters WHERE id_region = :id_region'); // Préparation de la requête SQL
        $requete->bindValue(':id_region', $region); // Association de la valeur de la région au paramètre de la requête
        $requete->execute(); // Exécution de la requête
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif
    }

    // Méthode pour obtenir la liste des régions disponibles
    public function getRegion()
    {
        $requete = $this->bd->prepare('SELECT DISTINCT id_region, region FROM masters'); // Préparation de la requête SQL pour les régions
        $requete->execute(); // Exécution de la requête
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif
    }

    // Méthode pour obtenir les Masters en Île de France
    public function getIdf()
    {
        $requete = $this->bd->prepare('SELECT * FROM masters WHERE id_region = \'R11\' ORDER BY commune'); // Préparation de la requête SQL pour Île de France
        $requete->execute(); // Exécution de la requête
        return $requete->fetchAll(PDO::FETCH_ASSOC); // Retour des résultats sous forme de tableau associatif
    }
}

<?php 
// La fonction connexionBase() permet de ce connecter à notre base de données.
function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "localhost";
   $login= "root";     // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
   $base = "jarditou";    // La bdd avec laquelle vous voulez travailler 
 
   try 
   {
        $db = new PDO('mysql:host='.$host.';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    }  
}
$db = connexionBase();
?>


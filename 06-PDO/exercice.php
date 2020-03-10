
<h1>Les commerciaux et leur salaire</h1>

<?php
// Vous affichez dans une liste <ul><li> le prénom , le nom et le salaire des employés appartenant au service commercial (un <li> par commercial). Vous utilisez une requête préparée.
// Vous affichez le nombre de commerciaux.

// Fonction debug :
function debug($var) {
    echo '<pre>';
        print_r($var);
    echo '</pre>';
}

// Connexion à la BDD : 
$pdo = new PDO('mysql:host=localhost;dbname=entreprise',  // driver mysql (IBM, Oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
                'root',     // pseudo de la BDD
                '',         // mdp de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,          // pour afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   // pour définir le charset des échanges avec la BDD
                ));

$service = 'commercial';

$resultat = $pdo->prepare("SELECT nom, prenom, salaire FROM employes WHERE service = 'commercial'");

$resultat->bindParam(':service', $service); 

$resultat->execute(); 

debug($resultat);

echo '<ul>';
    while($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {  // On fait une boucle car il y a plusieurs commerciaux
    //debug($employe);
            echo '<li>' . $employe['nom'] . ' ' . $employe['prenom'] . ' gagne ' . $employe['salaire'] . '€</li>';
        }
echo '</ul>';

// Nombre de commerciaux : 

echo 'Nombre de commerciaux est de : ' . $resultat->rowCount();  // Permet de compter le nombre de lignes dans le jeu de résultat qui provient de la requête de sélection.



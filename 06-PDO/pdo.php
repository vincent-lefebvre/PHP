<?php
//---------------------------------------------------
//             PDO   (PHP DATA OBJECTS)
//---------------------------------------------------

// L'extension PDO pour PHP DATA OBJECTS définit une interface qui permet d'exécuter des requêtes SQL dans du PHP.

function debug($var) {
    echo '<pre>';
        print_r($var);
    echo '</pre>';
}

//---------------------------------------------------
echo '<h2> 01. Connexion à la BDD </h2>';
//---------------------------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=entreprise',  // driver mysql (IBM, Oracle, ODBC...), nom du serveur (host), nom de la BDD (dbname)
                'root',     // pseudo de la BDD
                '',         // mdp de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,          // pour afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   // pour définir le charset des échanges avec la BDD
                ));

// $pdo ci-dessus est un objet qui représente la connexion à la BDD entreprise.

debug(get_class_methods($pdo));     // permet d'afficher la liste des méthodes présentes dans l'objet $pdo.

//---------------------------------------------------
echo '<h2> 02. Faire des requêtes avec exec() </h2>';
//---------------------------------------------------
// On va insérer un employé en BDD :

$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('John','Doe','m','informatique','2020-03-09', 2000)");
/*

 La méthode exec() est utilisée pour faire des requêtes qui ne retournent pas de jeu de résultats : INSERT, UPDATE, DELETE.

 Valeur de retour :
    Succès : indique le nombre de lignes affectées par la requête
    Echec : false

*/

echo 'Nombre d\'enregistrements affectés par la requête : ' . $resultat . '<br>';

echo 'Dernier id généré en BDD : ' . $pdo->lastInsertId();

// Supprimer les John Doe de la BDD : 
$resultat = $pdo->exec("DELETE FROM employes WHERE prenom = 'John' AND nom = 'Doe'");

//-----------------------------------------------------
echo '<h2> 03. Faire des requêtes avec query() </h2>';
//-----------------------------------------------------

// On va sélectionner les informations de l'employé Daniel : 
$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'");

/*
    Au contraire de exec(), query() est utilisé pour faire des requêtes qui retournent un ou plusieurs résultats : SELECT. On peut aussi l'utiliser avec DELETE, UPDATE et INSERT.
    Valeur de retour : 
        Succès : query() retourne un nouvel objet qui provient de la classe PDOStatement.
        Echec : False.
*/

debug($resultat);  // Dans cet objet $resultat, nous ne voyons pas les données concernant Daniel. Pourtant elles s'y trouvent. Pour y accéder nous devons utiliser une méthode de $resultat qui s'appelle fetch() :
$employe = $resultat->fetch(PDO::FETCH_ASSOC);  // fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $resultat en un ARRAY associatif appelé ici $employe. On y trouve en indices le nom des champs de la requête SQL (on y a mis une * pour avoir tous les champs)

debug($employe);

echo 'Je suis ' . $employe['prenom'] . ' ' . $employe['nom'] . ' du service ' . $employe['service'] . '<br>';

/*
    Pour information on peut mettre dans les () de fetch : 
    PDO::FETCH_NUM  Pour obtenir un tableau aux indices numériques 
    PDO::FETCH_OBJ  Pour obtenir un dernier objet
    ou encore des () vides pour obtenir un mélange de tableau associatif et numérique
*/     

// Exercice : afficher le service de l'employé dont l'id employé est 417
$resultat = $pdo->query("SELECT service FROM employes WHERE id_employes = 417");

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);

debug($employe);

echo 'Le service de l\'employé 417 est : ' . $employe['service'] . '<br>';

//----------------------------------------------------------------------------
echo '<h2> 04. Faire des requêtes avec query() et plusieurs résultats </h2>';
//----------------------------------------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");
debug($resultat);
echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>';  // Cette méthode rowCount() permet de compter le nombre de lignes retournées par la requête (exemple : nombre de produits selectionnés par l'internaute).

// Comme nous avons plusieurs lignes dans $resultat, nous devons faire une boucle pour les parcourir : 
while($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {  // fetch() va chercher la ligne suivante du jeu de résultats à chaque tour de boucle, et le transforme en tableau associatif. La boucle while permet de faire avancer le curseur dans l'objet. Quand il arrive à la fin, fetch() retourne false et la boucle s'arrête.
    //debug($employe);  // $employe est un array associatif qui contient les données de chaque employé (nous avons 1 emplpoyé par tour de boucle)

    echo '<div>';
        echo '<div>' . $employe['id_employes'] . '</div>';
        echo '<div>' . $employe['prenom'] . ' ' . $employe['nom'] . '</div>';
        echo '<div>' . $employe['service'] . '</div>';
        echo '<div>' . $employe['salaire'] . '€</div>';
    echo '</div><hr>';
}
// Si votre requête ne donne qu'un seul résultat (par identifiant par exemple), alors on ne fait pas de boucle.
// Si votre requête peut donner un ou plusieurs résultats, alors on fait une boucle (sinon on obtient que le premier résultat de la requête).


//--------------------------------
echo '<h2> 05. Exercice </h2>';
//--------------------------------

// Vous affichez la liste des différents services dans une liste <ul><li>, en mettant un service par <li>.


$resultat = $pdo->query("SELECT DISTINCT service FROM employes");
debug($resultat);

echo '<ul>';
    while($service = $resultat->fetch(PDO::FETCH_ASSOC)) {
    //debug($service);
            echo '<li>' . $service['service'] . '</li>';
        }
echo '</ul>';


//-------------------------------------------------------------------------------
echo '<h2> 06. Afficher les résultats de la requête dans une table HTML </h2>';
//-------------------------------------------------------------------------------
?>
<style>
    table, tr, td, th {
        border: 1px solid;
    }
    table {
        border-collapse: collapse;
    }
</style>

<?php

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table>';

    // La ligne des entêtes :
    echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Prénom</th>';
        echo '<th>Nom</th>';
        echo '<th>Sexe</th>';
        echo '<th>Service</th>';
        echo '<th>Date d\'embauche</th>';
        echo '<th>Salaire</th>';
    echo '</tr>';

    // Les lignes du tableau :
    while($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {  // La boucle while avec le fetch permet de parcourir l'objet $resultat. On crée un tableau associatif $employe à chaque tour de boucle.
        echo '<tr>';
            // debug($employe);
            foreach($employe as $info) {    // $employe étant un tableau, on peut le parcourir avec une foreach. La variable $info prend les valeurs successivement à chaque tour de boucle.
                echo '<td>' . $info . '</td>';
            }
        echo '</tr>';
    }

echo '</table>';
// Quand on fait 1 tour de while, on fait à l'intérieur 7 tours de foreach pour parcourir 1 employé. Quand la while a parcouru la totalité de $resultat, alors fetch() retourne false et la while s'arrête.


//-----------------------------------------
echo '<h2> 07. Requêtes préparées </h2>';
//-----------------------------------------

// Les requêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phases analyse / interprétation / exécution de la requête (gain de performance).
// Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL (ce que nous verrons dans un chapitre ultérieur).

$nom = 'sennard';

// Une requête préparée se réalise en trois étapes : 

// 1- On prépare la requête : 
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");   // prepare() permet de préparer la requête sans l'exécuter. Elle contient un marqueur :nom qui est vide et attend une valeur. $resultat est à cette ligne encore un objet PDOStatement.

// 2- On lie le marqueur à la variable $nom : 
$resultat->bindParam(':nom', $nom);   // bindParam() permet de lier le marqueur à la variable $nom. Notez que cette méthode ne reçoit qu'une variable. On ne peut pas y mettre une valeur fixe comme "sennard" par exemple. Si vous avez besoin de lier le marqueur à une valeur fixe alors il faut utiliser la méthode bindValue(). Exemple : $resultat->bindValue(':nom', 'sennard');

// 3- On exécute la requête : 
$resultat->execute();   // Permet d'exécuter toute la requête préparée avec prepare().

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);  // On ne fait pas de boucle ici car il n'y a qu'un seul "Sennard". 
debug($employe);
echo $employe['prenom'] . ' ' . $employe['nom'] . ' du service ' . $employe['service'] . '<br>';

/*
    Valeurs de retour :
    prepare() retourne toujours un objet PDOStatement (jeu de résultat)
    
    execute():
        succès : true 
        échec : false

*/

//--------------------------------------------------------
echo '<h2> 08. Requêtes préparées sans bindParam </h2>';
//--------------------------------------------------------

$resultat = $pdo->prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom ");  // Préparation de la requête

$resultat->execute(array(
    ':nom'    => 'chevel',
    ':prenom' => 'daniel'
));     // On peut se passer de bindParam() et associer les marqueurs à leur valeur directement dans un tableau passé en argument de execute().

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de boucle car nous n'avons qu'un seul Daniel Chevel.

debug($employe);

echo $employe['prenom'] . ' ' . $employe['nom'] . ' est du service ' . $employe['service'];
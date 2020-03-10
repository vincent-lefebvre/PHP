<?php
//-------------------------------------
// La superglobale $_COOKIE
//-------------------------------------

/*
    Un cookie est un petit fichier (4ko max) déposé par le serveur web sur le poste de l'internaute, et qui contient des informations.
    Les cookies sont automatiquement renvenvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies.
    PHP permet de récupérer très facilement les données contenues dans un cookie : ses informations sont stockées dans la superglobale $_COOKIE.
    Un cookie étant sauvegardé sur le poste de l'internaute, il peut être modifié, volé ou détourné. On n'y met donc pas d'informations sensibles (mot de passe, panier d'achat, références bancaires...).
*/

// Mise en pratique : stocker la langue selectionnée dans un cookie.


// 2- On détermine la langue à afficher, "fr" par défaut : 
if (isset($_GET['langue'])) {     // si une langue est dans l'URL, c'est que l'internaute à cliqué sur un des liens. On enverra donc cette langue dans le cookie :
    $langue = $_GET['langue'];
}elseif (isset($_COOKIE['langue'])) {   // si on a reçu un cookie appelé "langue" alors la langue du site sera la valeur du cookie.
    $langue = $_COOKIE['langue'];
}else {
    $langue = 'fr';     // sinon si l'internaute n'a pas choisi de langue, et qu'il arrive pour la première fois, on lui met "fr" par défaut.
}

// 3- Envoi du cookie avec la langue : 
echo time();    // donne le timestamp de maintenant : date exprimée en secondes écoulées entre le 01/01/1970 et maintenant.

$un_an = time() + 365*24*60*60;    // on prend le timestamp de maintenant auquel on ajoute 1 an exprimé en secondes pour déterminer la date d'expiration du cookie.

setcookie('langue', $langue, $un_an);   // on envoie notre cookie appelé "langue", avec pour contenu $langue, et pour date d'expiration $un_an.

// 4- Affichage de la langue : 
echo '<h2>Langue du site : ' . $langue . '</h2>';

// Il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie. Pour rendre un cookie invalide, on utilise setcookie() avec le nom du cookie concerné, et en mettant une date d'expiration à 0 ou antérieure à aujourd'hui.

// Pour visualiser les cookies dans le navigateur : onglet "Stockage" dans Firefox, ou "Application" dans Chrome.


// 1- Le HTML

?>

<h1>Votre langue</h1>
<ul>
    <li><a href="?langue=fr">Français</a></li><!-- on envoie la langue choisie par l'URL : la valeur "fr" est receptionnée dans la superglobale $_GET -->
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
    <li><a href="?langue=en">Anglais</a></li>
</ul>


<?php

// Fonction de debug

function debug($var) {
    echo '<pre>';
        print_r($var);
    echo '</pre>';

}

// Fonctions liées au membre
// Vérifier si le membre est connecté
function estConnecte() {

    if (isset($_SESSION['membre'])) { // si la session contient un indice "membre", c'est que l'internaute est passé par la page de connexion avec les bons pseudo/mdp
        return true;    // il est connecté 
    } else {
        return false;   // il n'est pas connecté
    }

}

if (estConnecte()) {
    // on affiche le profil
} else {
    // on n'affiche pas le profil
}

// Vérifier si le membre est admin et connecté : 
function estAdmin() {
    if (estConnecte() && $_SESSION['membre']['statut'] == 1) {  // Si le membre est connecté ET que dans le même temps son staut est 1 (pour admin), nous retournons true : 
        return true;
    }else {
        return false;   // Sinon dans le cas contraire nous retournons false.
    }
}
<?php
// Exercice : 
/*
    1 - Vous affichez dans cette page un titre "Mon compte", un nom et un prénom.
    2 - Vous y ajoutez un lien "modifier mon compte". Ce lien envoie dans l'url à la même page exercie.php que l'action demandée est "modification" quand on clique sur le lien.
    3 - Si vous avez reçu une action "modification" par l'url, alors vous affichez "Vous avez demandé la modification de votre compte.".
*/

?>
<h1>Mon compte</h1>

<p>Nom : DOE</p>
<p>Prénom : John</p>

<a href="?action=modification">Modifier mon compte</a> 
<!-- Quand on envoie les données en GET à la même page, on peut commencer directement par le "?". -->
<a href="?action=suppression">Supprimer mon compte</a> 

<br>

<?php
print_r($_GET);

if (isset($_GET['action']) && $_GET['action'] == 'modification'){  // si existe "action" dans $_GET, donc dans l'url, et que dans le même temps sa valeur est égale à "modification" alors on affiche la phrase suivante :
    echo '<p>Vous avez demandé la modification de votre compte.</p>';
}

if (isset($_GET['action']) && $_GET['action'] == 'suppression'){  // si on a cliqué sur "suppression" alors on affiche la phrase suivante : 
    echo '<p>Vous avez demandé la suppression de votre compte.</p>';
}
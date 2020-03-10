<style>
    body{
        width: 75%;
        /* text-align: center; */
        margin: 20px auto;
    }
    h2{
        border-top: 1px solid navy;
        border-bottom: 1px solid navy;
        color: navy;
    }
    table{
        background-color: pink;
        border-collapse: collapse;
    }
    td{
        border: 1px solid black;
    }
</style>

<?php
require_once 'functions.php';
//--------------------------------
echo '<h2>Les balises PHP</h2>';
//--------------------------------
?>

<?php
// pour ouvrir un passage en PHP on utilise la balise précédente
// puis pour fermer uin passage en PHP on utilise la balise suivante
?>

<p>Bonjour </p> <!-- en dehors des balises PHP nous pouvons écrire du HTML dans un fichier ayant .php (ce n'est pas possible dans un fichier .html)  -->

<?php
//Vous n'êtes pas obligé de fermer un passage en PHP en fin de script. 

// pour faire un commentaire sur 1 seule ligne 
# pour faire un commentaire sur 1 seule ligne 
/*
    pour faire 
    un commentaire 
    sur plusieurs lignes
*/



//--------------------------------
echo '<h2>Affichage</h2>';
//--------------------------------

echo 'Bonjour <br>'; //echo est une instruction qui permet d'effectuer un affichage. Nous pouvons y mettre du HTML. Toutes les intructions se terminent par un ";" en PHP.

print 'Nous sommes lundi <br>'; // print est une autre instruction d'affichage

var_dump('code');
print_r('code'); // Ces deux fonctions d'affichage permettent d'analyser dans le navigateur le contenu d'une variable par exemple (nous en verrons l'utilisation plus tard)



//--------------------------------
echo '<h2>Les variables</h2>';
//--------------------------------
// Une variable est un espace mémoire qui porte un nom et qui permet de conserver une valeur. Cette valeur peut être de n'importe quel type.
// En PHP on représente une variable avec le signe "$"

$a = 127; // on déclare la variable $a et on lui affecte la valeur 127
echo gettype($a); // gettype() est une fonction prédéfinie qui permet de voir le type d'une variable. Ici il s'agit d'un integer (entier)
echo '<br>';

$a = 1.5;
echo gettype($a); // ici il s'agit d'un double (nombre à virgule)
echo '<br>';

$a = 'une chaîne de caractères';
echo gettype($a); // ici il s'agit d'un string 
echo '<br>';
$a = '127'; // un nombre écrit entre quotes ou guillemets est interprété comme un string.

$a = true; // ou false 
echo gettype($a); // ici il s'agit d'un boolean (booléen)

// Par convention un nom de variable commence par une minuscule puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début) ou un "_" (pas au début ni à la fin).
// Exemple : $maVariable1



//--------------------------------
echo '<h2>Concaténation</h2>';
//--------------------------------

// En php on concatène avec le "."

$x = 'Bonjour';
$y = 'tout le monde';
echo $x . $y . '<br>'; // on concatène les 2 variables et le string avec le point qu'on peut traduire par "suivi de".

//------
// Concaténation et affectation combinées avec l'opérateur ".="
$prenom = 'Nicolas';
$prenom .= '-Marie'; // on ajoute la valeur "-Marie" à la valeur "Nicolas" SANS la remplacer grâce à l'opérateur ".="
echo $prenom . '<br>'; // affiche "Nicolas-Marie"



//--------------------------------------
echo '<h2> Guillemets et quotes </h2>';
//--------------------------------------
$message = "aujourd'hui";
$message = 'aujourd\'hui';  // on échappe les apostrophes quand on écrit dans les quotes simples avec \  (AltGr + 8)

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // dans les guillements, la variable est évaluée : c'est son contenu qui est affiché.
echo '$txt tout le monde <br>'; // dans les quotes simples, $txt est considéré comme une chaîne de caractères brute : on affiche $txt littéralement.



//------------------------------
echo '<h2> Constante </h2>';
//------------------------------
// Une constante permet de conserver une valeur sauf que celle-ci ne peut pas changer. C'est-à-dire qu'on ne pourra pas la modifier durant l'exécution du script. Utile par exemple pour conserver les paramètres de connexion à la BDD de façon certaine.

define('CAPITALE_FRANCE', 'Paris');  // par convention une constante s'écrit toujours en MAJUSCULES. Ici on déclare la constante CAPITALE_FRANCE à laquelle on affecte 'Paris'.
echo CAPITALE_FRANCE . '<br>'; // affiche Paris

// Autre syntaxe pour déclarer une constante :
const TAUX_CONVERSION = 6.55957; // on peut aussi déclarer une constante avec le mot clé const.
echo TAUX_CONVERSION . '<br>'; // affiche 6.55957

//------
// Exercice : Vous affichez Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables.
$a = 'Bleu';
$b = '-Blanc';
$c = '-Rouge';
echo $a . $b . $c . '<br>';
echo "$a$b$c <br>";


$a = 'Bleu';
$a .= '-Blanc';
$a .= '-Rouge';
echo $a;



//------------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
//------------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>'; // 12
echo $a - $b . '<br>'; // 8
echo $a * $b . '<br>'; // 20
echo $a / $b . '<br>'; // 5
echo $a % $b . '<br>'; // 0 modulo = reste de la division entière. Exemple : 3 % 2 = 1 car si on a 3 billes réparties sur 2 personnes, il nous en reste 1.

//-------
// Opération et affectation combinées :
$a = 10;
$b = 2;

$a += $b; // équivaut à $a = $a + $b soit $a = 10 + 2, $a vaut donc 12 au final
$a -= $b; // équivaut à $a = $a - $b soit $a = 12 - 2, $a vaut donc 10 au final
// On utilise ces opérateurs dans les paniers d'achat par exemple.

// Il existe aussi les opérateurs *=  /=  et %=

//-------
// Incrémenter et décrémenter :
$i = 0;
$i++; // on augmente $i de 1
$i--; // on diminue $i de 1 ($i vaut donc 0 ici)




//-------------------------------------------------
echo '<h2> Les structures conditionnelles </h2>';
//-------------------------------------------------
$a = 10;
$b = 5;
$c = 2;

// if ... else :
if ($a > $b) { // si la condition est vraie, c'est-à-dire que $a est supérieur à $b, alors on exécute les accolades qui suivent :
	echo '$a est supérieur à $b <br>';
} else { // sinon si la condition est fausse, on exécute le else :
	echo 'Non c\'est $b qui est supérieur ou égal à $a <br>';
}


// L'opérateur AND qui s'écrit && 
if ($a > $b && $b > $c) { // si $a est supérieur à $b et que dans le même temps $b est supérieur à $c, alors on entre dans les accolades : 
	echo 'OK pour les deux conditions <br>';
}

$a = 10;
$b = 5;
$c = 2;

// L'opérateur OR qui s'écrit || (altGr 6)
if ($a == 9 || $b > $c) { // si $a est égal (== pour comparer en valeur) à 9 OU alors $b est supérieur à $c, alors on exécute les accolades qui suivent :
	echo 'ok pour au moins une des deux conditions <br>';
} else { // sinon c'est que les 2 conditions sont fausses
	echo 'Les deux conditions sont fausses <br>';
}

// if ... elseif ... else :
if ($a == 8) { // si $a est égal à 8
	echo 'réponse 1 : $a est égal à 8';
} elseif ($a != 10) { // sinon si $a est différent de 10
	echo 'réponse 2 : $a est différent de 10';
} else { // sinon, si nous ne sommes pas entrés dans le if ni dans le elseif, on entre dans le else :	
	echo 'réponse 3 : les 2 conditions précédentes sont fausses <br>';
}


//-------
// La condition ternaire :
// La ternaire est une autre syntaxe pour écrire un if...else.
$a = 10;

echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>'; // dans la ternaire le "?" remplace le if, et le ":" remplace le else. Ainsi on dit : si $a est égal à 10, on affiche la première expression, sinon la seconde.


//-------
// Comparaison avec == et === 
$varA = 1;  // integer
$varB = '1';  // string

if ($varA == $varB) { // la condition est vraie car en valeur 1 et '1' sont équivalents
	echo '$varA est égal à $varB en valeur uniquement <br>';
}

if ($varA === $varB) { // la condition est fausse car 1 et '1' sont différents en type
	echo '$varA est égal à $varB en valeur et en type (stritement égaux) <br>';
} else {
	echo 'Les deux variables sont différentes en valeur ou en type (pas strictement égales) <br>';
}

// Pour mémoire l'opérateur "=" est un signe d'affectation.

//-------
// isset() et empty() :
// Définitions :
// empty() vérifie si c'est vide : 0, '', NULL, false, non défini
// isset() vérifie si c'est défini, et non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) {
	echo '$var1 est vide (0, string vide, NULL, false ou non défini) <br>';
}

if (isset($var2)) {
	echo '$var2 existe et est non NULL <br>';
}

// Différence entre isset et empty : si on supprime les déclarations des variables $var1 et $var2, empty() reste vraie car $var1 n'est pas définie. isset() devient fausse car $var2 n'est pas définie non plus. 

// Utilisation : empty() pour vérifier qu'un champ de formulaire est rempli. isset() pour vérifier l'existence d'une variable avant de l'utiliser.


//---------
// L'opérateur NOT qui s'écrit "!" :
$var3 = 'quelque chose';
if (!empty($var3)) { // "!" pour NOT qui est une négation. Ainsi quand on a !TRUE cela revient à FALSE, et quand on a !FALSE cela revient à TRUE.
	echo '$var3 n\'est pas vide <br>'; // ici on entre dans la condition, car $var3 n'est pas vide 
}


//---------
// PHP7 : afficher une variable sous condition d'existence avec l'opérateur "??"

echo $maVar ?? 'valeur par défaut'; // on affiche la variable $maVar si elle existe, sinon on affiche le string qui suit.

// Exemple d'utilisation : pour laisser les valeurs saisies dans un formulaire.



//-------------------------------------
echo '<h2> Switch </h2>';
//-------------------------------------
// La condition switch est une autre syntaxe pour écrire un if ... elseif ... else quand on veut comparer une variable à une multitude de valeurs.

$langue = 'chinois';

switch ($langue) {
    case 'français' : // on compare $langue à la valeur des "case" (cas où) et on execute le code qui suit si elle correspond :
        echo 'Bonjour !';
    break;          // break est obligatoire pour quitter le switch une fois un "case" exécuté 
    case 'italien' :
        echo 'Ciao !';
    break;
    case 'espagnol' :
        echo 'Hola !';
    break;
    default :       // on tombe dans le cas par défaut si on n'entre pas dans les "case" précédents
        echo 'Hello ! <br>';
    break;      
}

// Exercice : vous réécrivez ce switch avec des if... pour obtenir exactement le même résultat.

if ($langue == 'français'){
    echo 'Bonjour !<br>';
}elseif($langue == 'italien'){
    echo 'Ciao !<br>';
}elseif($langue == 'espagnol'){
    echo 'Hola !<br>';
}else{
    echo 'Hello !<br>';
}



//-----------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
//-----------------------------------------

// Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP.

//----------
// strpos()
$email1 = 'prenom@site.fr';
echo strpos($email1, '@'); // strpos() (pour string position) indique la position 6 du caractère '@' dans la chaîne de caractères $email1 (on compte à partir de 0).

echo '<br>';

$email2 = 'toto';
echo strpos($email2, '@');
var_dump(strpos($email2, '@')); // grâce au var_dump on aperçoit que la fonction retourne FALSE car le caractère "@" n'est pas trouvé dans $email2. Notez que quand on fait un echo de false, cela n'affiche rien dans le navigateur. var_dump est une instruction d'affichage améliorée que l'on utilise quand on développe, puis qu'on retire.

//----------
// strlen()
$phrase = 'mettez une phrase ici';
echo strlen($phrase); // strlen() (pour string lenth) permet de retourner la taille de la chaîne de caractères (nombre d'octets occupés, un caractère accentué valant 2 octets, et un espace 1 octet).

echo '<br>';

//----------
// substr()
$texte = 'Vous mettez ici un très long texte. Vous mettez ici un très long texte. Vous mettez ici un très long texte. Vous mettez ici un très long texte.';

echo substr($texte, 0, 20) . '...<a href="#"> lire la suite </a>'; // coupe une partie du texte, en partant de la position 0 ici et sur 20 octets.


//-----------------------------------------
echo '<h2> Fonctions utilisateur </h2>';
//-----------------------------------------

// Des fonctions sont des morceaux de code écrits dans des accolades et portant un nom. On appelle une foncton au besoin pour éxecuter le code qui s'y trouve.

// Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut executer plusieurs fois le même traitement. On parle alors de "factoriser" son code.

function separation(){  // on déclare une fonction avec le mot-clef function suivi du nom de la fonction, et d'une paire de () qui accueillerons des paramètres ultérieurement.
    echo '<hr>';
}

separation(); // pour exécuter une fonction (donc le code qui s'y trouve), on l'appelle en écrivant son nom suivi d'une paire de ().

//-----------
// Fonction avec paramètres et return : 

function bonjour($prenom, $nom) {  // $prenom et $nom sont les paramètres de notre fonction. Ils permettent de recevoir une valeur car il s'agit de variables de réception.
    return 'Bonjour ' . $prenom . ' ' . $nom . ' ! <br>';  // return permet de sortir la phrase "Bonjour..." de la fonction et de la renvoyer à l'endroit où la fonction est appelée.
}

echo bonjour('John', 'Doe');  // si la fonction attend des valeurs, il faut obligatoirement les lui donner, et dans le même ordre que les paramètres. Ces valeurs sont des arguments. Ici on met un echo car la fonction nous retourne la phrase mais ne l'affiche pas directement.

// On peut remplacer les arguments par des variables (provenant d'un formulaire par exemple) :
$prenom = 'Pierre';
$nom = 'Giraud';
echo bonjour($prenom, $nom); // ici les deux arguments sont variables et peuvent recevoir n'importe quelle valeur.

// Exemple : vous écrivez une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel. Cette fonction retoutrne le résultat de la multiplication. Vous affichez le résultat.

$chiffre1 = 12;
$chiffre2 = 6;

function multiplier($chiffre1, $chiffre2){
    return 'Le résultat de ' . $chiffre1 . ' multiplié par ' . $chiffre2 . ' est de ' . $chiffre1 * $chiffre2 . '.<br>';
}

echo multiplier($chiffre1, $chiffre2);

//-----------------------------------------------------
echo '<h2> Variable locale et variable globale </h2>';
//-----------------------------------------------------

//------------
// Aller de l'espace local à l'espace global : 
function jourSemaine(){
    $jour = 'mardi'; // ici nous nous trouvons dans l'espace local de la fonction. Cette variable est donc dite "locale". 
    return $jour;   // return permet de sortir une valeur de la fonction.
}

// echo $jour; // on ne peut pas accéder à cette variable ici car elle n'est connue qu'à l'intérieur de la fonction jourSemaine().
echo jourSemaine(); // on récupère la valeur "mardi" grâce au return en fin de la fonction.

//--------------
// Aller de l'espace global vers l'espace local :
$pays = 'France'; // ici nous nous trouvons dans l'espace global. Cette variable est donc dite "globale". 

function affichePays(){
    global $pays; // global permet d'aller chercher la variable $pays à l'extérieur de la fonction pour pouvoir l'exploiter à l'intérieur.
    echo $pays;  // affiche France
}

affichePays();



//-----------------------------------------------------
echo '<h2> Structures itératives : les boucles </h2>';
//-----------------------------------------------------

// Les boucles sont déstinées à répéter du code de façon automatique.

//-----------
// La boucle while :

$i = 0; // valeur de départ de la boucle
while($i < 3) { // tant que $i est inférieur à 3, on entre dans la boucle.
    echo $i . '----';
    $i++;   // on n'oublie pas d'incrémenter la variable $i pour que la condition d'entrée devienne fausse à un moment donné (évite les boucles infinies).
}

// Exercice : à l'aide d'une boucle while, vous affichez les années de 1920 à 2020 dans un menu déroulant.
echo '<select>';
    echo '<option> 1920 </option>';
    echo '<option> 1921 </option>';    
    echo '<option> ... </option>';
    echo '<option> 2020 </option>';
echo '</select>';

echo '<br>';

echo '<select>';
    $annee = 1920;  // point de départ de la boucle
        while($annee < 2021) {
            echo '<option>' . $annee . '</option>' ;
            $annee++;
        }
echo '</select>';

echo '<br>';

echo '<select>';
    $annee = 2020;  // point de départ de la boucle
        while($annee >= 1920) {
            echo '<option>' . $annee . '</option>' ;
            $annee--;
        }
echo '</select>';

echo '<br>';

//-----------
// La boucle do while :

// La boucle do while a la particularité de s'exécuter au moins une fois, puis tant que la condition de fin est vraie.

$j = 0; // valeur de départ de la boucle

do {
    echo '<br> Je fais un tour de boucle <br>';
    $j++;
} while ($j > 10); // la condition renvoie false tout de suite, pourtant la boucle à bien tourné une fois. Attention au ";" après le while.

echo '<br>';

//-----------
// La boucle for :

// La boucle for est une autre syntaxe de la boucle while.
for ($i = 0; $i < 50; $i+=5) { // on trouve dans les () de la for : la valeur de départ; la condition d'entrée dans la boucle; la variation de $i (incrémentation, décrémentation)
    echo $i . '----';
}

echo '<br>';

// Exercice : vous affichez les mois de 1 à 12 à l'aide d'une boucle for dans un menu déroulant.

echo '<select>';
    for($mois = 1; $mois <= 12; $mois++ ) {
        echo '<option>' . $mois . '</option>' ;
    }
echo '</select>';

//-----------OU---------

echo '<form>';
    echo'<label>Mois de naissance </label>';
        echo '<select>';
            for($mois = 1; $mois <= 12; $mois++ ) {
                echo '<option>' . $mois . '</option>' ;
            }
        echo '</select>';
echo '</form>';

//-----------OU---------

?>

<form>
    <label>Mois de naissance</label>
        <select>
            <?php
                for($mois = 1; $mois <= 12; $mois++ ) {
                    echo '<option>' . $mois . '</option>' ;
                }
            ?>
        </select>
</form>

<?php

// Exercice : 
// - faire une boucle for qui affiche 0 à 9 sur la même ligne
// - puis vous complétez la boucle précédente, pour mettre les chiffres dans une table HTML. Vous y mettrez une bordure en CSS.

?>  
<!-- En HTML -->
<table>
    <tr>
        <?php
            for ($i = 0; $i < 10; $i++) { 
                echo '<td>' . $i . '</td>' ;
            }
        ?>
    </tr>
</table>

<br>

<!-- En PHP -->
<?php
echo '<table>';
    echo '<tr>';
        for ($i = 0; $i < 10; $i++) { 
            echo '<td>' . $i . '</td>' ;
        }
    echo '</tr>';
echo '</table>';



//-----------------------------------------------------
echo '<h2> Les tableaux (array) </h2>';
//-----------------------------------------------------
// Un tableau appelé array en anglais est une variable améliorée dans laquelle on stocke une multitude de valeur. Ces valeurs peuvent être de n'importe quel type. Elles possèdent un indice dont la numérotation commence à 0.

// Déclarer un array (méthode 1) :
$liste = array('Grégoire','Nathalie','Emilie','François','Georges'); // Les valeurs sont séparées par une virgule.

//echo $liste; // erreur de type "Array to string conversion" car on ne peut pas afficher directement un tableau.

echo '<pre>';
    var_dump($liste); // Affiche le contenu du tableau avec les types 
echo '</pre>';

echo '<pre>';
    print_r($liste); // Affiche le tableau sans les types
echo '</pre>';      // <pre> est une balise HTML qui permet de formater le texte

// Pour notre besoin nous créons une fonction personnelle d'affichage : 

function debug($var){
    echo '<pre>';
        print_r($var);  
    echo '</pre>';
}
debug($liste);

// Autre façon de déclarer un array (méthode 2) : 

$tab = ['France','Italie','Espagne','Portugal'];
//indices   0        1        2          3

echo $tab[1] . '<br>'; // Pour afficher une valeur du tableau, on écrit son indice dans une paire de crochets après le nom du tableau. Ici affiche "Italie".

// Ajouter une valeur à la fin d'un tableau :

$tab[] = 'Suisse'; // Les crochets vides signifient qu'on ajoute une valeur à la fin du tableau $tab.

debug($tab); // pour vérifier que la valeur "Suisse" est présente.


//-----------------------
// Les tableaux associatifs : 
// Dans un tableau associatif, nous pouvons choisir le nom des indices.


$couleur = array (
    'b' => 'bleu',
    'r' => 'rouge',
    'v' => 'vert',
);

// Pour afficher une valeur de notre tableau associatif : 
echo 'La première couleur du tableau est ' . $couleur['b'] . '.<br>';
echo "La première couleur du tableau est $couleur[b].<br>";  // Quand un tableau associatif est écrit dans des guillemets ou des quotes, il perd les quotes autour de son indice.

// Compter le nombre d'éléments contenu dans un tableau : 
echo 'Nombre de valeurs dans le tableau : ' . count($couleur) . '<br>'; // affiche 3 
echo 'Nombre de valeurs dans le tableau : ' . sizeof($couleur) . '<br>'; // affiche 3 aussi car sizeof() fait la même chos que count() dont il est un alias.


//-----------------------------------------------------
echo '<h2> La boucle foreach </h2>';
//-----------------------------------------------------
// foreach est un moyen simple de passer en revue un tableau de façon automatique. Cette boucle ne fonctionne que sur les tableaux et les objets.

debug($tab); // pour voir le tableau à parcourir

foreach($tab as $pays) {    // On parcourt le tableau par ses valeurs. La variable $pays prend les valeurs du tableau successivement à chaque tour de boucle. Le mot clé "as" fait partie de la syntaxe, il est obligatoire.
    echo $pays . '<br>';
}

echo '<hr>';

// La boucle foreach pour parcourir les INDICES et les VALEURS : 

foreach($tab as $indice => $pays){  // Quand il y a 2 variables après "as", celle de gauche parcourt les indices, celle de droite parcourt les valeurs (quelque soit leur nom).
    echo 'L\'indice ' . $indice . ' correspond à ' . $pays . '<br>';
}

// Exercice : vous déclarez un tableau associatif avec les indices prenom, nom, email et téléphone. Et vous y mettez les valeurs correspondant à un seul contact. Puis avec une boucle foreach, vous affichez les valeurs dans des <p>, sauf le prénom qui doit être dans un <h3>. 

$contact = array (
    'prenom'    => 'John',
    'nom'       => 'Doe',
    'email'     => 'johndoe@gmail.com',
    'telephone' => '0136656565',
);

debug($contact);

foreach($contact as $indice => $valeur){
    if($indice == 'prenom'){
       echo '<h3>Bonjour ' . $valeur . ' !</h3>' ;
    }else{
        echo '<p>' . $valeur . '</p>';
    }
}


//-----------------------------------------------------
echo '<h2> Tableau multidimensionnel </h2>';
//-----------------------------------------------------

// On parle de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
    0 => array(
        'prenom'    => 'Julien',
        'nom'       => 'Dupont',
        'telephone' => '0123456789'
    ),
    1 => array(
        'prenom'    => 'Nicolas',
        'nom'       => 'Duran',
        'telephone' => '0987654321'
    ),
    2 => array(
        'prenom'    => 'Pierre',
        'nom'       => 'Dulac'
    ),
);

debug($tab_multi);

// Afficher la valeur "Julien" de $tab_multi : 
echo $tab_multi[0]['prenom'] . '<br>';  // Pour afficher "Julien" nous entrons d'abord à l'indice [0] de $tab_multi puis nous allons dans le sous tableau à l'indice ['prenom'].

echo '<hr>';

// Pour parcourir le tableau multidimensionnel on peut faire une boucle for car ses indices sont numériques : 
for ($i = 0; $i < count($tab_multi); $i++) {  // tant que $i est inférieur au nombre d'éléments du tableau $tab_multi (soit 3), on entre dans la boucle : 
    echo $tab_multi[$i]['prenom'] . '<br>';  // $i va successivement prendre la valeur 0, puis 1, puis 2, ce qui permet d'afficher les 3 prénoms.
}

echo '<hr>';


// Exercice : vous affichez les trois prénoms du tableau $tab_multi avec une boucle foreach.

foreach($tab_multi as $indice => $valeur){
    //debug($indice);
    //echo $tab_multi[$indice]['prenom'] . '<br>';
    // ou :
    // debug($valeur);
    echo $valeur['prenom'] . '<br>';
}

// Exercice bonus : vous déclarez un tableau avec les tailles S, M, L et XL. Puis vous affichez les tailles dans un menu déroulant avec une boucle foreach.

$tailles = array ('S', 'M', 'L', 'XL');

?>
<select>
    <?php
        for($i = 0; $i <= 3; $i++ ) {
            echo '<option>' . $tailles[$i] . '</option>' ;
        }
    ?>
</select>


<select>
    <?php
        foreach($tailles as $valeur){
            echo '<option>' . $valeur . '</option>';
        }
    ?>
</select>



<?php
//-----------------------------------------------------
echo '<h2> Inclusion de fichiers </h2>';
//-----------------------------------------------------

echo 'Première inclusion : ';
include 'exemple.inc.php'; // permet de faire l'inclusion du fichier dont le chemin est spécifié. En cas d'erreur lors de l'inclusion, include génére un warning et continue l'execution du script. 

echo '<br>';

echo 'Deuxième inclusion : ';
include_once 'exemple.inc.php'; // permet de faire l'inclusion du fichier une seule fois, et seulement si celui-ci n'a pas encore été inclus.

echo '<br>';

echo 'Troisième inclusion : ';
require 'exemple.inc.php'; // fait l'inclusion du fichier spécifié.Celui-ci est obligatoire au bon fonctionnement du site : en cas d'erreur lors de l'inclusion, require génère une erreur de type "fatal error" et stoppe l'execution du script. 

echo '<br>';

echo 'Quatrième inclusion : ';
require_once 'exemple.inc.php'; // "once" signifie que l'on vérifie si le fichier a déjà été inclus. Si c'est le cas, on ne le ré-inclut pas.

// Le ".inc" dans le nom du fichier est un indicatif pour préciser aux développeurs que le fichier est destiné à être inclus, et qu'il ne s'agit pas d'une page à part entière.

bonjourKiki();

//---------------------------------------------------
echo '<h2>Introduction aux objets</h2>';
//---------------------------------------------------

// Un objet est un autre type de données (object en anglais). Il représente un objet réel (par exemple une voiture, un personnage de jeu vidéo, un membre inscrit à votre site, un produit que vous vendez, un panier d'achat...) auquel on peut associer des variables, appelées propriétés, et des fonctions appelées méthodes.

// Pour créer des objets il nous faut un plan de construction : c'est le rôle de la classe (class en anglais). Nous créons ici une classe pour fabriquer des meubles :

class Meuble {  // on met une majuscule à la 1ère lettre du nom de la classe 
    public $marque = 'ikea';   // propriété "marque". Public permet de préciser que l'élément sera accessible partout.

    public function prix() {
        return rand(50,200) . '€' ;  // rand() est une fonction prédéfinie qui tire un chiffre aléatoire ici entre 50 et 200.
    }
}

// On crée une table à partir de la classe Meuble : 
$table = new Meuble();  // On crée un objet $table à partir de la classe Meuble à l'aide du mot clé "new". On dit que l'on instancie la classe. $table est donc de type objet.

debug($table);  // On voit le type object et la seule propriété "marque"

echo 'La marque de notre table est : ' . $table->marque . '<br>';   // Pour accéder à la propriété d'un objet, on écrit l'objet suivi de la flèche "->" puis du nom de la propriété SANS le "$".
echo 'Le prix de notre table est de :  ' . $table->prix() . '<br>'; // Pour exécuter la méthode d'un objet, on écrit son nom après la flèche "->" et on lui ajoute une paire de ().


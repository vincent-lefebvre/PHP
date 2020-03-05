<?php
// Exercice : 
// - Vous créez un formulaire avec les champs ville, code postal et une zone de texte adresses.
// - Quand le formulaire est envoyé, vous en récupérez les données dans exercice-traitement.php et vous les affichez.

?>

<form method="post" action="exercice-traitement.php">
    <div>
        <label for="ville">Ville : </label>
        <input name="ville" type="text">
    </div>
    <div>
        <label for="code_postal">Code postal : </label>
        <input name="code_postal" type="text">
    </div>
    <div>
        <label for="adresse">Adresse : </label>
        <textarea name="adresse" id="adresse"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>

</form>
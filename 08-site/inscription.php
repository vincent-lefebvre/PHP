<?php
require_once 'inc/init.php';


require_once 'inc/header.php';
?>
<h1 class="mt-4">Inscription</h1>
<?php
echo $contenu;  // pour afficher les messages
?>

<form method="post" action="">
    <div>
        <div><label for="pseudo">Pseudo</label></div>
        <div><input type="text" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label for="mdp">Mot de passe</label></div>
        <div><input type="password" name="mdp" value=""></div>
    </div>
    <div>
        <div><label for="nom">Nom</label></div>
        <div><input type="text" name="nom" value="<?php echo $_POST['nom'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label for="prenom">Prénom</label></div>
        <div><input type="text" name="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label for="email">Email</label></div>
        <div><input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label>Civilité</label></div>
        <div>
            <input type="radio" name="civilite" value="m" checked> Homme
            <input type="radio" name="civilite" value="f" <?php if (isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'checked'; ?>> Femme
        </div>
    </div>
    <div>
        <div><label for="ville">Ville</label></div>
        <div><input type="text" name="ville" value="<?php echo $_POST['ville'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label for="code_postal">Code postal</label></div>
        <div><input type="text" name="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>"></div>
    </div>
    <div>
        <div><label for="adresse">Adresse</label></div>
        <div><textarea name="adresse" id="adresse"><?php echo $_POST['adresse'] ?? ''; ?></textarea></div>
    </div>
    <div><input type="submit" value="S'inscrire" class="btn btn-info"></div>
</form>





<?php
require_once 'inc/footer.php';
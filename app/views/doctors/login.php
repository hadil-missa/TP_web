<?php 
require "/var/www/Doclib.fr/app/views/inc/header.php";?>
<?php
require_once '../../librairies/Controller.php';
require_once '../../controller/Doctors.php';
session_start();

if (isset($_POST['submit']))
{
    $login = (isset($_POST['email'])) ? $_POST['email'] : '';
    $pass = (isset($_POST['password'])) ? $_POST['password'] : '';
    $doctorController = new Doctors();
    $data = $doctorController->Login($login, $pass);

    // Vérifiez si les coordonnées sont valides
    if ($data !== false) {
        // Rediriger l'utilisateur vers une autre page
        header('/var/www/Doclib.fr/app/views/inc/header.php');
        exit;
    } else {
        // Afficher un message d'erreur
        echo 'Identifiants invalides. Veuillez réessayer.';
    }
} else {
    // Afficher le formulaire de connexion
    echo '
    <form id="conn" method="post" action="">
        <p><label for="email">Email :</label><input type="text" id="email" name="email" /></p>
        <p><label for="password">Mot de Passe :</label><input type="password" id="password" name="password" /></p>
        <p><input type="submit" id="submit" name="submit" value="Connexion" /></p>
    </form>';
}




?>
<?php require "/var/www/Doclib.fr/app/views/inc/footer.php";?>
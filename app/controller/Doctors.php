
<?php
 //require_once '../librairies/Controller.php';
 //require_once '../models/Doctor.php';
require_once '/var/www/Doclib.fr/app/librairies/Controller.php';
require_once '/var/www/Doclib.fr/app/models/Doctor.php' ;
class Doctors extends Controller{
    public function __construct(){
       
        $this->userModel = $this->load("Doctor");
    }

    public function Login(){
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
                "is_logged_in" => false     // on ajouté pour juste faire la vérification 
            ];
            $data["email"] = $_POST['email'];
            $data["password"] = $_POST["password"];

            // on teste les données de l'utilisateur
            if (empty($data["email"])){
                $data["email_error"] = "Veuillez saisir votre adresse e-mail.";
            }

            else if (empty($data["password"])){
                $data["password_error"] = "Veuillez saisir votre mot de passe.";
            }
            else{
                 $user = new Doctor;
                //$user->find_docter_by_email("faouzi@gmail.com");
                if ($user->find_docter_by_email($data["email"]) == 1){
                    
                    $login = $user->login($data["email"], $data["password"]);
                    if ($login){
                        $user->create_Doctor_Session($login);
                        //$data["is_logged_in"] = true;
                        echo 'haaaaaaaaaa';
                        //header('location: dashboard.php');
                        exit;
                    }
                    else {
                        $data["password_error"] = "Mot de passe incorrect.";
                    }
                }
                else {
                    $data["email_error"] = "Adresse e-mail inconnue.";
                }
            }
        }

        $this->render("/doctors/login", $data);
    }
}

//$c = new Doctors();
//$c->Login();
 //if (isset($data["email_error"]) && isset($data["password_error"])){

?> 

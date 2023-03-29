<?php

define("ROOT", "/var/www/Doclib.fr/app/");
//require_once '../models/Doctor.php';
//require_once(ROOT . 'models' . 'Doctor' . '.php');
include '/var/www/Doclib.fr/app/models/Doctor.php';

 Abstract class Controller {
public function load($model){
    //require_once '../models/Doctor.php';
    $this->$model = new $model();
}
public function render($view, array $data = []) {
    extract($data);
    ob_start();
    //require_once('/var/www/Doclib.fr/app/views/doctors/' . $view . '.php');
    $content = ob_get_clean();
    echo $content;
}


} 
//$c = new Controller;
//$c->load("Doctor");
//$c->render("login",[]);



?>
<?php
require_once '/var/www/Doclib.fr/app/librairies/Database.php';
Class Doctor{
    private $_db;
    private $table="doctor";
    private $id;
    private $name;
    private $email;
    private $password;
    private $specialist;
    private $gender;
    private $created_at;

    public function __construct(){
        $this->_db =new Database;
    }
    
    
    public function find_docter_by_email($email){
        $this->_db->querry("SELECT name FROM doctor WHERE email= '$email'");
        
        $result = $this->_db->single();
       // print_r($result);
        if ($this->_db->rowcount() == 0 ){
            return False;
        }
        else {
            return TRUE;
        }
    }
    public function create($id,$name,$email,$password,$specialist,$gender,$created_at){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->_db->querry("INSERT INTO doctor (id,name,email,password,specialist,gender,created_at) VALUES 
        ('$id','$name','$email','$hashed_password','$specialist','$gender','$created_at')");
        //$this->_db->querry("INSERT INTO doctor (id,name,email,password,specialist,gender,created_at) VALUES ('$id','$name,
        //'$email,'$password','$specialist','$gender' , '$created_at')");
        return $this->_db->execute();
        
    }
   
    public function login($email, $password){
        $this->_db->querry("SELECT * FROM doctor WHERE email= '$email'");
        $result = $this->_db->single();
        //print_r($result);
       if (isset($result) ){
           // $verif=password_verify($password,$result[3]);
           
         if ( $password== $result[3]){
        // print_r($result);
        }
        else {
            print("dfvdf");
            return False;
        }

        
    }
    }
    public function create_Doctor_Session($Doctor){
        $_SESSION['Doctor_id']=$Doctor[0];
        $_SESSION['Doctor_name']=$Doctor[1];
        $_SESSION['Doctor_email']=$Doctor[2];

    

}
}

//$D=new Doctor;
//print($D->login("faouzi@gmail.com","ddc"));
//$D->create(6,"fd","h","h","psy","d","2023-06-07");
//$D->login("h","h");
//print($D->find_docter_by_email("faouzi@gmail.com"));
?>


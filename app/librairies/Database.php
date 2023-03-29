<?php
class Database 
{
    
    private $host = "localhost";
    private $dbname = "hopital";
    private $username = "hadil";
    private $password = "azerty";

    private $_db ;
    private $querry ;
    public function __construct(){
        $this->_db = null;
        try{
            $this->_db = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
                    $this->username,
                    $this->password
            );
        } catch (PDOException $exception) {
            echo "Err : " . $exception->getMessage();
        }
    }
    public function querry($sql){
       
       $this->querry = $this->_db->prepare($sql);
       


    }
    public function execute(){
        return $this->querry->execute();

    }
    public function single(){
        $this->execute();
        
        return $this->querry->fetch();
    }
    public function rowcount()
    {
       
        return $this->querry->rowcount();
    }
    public function resultSet(){
        $this->execute();
        return $this->querry->fetchAll();

    }

}


   // $c = new Database;
    
    //$c->rowcount();
  // $c->querry("SELECT * FROM doctor");
    //$result = $c->resultSet();
    //print_r($result);
    //$c->rowcount();
   // $resultt = $c->resultSet();
    //print_r($resultt); 
  //print_r($c->rowcount());
  //$result = $c->resultSet();
  //print_r($result);


?>



<?php

namespace App\Models\DB; 

class Sql extends \PDO {

    private $conn;

    public function __construct () {

        $conn = new PDO("mysql:host=localhost;dbname=db_usercontrol", "root", "");

    }

    private function setParams($statment, $paramiters = array()){

        foreach ($paramiters as $kay => $value ) {

            $this->setParam($kay, $value);

        }

    }

    private function setParam($statment, $key, $value){

        $statment->bindParams($key, $value);

    }

    public function query ($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);
        
        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
        
    }

    public function select ($rawQuery, $params):array 
    {

        $stmt = $this->query($rawQuery, $params);

        $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>
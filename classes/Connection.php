<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 30-Nov-15
 * Time: 18:58
 */

Class Connection {
//localhost
    private $pdo_hostname = 'localhost';
    private $pdo_database = 'qwant_service';
    private $pdo_user = 'root';
    private $pdo_password = '';
//deploy
    public function Connect(){
        try{
            $pdo = new PDO('mysql:host='.$this->pdo_hostname.';dbname='.$this->pdo_database.';charset=utf8', $this->pdo_user, $this->pdo_password);
        }catch(PDOException  $e ){
            echo "Cant connect to MySQL: ".$e;
        }
        return $pdo;
    }
}
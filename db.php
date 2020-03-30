<?php

class db
{
    private $host="localhost";
//    private $db_name="agrowcey_agrow";
    private $db_name="ctf";
//    private $username="agrowcey_root";
    private $username="root";
//    private $password="963580398Vj!";
    private $password="";

    private  $connection;

    public  function getConnection(){
        $this->connection=null;
        try {

            $this->connection=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $this->connection->exec("set names UTF8");

        } catch (PDOException $exception){
            echo "Contact Admin !".$exception->getMessage();
        }
        return $this->connection;
    }


}
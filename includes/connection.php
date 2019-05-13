<?php
    class Connect{
        
        public function connect(){

            $this->host = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbName = "priceless";
            $connection = new mysqli($this->host,$this->username,$this->password,$this->dbName);
            return $connection;
            
        }
    }
?>
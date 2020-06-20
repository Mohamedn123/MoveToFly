<?php

class DatabaseConnect{
    private $host = "localhost";
    private $user = "root";
    private $password = "nashaatx";
    private $Database = "movetofly";
    private $Connection = null;
    
    public function __construct() {
        $this->Connection = new mysqli($this->host , $this->user , $this->password , $this->Database);
    }
    public function execute($sql){
        return $this->Connection->query($sql);
    }
}

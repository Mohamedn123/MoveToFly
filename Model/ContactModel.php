<?php
include_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class ContactModel{
    private $ID;
    private $Name;
    private $Email;
    private $Phone;
    private $Title;
    private $Body;
    private $Date;
    public function __construct($Name , $Email , $Phone , $Title, $Body) {
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Phone = $Phone;
        $this->Title = $Title;
        $this->Body = $Body;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function setDate($Date){
        $this->Date = $Date;
    }
    public function getID() {
        return $this->ID;
    }
    public function getName() {
        return $this->Name;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getPhone(){
        return $this->Phone;
    }
    public function getTitle(){
        return $this->Title;
    }
    public function getBody(){
        return $this->Body;
    }
    public function getDate(){
        return $this->Date;
    }
    public function Insert(){
        $sql = "INSERT INTO `Contact`
                (`Name`,
                `Email`,
                `Phone`,
                `Title`,
                `Body`)
                VALUES
                ('".$this->Name."','".$this->Email."','".$this->Phone."','".$this->Title."','".$this->Body."')
                ";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function getAll(){
        $sql = "SELECT * FROM Contact";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Contacts = array();
            $x=0;
            while($row = mysqli_fetch_array($Result)){
                $Contacts[$x] = new ContactModel($row['Name'], $row['Email'], $row['Phone'], $row['Title'], $row['Body']);
                $Contacts[$x]->setID($row['ID']);
                $x++;
            }
            return $Contacts;
        }
        else{
            return null;
        }
    }
    public function Delete(){
        $sql = "DELETE FROM Contact WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function getContactCount(){
        $sql = "SELECT * FROM Contact";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        return $Result->num_rows;
    }
    
}


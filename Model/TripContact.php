<?php
require_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class TripContact{
    private $ID;
    private $Name;
    private $Email;
    private $Phone;
    private $TripID;
    public function __construct($Name , $Email , $Phone, $TripID) {
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Phone = $Phone;
        $this->TripID = $TripID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->Name;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getPhone(){
        return $this->Phone;
    }
    public function getTripID(){
        return $this->TripID;
    }
    public function Insert(){
        $sql = "INSERT INTO `TripContact`
                (`TripID`,
                `Name`,
                `Email`,
                `Phone`)
                VALUES
                ('".$this->TripID."','".$this->Name."','".$this->Email."','".$this->Phone."')";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function SelectAll(){
        $sql = "SELECT * FROM TripContact";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Contacts = array();
            $x=0;
            while ($row = mysqli_fetch_array($Result)){
                $Contacts[$x] = new TripContact($row['Name'], $row['Email'], $row['Phone'], $row['TripID']);
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
        $sql = "DELETE FROM TripContact WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
}
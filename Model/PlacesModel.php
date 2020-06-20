<?php
require_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class PlacesModel{
    private $ID;
    private $Name;
    
    public function __construct($Name) {
        $this->Name = $Name;
    }
    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->Name;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getAll(){
        $sql = "SELECT * FROM Places";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows>0){
            $Places = array();
            $x=0;
            while($row = mysqli_fetch_array($Result)){
                $Places[$x] = new PlacesModel($row['Name']);
                $Places[$x]->setID($row['ID']);
                $x++;
            }
            return $Places;
        }
        else{
            return null;
        }
    }
    public function Insert(){
        $sql = "INSERT INTO `Places`
                (`Name`)
                VALUES
                ('".$this->Name."')";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function Delete(){
        $sql = "DELETE FROM Places WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
}

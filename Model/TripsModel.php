<?php
require_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class TripsModel{
    private $ID;
    private $Name;
    private $TripPath;
    private $StartDate;
    private $EndDate;
    private $Days;
    private $Nights;
    private $Price;
    private $ImagePath;
    public function __construct($Name , $TripPath, $StartDate , $EndDate, $Days, $Nights, $Price , $ImagePath) {
        $this->Name = $Name;
        $this->TripPath = $TripPath;
        $this->StartDate = $StartDate;
        $this->EndDate = $EndDate;
        $this->Days = $Days;
        $this->Nights = $Nights;
        $this->Price = $Price;
        $this->ImagePath = $ImagePath;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function setImage($ImagePath){
        $this->ImagePath = $ImagePath;
    }
    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->Name;
    }
    public function getTripPath(){
        return $this->TripPath;
    }
    public function getStartDate(){
        return $this->StartDate;
    }
    public function getEndDate(){
        return $this->EndDate;
    }
    public function getDays(){
        return $this->Days;
    }
    public function getNights(){
        return $this->Nights;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function getImagePath(){
        return $this->ImagePath;
    }
    public function setTrip($Trip){
        $this->TripPath = $Trip;
    }
    public function Insert(){
        $sql = "INSERT INTO `Trips`
                (`Name`,
                `TripPath`,
                `StartDate`,
                `EndDate`,
                `Days`,
                `Nights`,
                `Price`, `ImagePath`)
                VALUES
                ('".$this->Name."' , '".$this->TripPath."', '".$this->StartDate."' , '".$this->EndDate."' , '".$this->Days."','".$this->Nights."' , '".$this->Price."' , '".$this->ImagePath."')";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function SelectAll(){
        $sql = "SELECT * FROM Trips";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Trips = array();
            $x=0;
            while ($row = mysqli_fetch_array($Result)){
                $Trips[$x] = new TripsModel($row['Name'], $row['TripPath'], $row['StartDate'], $row['EndDate'], $row['Days'], $row['Nights'], $row['Price'], $row['ImagePath']);
                $Trips[$x]->setID($row['ID']);
                $x++;
            }
            return $Trips;
        }
        else{
            return null;
        }
    }
    public function SelectByID(){
        $sql = "SELECT * FROM Trips WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $row = mysqli_fetch_array($Result);
            $Trip = new TripsModel($row['Name'], $row['TripPath'], $row['StartDate'], $row['EndDate'], $row['Days'], $row['Nights'], $row['Price'], $row['ImagePath']);
            $Trip->setID($row['ID']);
            return $Trip;
        }
        else{
            return null;
        }
    }
    public function Delete(){
        $sql = "DELETE FROM Trips WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function Edit(){
        $sql = "UPDATE `Trips`
                SET
                `Name` = '".$this->Name."',
                `TripPath` = '".$this->TripPath."',
                `StartDate` ='".$this->StartDate."',
                `EndDate` = '".$this->EndDate."',
                `Days` = '".$this->Days."',
                `Nights` = '".$this->Nights."',
                `Price` = '".$this->Price."'
                WHERE `ID` = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function EditWithImage(){
       $sql = "UPDATE `Trips`
                SET
                `Name` = '".$this->Name."',
                `TripPath` = '".$this->TripPath."',
                `StartDate` ='".$this->StartDate."',
                `EndDate` = '".$this->EndDate."',
                `Days` = '".$this->Days."',
                `Nights` = '".$this->Nights."',
                `Price` = '".$this->Price."',
                 `ImagePath` = '".$this->ImagePath."'
                WHERE `ID` = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function getCount(){
        $sql = "SELECT * FROM Trips";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        return $Result->num_rows;
    }
}

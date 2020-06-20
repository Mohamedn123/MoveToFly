<?php
require_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class ReviewsModel{
    private $ID;
    private $Name;
    private $Title;
    private $Body;
    private $Place;
    private $Date;
    private $Approved;
    private $Rating;
    public function __construct($Name , $Title, $Body , $Place , $Approved , $Rating) {
        $this->Name = $Name;
        $this->Title = $Title;
        $this->Body = $Body;
        $this->Place = $Place;
        $this->Approved = $Approved;
        $this->Rating = $Rating;
    }
    public function setID($ID) {
        $this->ID = $ID;
    }
    public function setDate($Date) {
        $this->Date = $Date; 
    }
    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->Name;
    }
    public function getTitle() {
        return $this->Title;
    }
    public function getBody(){
        return $this->Body;
    }
    public function getPlace(){
        return $this->Place;
    }
    public function getDate(){
        return $this->Date;
    }
    public function getApproved(){
        return $this->Approved;
    }
    public function getRating(){
        return $this->Rating;
    }
    public function Insert(){
        $Database = new DatabaseConnect();
        $sql = "INSERT INTO `Reviews`
                (`Name`,
                `Title`,
                `Body`,
                `Place`,
                `Approved`,
                `Rating`)
                VALUES
                ('".$this->Name."','".$this->Title."','".$this->Body."','".$this->Place."' , '".$this->Approved."' , ".$this->Rating.")";
        echo $sql;
        $Database->execute($sql);
    }
    public function getApprovedReviews(){
        $Database = new DatabaseConnect();
        $sql = "SELECT * FROM Reviews WHERE Approved = 1";
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Reviews = array();
            $x = 0;
            while ($row = mysqli_fetch_array($Result)){
                $Reviews[$x] = new ReviewsModel($row['Name'], $row['Title'], $row['Body'], $row['Place'], $row['Approved'] , $row['Rating']);
                $Reviews[$x]->setDate($row['Date']);
                $Reviews[$x]->setID($row['ID']);
                $x++;
            }
            return $Reviews;
        }
        else{
            return null;
        }
    }
    public function getNonApproved(){
        $Database = new DatabaseConnect();
        $sql = "SELECT * FROM Reviews WHERE Approved = 0";
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Reviews = array();
            $x = 0;
            while ($row = mysqli_fetch_array($Result)){
                $Reviews[$x] = new ReviewsModel($row['Name'], $row['Title'], $row['Body'], $row['Place'], $row['Approved'] , $Rating);
                $Reviews[$x]->setDate($row['Date']);
                $Reviews[$x]->setID($row['ID']);
                $x++;
            }
            return $Reviews;
        }
        else{
            return null;
        }
    }
    public function Approve(){
        $sql = "UPDATE `Reviews`
                SET `Approved` = 1
                WHERE `ID` = '".$this->ID."'
                ";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function Delete(){
        $sql = "DELETE FROM `Reviews`
                    WHERE ID = '".$this->ID."' ";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function getApprovedCount(){
        $Database = new DatabaseConnect();
        $sql = "SELECT * FROM Reviews WHERE Approved = 1";
        $Result = $Database->execute($sql);
        return $Result->num_rows;
    }
    public function getNonApprovedCount(){
        $Database = new DatabaseConnect();
        $sql = "SELECT * FROM Reviews WHERE Approved = 0";
        $Result = $Database->execute($sql);
        return $Result->num_rows;
    }
}
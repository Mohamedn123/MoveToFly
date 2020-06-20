<?php
include_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class GalleryModel{
    private $ID;
    private $Title;
    private $ImagePath;
    private $Description;
    public function __construct($Title , $ImagePath , $Description) {
        $this->Description = $Description;
        $this->ImagePath = $ImagePath;
        $this->Title = $Title;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getID(){
        return $this->ID;
    }
    public function getTitle(){
        return $this->Title;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function getImagePath(){
        return $this->ImagePath;
    }
    public function Insert(){
        $sql = "INSERT INTO `Gallery`
                (`Title`,
                `ImagePath`,
                `Description`)
                VALUES
                ('".$this->Title."' , '".$this->ImagePath."' , '".$this->Description."')";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function getAll(){
        $sql = "SELECT * FROM Gallery";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $Gallery = array();
            $x=0;
            while ($row = mysqli_fetch_array($Result)){
                $Gallery[$x] = new GalleryModel($row['Title'], $row['ImagePath'], $row['Description']);
                $Gallery[$x]->setID($row['ID']);
                $x++;
            }
            return $Gallery;
        }
        else{
            return null;
        }
    }
    public function Delete(){
        $sql = "DELETE FROM Gallery WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
}


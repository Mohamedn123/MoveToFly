<?php
include_once __DIR__.'/../Shared/Database/DatabaseConnect.php';
class UserModel{
    private $ID;
    private $Username;
    private $Password;
    private $Name;
    private $Email;
    private $Usertype;
    
    public function __construct($Username , $Password , $Name , $Email , $Usertype) {
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Usertype = $Usertype;
    }
    public function setID($ID) {
        $this->ID = $ID;
    }
    public function getID(){
        return $this->ID;
    }
    public function getUsername(){
        return $this->Username;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function getName(){
        return $this->Name;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getUsertype(){
        return $this->Usertype;
    }
    public function Insert(){
        $this->Password = password_hash($this->Password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `Users`
                (`Username`,
                `Password`,
                `Name`,
                `Email`,
                `Usertype`)
                VALUES
                ('".$this->Username."','".$this->Password."','".$this->Name."','".$this->Email."','".$this->Usertype."')";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function Check(){
        $sql = "SELECT * FROM Users WHERE Username = '".$this->Username."' OR Email = '".$this->Email."'";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function getAll(){
        $sql = "SELECT * FROM Users";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows>0){
            $User = array();
            $x=0;
            while ($row = mysqli_fetch_array($Result)){
                $User[$x] = new UserModel($row['Username'], $row['Password'], $row['Name'], $row['Email'], $row['Usertype']);
                $User[$x]->setID($row['ID']);
                $x++;
            }
            return $User;
        }
        else{
            return null;
        }
    }
    public function Delete(){
        $sql = "DELETE FROM `Users`
                WHERE ID = '".$this->ID."'";
        $Database = new DatabaseConnect();
        $Database->execute($sql);
    }
    public function Login(){
        $sql = "SELECT * FROM Users WHERE Username = '".$this->Username."' OR Email = '".$this->Username."'";
        $Database = new DatabaseConnect();
        $Result = $Database->execute($sql);
        if ($Result->num_rows > 0){
            $row = mysqli_fetch_array($Result);
            $Verify = password_verify($this->Password, $row['Password']);
            if ($Verify){
                $User = new UserModel($row['Username'], $row['Password'], $row['Name'], $row['Email'], $row['Usertype']);
                $User->setID($row['ID']);
                return $User;
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }
}
<?php
require_once __DIR__.'/../Model/TripContact.php';
if(isset($_POST['insert'])){
    $TripController = new TripContactController();
    $TripController->Insert();
}
if(isset($_GET['Delete'])){
    $TripController = new TripContactController();
    $TripController->Delete();
}
class TripContactController{
    public function Insert(){
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
        $TripID = $_POST['tripID'];
        $TripContact = new TripContact($Name, $Email, $Phone, $TripID);
        $TripContact->Insert();
        header("Location:../Packages.php?success");
        exit();
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $TripContact = new TripContact(null, null, null, null);
        $TripContact->setID($ID);
        $TripContact->Delete();
        header("Location:../Admin/ViewTripContact.php");
        exit();
    }
    public function GetAll(){
        $TripContact = new TripContact(null, null, null, null);
        $Contacts = $TripContact->SelectAll();
        return $Contacts;
    }
}

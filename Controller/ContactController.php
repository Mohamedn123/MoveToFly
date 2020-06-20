<?php
include_once __DIR__.'/../Model/ContactModel.php';
if(isset($_POST['insert'])){
    $ContactController = new ContactController();
    $ContactController->Insert();
}
if(isset($_GET['Delete'])){
    $ContactController = new ContactController();
    $ContactController->Delete();   
}
class ContactController{
    public function Insert(){
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
        $Title = $_POST['title'];
        $Body = $_POST['body'];
        $ContactModel = new ContactModel($Name, $Email, $Phone, $Title, $Body);
        $ContactModel->Insert();
        header("Location:../index.php");
        exit();
    }
    public function getAll(){
        $ContactModel = new ContactModel(null, null, null, null, null);
        $Contacts = $ContactModel->getAll();
        return $Contacts;
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $ContactModel = new ContactModel(null, null, null, null, null);
        $ContactModel->setID($ID);
        $ContactModel->Delete();
        header("Location:../Admin/ViewContact.php");
        exit();
    }
    public function getCount(){
         $ContactModel = new ContactModel(null, null, null, null, null);
         return $ContactModel->getContactCount();
    }
}
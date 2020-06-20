<?php
include_once __DIR__.'/../Model/PlacesModel.php';
if(isset($_POST['insert'])){
    $PlacesController = new PlacesController();
    $PlacesController->Insert();
}
if (isset($_GET['Delete'])){
    $PlacesController = new PlacesController();
    $PlacesController->Delete();
}
class PlacesController{
    public function getAll(){
        $PlacesModel = new PlacesModel(null);
        $Places = $PlacesModel->getAll();
        return $Places;
    }
    public function Insert(){
        $Place = $_POST['name'];
        $PlacesModel = new PlacesModel($Place);
        $PlacesModel->Insert();
        header("Location:../Admin/ManagePlaces.php");
        exit();
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $Places = new PlacesModel(null);
        $Places->setID($ID);
        $Places->Delete();
        header("Location:../Admin/ManagePlaces.php");
        exit();
        
    }
}

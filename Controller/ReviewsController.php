<?php
require_once __DIR__.'/../Model/ReviewsModel.php';

if(isset($_POST['insert'])){
    $ReviewsController = new ReviewsController();
    $ReviewsController->Insert();
}
if(isset($_GET['Delete'])){
    $ReviewsController = new ReviewsController();
    $ReviewsController->Delete();
}
if(isset($_GET['approve'])){
    $ReviewsController = new ReviewsController();
    $ReviewsController->Approve();
}
class ReviewsController{
    public function Insert(){
        $Name = $_POST['name'];
        $Title = $_POST['title'];
        $Place = $_POST['place'];
        $Body = $_POST['body'];
        $Rating = -1;
        if (isset($_POST['rating'])){
            $Rating = $_POST['rating'];
        }
        $ReviewsModel = new ReviewsModel($Name, $Title, $Body, $Place, 0 , $Rating);
        $ReviewsModel->Insert();
//        header("Location:../index.php");
//        exit();
    }
    public function getApproved(){
        $ReviewsModel = new ReviewsModel(null, null, null, null, null , null);
        $Reviews = $ReviewsModel->getApprovedReviews();
        return $Reviews;
    }
    public function getNonApproved(){
        $ReviewsModel = new ReviewsModel(null, null, null, null, null , null);
        $Reviews = $ReviewsModel->getNonApproved();
        return $Reviews;
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $ReviewsModel = new ReviewsModel(null, null, null, null, null,null);
        $ReviewsModel->setID($ID);
        $ReviewsModel->Delete();
        header("Location:../Admin/Reviews.php");
        exit();
    }
    public function Approve(){
        $ID = $_GET['approve'];
        $ReviewsModel = new ReviewsModel(null, null, null, null, null,null);
        $ReviewsModel->setID($ID);
        $ReviewsModel->Approve();
        header("Location:../Admin/Reviews.php");
        exit();
    }
    public function getApprovedCount(){
        $ReviewsModel = new ReviewsModel(null, null, null, null, null,null);
        $Count = $ReviewsModel->getApprovedCount();
        return $Count;
    }
    public function getNonApprovedCount(){
        $ReviewsModel = new ReviewsModel(null, null, null, null, null,null);
        $Count = $ReviewsModel->getNonApprovedCount();
        return $Count;
    }
}

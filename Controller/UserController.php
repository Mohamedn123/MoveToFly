<?php
require_once __DIR__.'/../Model/UserModel.php';
if(isset($_POST['insert'])){
    $UserController = new UserController();
    $UserController->insert();
}
if (isset($_GET['Delete'])){
    $UserController = new UserController();
    $UserController->Delete();
}
if(isset($_POST['login'])){
    $UserController = new UserController();
    $UserController->Login();
}
if(isset($_GET['logout'])){
    session_destroy();
    header("Location:../index.php");
    exit();
}
class UserController{
    public function insert(){
        $Name = $_POST['name'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Email = $_POST['email'];
        $Usertype = $_POST['usertype'];
        $UserModel = new UserModel($Username, $Password, $Name, $Email, $Usertype);
        $Check = $UserModel->Check();
        if ($Check){
            header("Location:../Admin/AddUser.php?error");
            exit();
        }
        else{
            $UserModel->Insert();
            header("Location:../Admin/ViewUsers.php");
            exit();
        }
    }
    public function getAll(){
        $UserModel = new UserModel(null, null, null, null, null);
        $Users = $UserModel->getAll();
        return $Users;
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $UserModel = new UserModel(null, null, null, null, null);
        $UserModel->setID($ID);
        $UserModel->Delete();
        header("Location:../Admin/ViewUsers.php");
        exit();
    }
    public function Login(){
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $UserModel = new UserModel($Username, $Password, null, null, null);
        $result = $UserModel->Login();
        if ($result == null){
            header("Location:../Admin/login.php?error");
            exit();
        }
        else{
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['ID'] = $result->getID();
            $_SESSION['Name'] = $result->getName();
            header("Location:../Admin/index.php");
            exit();  
        }
    }
}

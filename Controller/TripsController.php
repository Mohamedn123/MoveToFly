<?php
include_once __DIR__.'/../Model/TripsModel.php';
if(isset($_POST['insert'])){
    $TripController = new TripsController();
    $TripController->Insert();
}
if(isset($_GET['ID'])){
    $TripController = new TripsController();
    $TripController->SelectByID($_GET['ID']);
}
if(isset($_GET['Delete'])){
    $TripController = new TripsController();
    $TripController->Delete();
}
if(isset($_POST['edit'])){
    $TripController = new TripsController();
    $TripController->Edit();
}
class TripsController{
    public function Insert(){
        $TripName = $_POST['name'];
        $Description = $_POST['editordata'];
        $StartDate = $_POST['startDate'];
        $EndDate = $_POST['endDate'];
        $Days = $_POST['days'];
        $Nights = $_POST['nights'];
        $Price = $_POST['price'];
        $ImagePath = $this->UploadImage();
        $TripsModel = new TripsModel($TripName, $Description, $StartDate, $EndDate, $Days, $Nights, $Price, $ImagePath);
        $TripsModel->Insert();     
        header("Location:../Admin/ViewAllPackages.php");
        exit();
    }
    public function UploadImage(){
        if (isset($_FILES['image'])){
            $file = $_FILES['image'];

            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];


            $file_ext = explode('.' , $file_name);
            $file_ext = strtolower(end($file_ext));

            $allowed = array('jpeg' , 'jpg' , 'png');

            if (in_array($file_ext , $allowed) && $file_error === 0){
                $file_name_new = uniqid('' , true) . '.' . $file_ext;
                $file_destination = '../Shared/Trips/TripsPictures/'.$file_name_new;
                if (move_uploaded_file($file_temp , $file_destination)){
                    return "Shared/Trips/TripsPictures/".$file_name_new;
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
    public function getAll(){
        $TripsModel = new TripsModel(null, null, null, null, null, null, null, null);
        $Trips = $TripsModel->SelectAll();
        return $Trips;
    }
    public function SelectByID($ID){
        $TripModel = new TripsModel(null, null, null, null, null, null, null, null);
        $TripModel->setID($ID);
        $Result = $TripModel->SelectByID();
        if ($Result==null){
            header("Location:../Packages.php");
            exit();
        }
        else{
            return $Result;
        }
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $TripModel = new TripsModel(null, null, null, null, null, null, null, null);
        $TripModel->setID($ID);
        $Trip = $TripModel->SelectByID();
        $this->DeleteImage("../".$Trip->getImagePath());
        $TripModel->Delete();
        header("Location:../Admin/ViewAllPackages.php");
        exit();
    }
    public function DeleteImage($ImagePath){
        unlink($ImagePath);
    }
    public function Edit(){
        $ID = $_POST['ID'];
        $TripName = $_POST['name'];
        $Description = $_POST['editordata'];
        $StartDate = $_POST['startDate'];
        $EndDate = $_POST['endDate'];
        $Days = $_POST['days'];
        $Nights = $_POST['nights'];
        $Price = $_POST['price'];
        $TripsModel = new TripsModel($TripName, $Description, $StartDate, $EndDate, $Days, $Nights, $Price, null);
        $TripsModel->setID($ID);
        if($_FILES['image']['error'] == 0){
            $TempTrip = $TripsModel->SelectByID();
            $this->DeleteImage("../".$TempTrip->getImagePath());
            $TripsModel->setImage($this->UploadImage());
            $TripsModel->EditWithImage();
        }
        else{
            $TripsModel->Edit();
        }
        
        header("Location:../Admin/ViewAllPackages.php");
        exit();
    }
    public function getCount(){
        $TripsModel = new TripsModel(null, null, null, null, null, null, null, null);
        return $TripsModel->getCount();
    }

}
<?php
require_once __DIR__.'/../Model/GalleryModel.php';
if(isset($_POST['insert'])){
    $GalleryController = new GalleryController();
    $GalleryController->insert();
}
if(isset($_GET['Delete'])){
    $GalleryController = new GalleryController();
    $GalleryController->Delete();
}
class GalleryController{
    public function insert(){
        $Title = $_POST['title'];
        $Description = $_POST['description'];
        $ImagePath = $this->UploadImage();
        $GalleryModel = new GalleryModel($Title, $ImagePath, $Description);
        $GalleryModel->Insert();
        header("Location:../Admin/ViewAllGallery.php");
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
                $file_destination = '../Shared/Gallery/'.$file_name_new;
                if (move_uploaded_file($file_temp , $file_destination)){
                    return "Shared/Gallery/".$file_name_new;
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
    public function selectAll(){
        $GalleryModel = new GalleryModel(null, null, null);
        $GalleryItems = $GalleryModel->getAll();
        return $GalleryItems;
    }
    public function Delete(){
        $ID = $_GET['Delete'];
        $GalleryModel = new GalleryModel(null, null, null);
        $GalleryModel->setID($ID);
        $GalleryModel->Delete();
        header("Location:../Admin/ViewAllGallery.php");
        exit();
    }

}
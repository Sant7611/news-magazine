<?php  
$id = $_GET['id'];
include('../class/catagory.class.php');
$catagoryObject = new Catagory();

$catagoryObject->set('id', $id);

$status = $catagoryObject->delete();
@session_start();

if($status = "success"){
    $_SESSION['message'] = "Category Deleted Successfully!";
    header('location: listCatagory.php');
}else{
    $_SESSION['message'] = "Failed to delete Category!";
    header('location: listCatagory.php');
}

?>
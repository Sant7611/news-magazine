<?php
$catagoryName = $_POST['catagoryName'];

$con = mysqli_connect('localhost', 'root', '','news_magazine');
$sql = "select * from catagory where name = '$catagoryName' limit 1";

$var = $con->query($sql);

if($var){
    echo"Already taken";
}else{
    echo"success";
}

?>
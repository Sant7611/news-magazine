<?php
$catagoryName = $_POST['catagoryName'];

$con = mysqli_connect('localhost', 'root', '','news_magazine');
$sql = "select * from catagory where name = '$catagoryName' ";

$var = $con->query($sql);

?>
<?php
session_start();
require('connection.php');
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone=$_POST['phone'];
$quant=$_POST['quantity'];
$ty=$_POST['type1'];
$file=$_FILES['photo'];
$filename=$file['name'];
$fileerror=$file['error'];
$filetemp=$file['tmp_name'];
$fileext=explode('.',$filename);
$filecheck=strtolower(end($fileext));
$fileextstored=array('png','jpg','jpeg');
$desc=$_POST['description'];

if(in_array($filecheck,$fileextstored)){
	
	$destination='../upload/'.$filename;
	move_uploaded_file($filetemp,$destination);
	$sel=mysqli_query($con,"INSERT INTO `available` (`id`,`email`,`date`,`qnty`,`type`,`photo`,`product_desc`) VALUES ('','$email', NOW(),'$quant','$ty','$destination','$desc')") or die(mysqli_error($con)); 
     header("location:available.php?reg=success");

}
    header("location:available.php?reg=fail");
}
?>

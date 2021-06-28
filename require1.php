<?php
require('connection.php');
session_start();
if(isset($_POST['submit'])){
$email = $_POST['email'];
$address=$_POST['address'];
$name = $_POST['name'];
$phone=$_POST['phone'];
$quan=$_POST['quantity'];
$ty=$_POST['type1'];
$desc=$_POST['description'];
$_SESSION['email']=$email;
$sel=mysqli_query($con,"INSERT INTO `requested_item` (`email`, `username`, `address`, `phone`,`date`,`qnty`,`type`,`prod_desc`) VALUES ('$email', '$name', '$address', '$phone',NOW(),'$quan','$ty','$desc')") or die(mysqli_error($con)); 
header("location:require.php?reg=success");
}
?>

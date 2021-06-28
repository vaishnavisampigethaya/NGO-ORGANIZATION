<?php
session_start();
require('connection.php');
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['cpassword'];
if($password!=$confirm)
{
	header("location:register.php?reg=fail");
}else{
$newpass=md5($password);
$sel=mysqli_query($con,"INSERT INTO `donar` (`email`, `username`, `address`, `password`,'phone','photo','id_proof') VALUES ('$firstname', '$lastname', '$email', '$newpass')") or die(mysqli_error($con)); 
header("location:register.php?reg=success");
}
?>


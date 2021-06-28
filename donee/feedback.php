<?php
session_start();
require('connection.php');
if(isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$feed=$_POST['feed'];
	mysqli_query($con,"INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES ('', '$name', '$feed')") or die(mysqli_error($con)); 
header("location:contact.php?reg=success");	
}

?>
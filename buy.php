<?php 
require('connection.php');
session_start();
if (isset($_POST['submit1']))
 {
	
	global $email,$add,$pho,$qn,$type,$des;
$id = $_POST['id'];

$qn=$_POST['quantity'];
$destination=$_POST['photo'];
$email=$_POST['email'];
	$type=$_POST['type'];
	$des=$_POST['product'];	
	$qnt=$_POST['qn'];
 $re = mysqli_query($con, "select * from `donee` where email='$_SESSION[email]'");
 while($row=mysqli_fetch_array($re)){
   $user=$row['username'];
	$add=$row['address'];
	$pho=$row['phone'];
 }
 if(($qnt-$qn)==0){
  $sel=mysqli_query($con,"INSERT INTO `donated_item` (`id`,`email`,`username`,`address`,`phone`,`date`,`qnty`,`type`,`prod_photo`,`product_desc`,`donar_name`) 
  VALUES ('','$_SESSION[email]','$user','$add','$pho', NOW(),'$qn','$type','$destination','$des','$email')") or die(mysqli_error($con)); 
  mysqli_query($con,"delete from `available` where id='$id' ");
  header("location:require.php");
  
 }else if(($qnt-$qn)>0){
	 $q=$qnt-$qn;
	 mysqli_query($con,"update `available` SET qnty='$q' where id='$id' ");
	 $sel=mysqli_query($con,"INSERT INTO `donated_item` (`id`,`email`,`username`,`address`,`phone`,`date`,`qnty`,`type`,`prod_photo`,`product_desc`,`donar_name`) 
  VALUES ('','$_SESSION[email]','$user','$add','$pho', NOW(),'$qn','$type','$destination','$des','$email')") or die(mysqli_error($con)); 
  header("location:require.php");
	 
	 
 }else if(($qnt-$qn)<0){
	 $q=$qn-$qnt;
	 $sel=mysqli_query($con,"INSERT INTO `donated_item` (`id`,`email`,`username`,`address`,`phone`,`date`,`qnty`,`type`,`prod_photo`,`product_desc`,`donar_name`) 
  VALUES ('','$_SESSION[email]','$user','$add','$pho', NOW(),'$qnt','$type','$destination','$des','$email')") or die(mysqli_error($con)); 
  mysqli_query($con,"INSERT INTO `requested_item` (`email`, `username`, `address`, `phone`,`date`,`qnty`,`type`,`prod_desc`) VALUES ('$_SESSION[email]', '$user', '$add', '$pho',NOW(),'$q','$type','$des')") or die(mysqli_error($con));
  mysqli_query($con,"delete from `available` where id='$id' "); 
  header("location:require.php");
	 
 }else{
	 
 }
 }
?>
	
	

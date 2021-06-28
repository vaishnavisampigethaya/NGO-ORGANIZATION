<?php 
require('connection.php');
session_start();
if (isset($_POST['submit1']))
 {
	
	global $email,$add,$pho,$qn,$type,$des;
$id = $_POST['id'];
$file=$_FILES['photo'];
$filename=$file['name'];
$fileerror=$file['error'];
$filetemp=$file['tmp_name'];
$fileext=explode('.',$filename);
$filecheck=strtolower(end($fileext));
$fileextstored=array('png','jpg','jpeg');
 $re = mysqli_query($con, "select * from `requested_item` where id='$id'");
 while($row=mysqli_fetch_array($re)){
   $email=$row['email'];
	$add=$row['address'];
	$pho=$row['phone'];
	$qn=$row['qnty'];
	$type=$row['type'];
	$des=$row['prod_desc'];	
 }
	if(in_array($filecheck,$fileextstored)){
	$destination='../upload/'.$filename;
	move_uploaded_file($filetemp,$destination);
  $sel=mysqli_query($con,"INSERT INTO `available` (`id`,`email`,`date`,`qnty`,`type`,`photo`,`product_desc`) 
  VALUES ('','$_SESSION[email]',NOW(),'$qn','$type','$destination','$des')") or die(mysqli_error($con)); 
  mysqli_query($con,"delete from `requested_item` where id='$id' ");
  header("location:available.php");
  
 }
 }
?>
	
	

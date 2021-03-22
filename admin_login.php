<?php
session_start();
include 'config.php';
if(isset($_POST['login']))
{
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM admin WHERE username='$user' AND password='$pass'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count==1)
	{     $row=mysqli_fetch_array($res);
	      $_SESSION['admin']=$row['username'];
	      header('location:admin.php');
	}
}
?>
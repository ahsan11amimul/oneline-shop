<?php 
session_start();
require 'config.php';

if(isset($_POST['userlogin']))
			 {
			 	$user=$_POST['user_name'];
			 	$password=$_POST['user_pass'];
			 	$sql="SELECT * FROM users WHERE username='$user' AND password='$password'";
			 	$result=mysqli_query($con,$sql);
			    $count=mysqli_num_rows($result);
			    if($count==1)
			    {
			    	$row=mysqli_fetch_array($result);
			    	$_SESSION['username']=$row['username'];
			    	$_SESSION['password']=$row['password'];
			    	$_SESSION['user_id'] =$row['user_id'];
			    	echo "success";
			    }
			  else
			 {
			 	echo "Invalid username or password";
			 }

			 }
?>
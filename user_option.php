<?php
 session_start();
 include 'config.php';
 if(!isset($_SESSION['user_id']))
{
	header('location:index.php');
}
    
	
if(isset($_POST['opt1']))
{   $user_id=$_SESSION['user_id'];
   
	$sql="SELECT total FROM order_menu WHERE user_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
    $total=0;
	if($count>0)
	{
		while($rows=mysqli_fetch_array($result))
		{
         $total+=$rows['total'];

		}
		echo "You have to pay: ".$total." Tk only ";
	}
}
if(isset($_POST['opt2']))
{  
	$user_id=$_SESSION['user_id'];
   
	$sql="SELECT amount FROM users WHERE user_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	$balance=0;
	
	if($count>0)
	{
		while($rows=mysqli_fetch_array($result))
		{
         $balance=$rows['amount'];

		}
		echo "Your current balance: ".$balance." Tk only ";
	}
}
if(isset($_POST['opt3']))
{  
    $user_id=$_SESSION['user_id'];
   
	$sql="SELECT amount FROM users WHERE user_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	$balance=0;
	
	if($count>0)
	{
		while($rows=mysqli_fetch_array($result))
		{
         $balance=$rows['amount'];

		}
		
	}
	$sql="SELECT total FROM order_menu WHERE user_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
    $total=0;
	if($count>0)
	{
		while($rows=mysqli_fetch_array($result))
		{
         $total+=$rows['total'];

		}
		
	}
	$current=$balance-$total;
	$date=date('Y-m-d');
	
	$sql="INSERT INTO orders(user_id,total_price,order_date)
	 VALUES('$user_id','$current','$date')";
	 $result=mysqli_query($con,$sql);
	 if($result)
	 {
	 	//echo "Your Current Balance now: ".$current ." Tk Thanks for with us";
	 	$sql="UPDATE users SET amount='$current' WHERE user_id='$user_id'";
	 	$result=mysqli_query($con,$sql);
	 	if($result)
	 	{
	 		echo "Your Current Balance now: ".$current ." Tk Thanks for with us";
	 	}
	 }
	 else
	 {
	 	echo "Error::";
	 }

	
   

}
?>
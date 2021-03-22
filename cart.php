<?php
 session_start();
 include 'config.php';
 if(!isset($_SESSION['user_id']))
{
	header('location:index.php');
}
echo "Stay With us!!";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</head>


	<body>
		<!-- Navigation start-->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a  class="navbar-brand" href="">Online Shopping</a>
					
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href=""><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="">About</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown"href=""><span class="glyphicon glyphicon-earphone"></span>Contact
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="">01721-544957</a></li>
								<li><a href="">amimul.ahsan654@gmail.com</a></li>
								
							</ul>
					</li>
					<li><a href="">Products</a></li>
					<li><input style="width: 160px;left: 10px;top: 10px;" type="text" class="form-control" placeholder="Search" id="keys"></li>
					<li style="left: 20px;top: 10px;"><button class="btn btn-default" id="search">Search</button></li>
					
				</ul>
			     <ul class="nav navbar-nav navbar-right">
				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user caret"></span><?php echo "Hi:".$_SESSION['username'];?></a>
                     	<ul class="dropdown-menu">
                     		<li><a href="cart.php"><span class="glyphicon-shopping-cart"></span>Cart</a></li>
                     		<li><a href=""><span class="glyphicon glyphicon-thumbs-up"></span>Change Password</a></li>
                     		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
                     	</ul>
                     </li>
                 </ul>

			</div>
		</nav>
<!-- my design		-->
<div class="container-fluid">
	<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" id="user_msg">
					
				</div>
				<div class="col-sm-2"></div>
			</div>
	<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<h2>user's option</h2>
	  <a href="#" class="btn btn-info total_amount" role="button">Total Amount:</a>
	  <a href="#" class="btn btn-info total_balance" role="button">Your Balance:</a>
	  <a href="#" class="btn btn-info order_now" role="button">Order Now:</a>
	  <a href="user.php" class="btn btn-info" role="button">Update</a>
	  
			</div>
	</div>
		<div class="col-sm-2"></div>
	
</div>
<!-- my design		-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" id="delete_msg">
					
				</div>
				<div class="col-sm-2"></div>
			</div>
			
	

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="panel panel-info">
						<div class="panel-heading">Your's Order Details</div>
					
				        <div class="panel-body">
							<div class="row">
								<div class="col-sm-3">Action</div>
								<div class="col-sm-3">Product name</div>
								<div class="col-sm-2">Product Price</div>
								<div class="col-sm-2">Quantity</div>
								<div class="col-sm-2">Total Cost:</div>
								
							</div>
							<div id="check_out"></div>
							<!--<div class="row">
								<div class="col-sm-3">
									<div class="btn-group">
										<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span></a>
										
									</div>
								</div>
								<div class="col-sm-3"><input type="text" class="form-control" name="product" readonly></div>
								<div class="col-sm-2"><input type="text" class="form-control" name="price"readonly disabled></div>
								<div class="col-sm-2"><input type="text" class="form-control" name="quantity" ></div>
								<div class="col-sm-2"><input type="text" class="form-control" name="total" readonly></div>
								
							</div>
						-->
	

							
						
						<div class="panel-footer"></div>
							
						
						
					</div>
				</div>
				<div class="col-sm-2"></div>
					
				
				
			</div>
			
		</div>
	</body>
</html>

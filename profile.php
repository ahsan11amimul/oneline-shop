<?php
session_start();
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
				<!--<form class="navbar-form navbar-left" action="#">
                    <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                      <div class="input-group-btn">
	                        <button class="btn btn-default" type="submit" id="search">
	                        <i class="glyphicon glyphicon-search"></i>
	                        </button>
                      </div>
                    </div>
                </form>
            -->
				<ul class="nav navbar-nav navbar-right">
					<li><a  id="cart_container" class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span class="badge">0</span></a>
						<div class="dropdown-menu" style="width: 550px;">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Sl:no</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Product Price</div>
										<div class="col-md-3">Product quantity</div>
											
									</div>
								</div>
								<div class="panel-body">
									<div id="cart_product"></div>	
									<!--<div class='row'>
										<div class='col-md-3'>Product Name</div>
										<div class='col-md-3'>Product Image</div>
										<div class='col-md-3'>Product Price</div>
										<div class='col-md-3'>Product quantity</div>
											
									</div>	
								-->
								
									
								</div>
								<div class="panel-footer"></div>
									
								
								
							</div>
							
						</div>


					</li>
                     
                     	
                    
                     <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user caret"></span><?php echo "Hi:".$_SESSION['username'];?></a>
                     	<ul class="dropdown-menu">
                     		<li><a href="cart.php"><span class="glyphicon-shopping-cart"></span>Cart</a></li>
                     		<li><a href=""><span class="glyphicon glyphicon-thumbs-up"></span>Change Password</a></li>
                     		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
                     		<!--
                     	 <div style="width: 300px;">
                     		<div class="panel panel-primary">
                     			<div class="panel-heading">Login</div>
                     			<div class="panel panel-heading">
                     				
                     						<label for="username">UserName:</label>
                                            <input type="username" class="form-control" id="username" name="username" required>
                     					
                     					
                     						<label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <p><br></p>
                     					
                     					<a href="#" style="text-decoration: none;color: orange;">Forgot password</a>
                     					
    
                                           <div class="checkbox" style="float: right;">
                                              <label><input type="checkbox"> Remember me</label>
                                            </div>
                                       
  
                                      
                                          <button style="float: right;" type="submit" class="btn btn-danger" name="login" id="login">Login</button>
    		                          
  
                     					
                     				</form>
                     				
                     			</div>
                     			<div class="panel-footer" id="e_msg"></div>
                     				
                     			
                     			
                     		</div>
                     	</div>
                     -->
                     </ul>
                    </li>
                </ul>
				
			</div>
			
		</nav>
		<!-- navigation end-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-2">
					<h3 style="text-align: center;padding: 20px;color: white;background: rgb(11,111,222);">Categories</h3>
                    <div id="get_category"></div>
                    <!--
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="">Category1</a></li>
						<li ><a href="">Category1</a></li>
						<li ><a href="">Category2</a></li>
						<li ><a href="">Category3</a></li>
						
						
					</ul>
                -->
				</div>	
					
				<div class="col-sm-8" >
					<h3 style="text-align: center;padding: 20px;color: white;background: orange;">Products </h3>
					<div class="row">
						<div class="col-sm-12" id="product_msg">
							
						</div>
						
					</div>
					<div class="panel panel-info">
                        <div class="panel-heading">Products details</div>
                        <div class="panel-body">
                        	<div id="get_product"></div>
                        	<!--<div class="col-sm-4">
                        		<div class="panel panel-info">
                        			<div class="panel-heading">Banana</div>
                        			<div class="panel-body"><img src="images/banana.jpg"></div>
                        			<div class="panel-footer">Tk-10
                        				<button style="float: right" class="btn btn-danger">AddToCart
                        				</button>
                        				
                        			</div>
                        		</div>
                        	</div>
                            -->
                        </div>
                        <div class="panel-footer">&copy;2018</div>
                    </div>
				</div>
				<div class="col-sm-1"></div>
				
				
				
			</div>
			
			
		</div>




	</body>
</html>

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
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="">About</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown"href=""><span class="glyphicon glyphicon-earphone"></span>Contact
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="">01721-544957</a></li>
								<li><a href="">amimul.ahsan654@gmail.com</a></li>
								
							</ul>
					</li>
					<li><a href="index.php">Products</a></li>
					
				</ul>
			</div>
		</nav>
		<!-- nav end-->
		<div class="container-fluid">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-6" id="sign_up_msg"></div>
        <div class="col-sm-2"></div>
        
      </div>
		<div style="width: 400px;">
                            <div class="panel panel-primary">
                                <div class="panel-heading">SignUp</div>
                                <div class="panel panel-body">
                                  <div id="sign_up"></div>
                                    <form class="form-horizontal"method="post">
                                          <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                           </div>
                                        
                                         <div class="form-group">
                                            <label for="username">UserName:</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                       
                                         <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                        </div>
                                       
                                         <div class="form-group">
                                            <label for="phone">Phone Number:</label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="amount">Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" min="5000" max="1000000" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="regi_date">Sign_Up_Date:</label>
                                            <input type="text" class="form-control" id="regi_date" name="regi_date" readonly value="<?php echo  date('Y-m-d');?>">
                                            
                                        </div>
                                        
  
                                        <div class="form-group"> 
                                          <button style="float: right;" type="submit" class="btn btn-danger" name="sign" id="sign">Sign Up</button>
                                        </div>
  
                                        
                                    </form>
                                    
                                </div>
                                <div class="panel-footer"></div>
                                    
                                
                                
                            </div>
                        </div>
                 </div>
	</body>
</html>
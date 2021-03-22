<?php   
  session_start();
  include 'config.php';
  if(isset($_SESSION['admin']))
  {
    echo "Welcome mr:".$_SESSION['admin']." How are you today";
    
  }
  else
    {
      header('location:index.php');
    }
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="admin.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    <li><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Users<span class="badge"></span></a>
	  <ul class="dropdown-menu">
      <li class="dropdown-header">All Registered Users</li>
      <ul id="user_list">
      	<li><a href='admin_action.php?user_id='></a></li>
      	
      </ul>
  </ul>

 </li>
  <li><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Products<span class="badge"></span></a>
	 <ul class="dropdown-menu">
      <li class="dropdown-header">All Product List</li>
      <ul id="product_list"></ul>
      	
     </ul>

 </li>
    <li><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Categories<span class="badge"></span></a>
	  <ul class="dropdown-menu">
      <li class="dropdown-header">All Categories</li>
      <ul id="category_list">
      	
      	
      </ul>
      
  
       </ul>
   </li>
 </ul>    
 <form class="navbar-form navbar-left" action="admin_action.php">
      <div class="form-group">
       <span style="font-weight: bold;font-size: 23px;color: white;">Products:</span> <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="order.php"> Orders<span class="glyphicon glyphicon-user badge"></span></a></li>
      <li><a href="admin_logout.php"><span class="glyphicon glyphicon-hand-right"></span> Logout</a></li>
    </ul>
  </div>
</nav>
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
        <h2>Admin's Choice</h2>
    <a href="#" class="btn btn-info total_amount" role="button">Add Product:</a>
    <a href="#" class="btn btn-info total_balance" role="button">Comments:</a>
    <a href="#" class="btn btn-info order_now" role="button">Add Category:</a>

    
      </div>
  </div>
    <div class="col-sm-2"></div>
  
</div>

<div class="container-fluid">

  ​ <table class="table table-hover">
    <thead>
      <tr>
        <th>Product_id</th>
        <th>Product_name</th>
        <th>Category_id</th>
        <th>Image</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Added</th>
      </tr>
    </thead>
    <tbody id="get_product">
      
    </tbody>
  </table>
 
</div>
<div class="container-fluid">

  ​ <table class="table table-hover">
    <thead>
      <tr>
        <th>User_id</th>
        <th>Name</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Address</th>
         <th>Amount</th>
        <th>Sign_up_date</th>
      </tr>
    </thead>
    <tbody id="get_user">
      
    </tbody>
  </table>
 
</div>


</body>
</html>

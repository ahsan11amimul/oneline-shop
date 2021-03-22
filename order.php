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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Order Details</h2>
    
  <table class="table table-hover">
    <thead>
      <tr>
        <th>UserName</th>
        <th>Balance</th>
        <th>Address</th>
        <th>Phone</th>
        <th>ProductName</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Total</th>
        <th>Order_date</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$sql='SELECT users.username,users.amount,users.address,users.phone,order_menu.product_name,order_menu.quantity,order_menu.price,orders.total_price,orders.order_date FROM users JOIN order_menu ON users.user_id=order_menu.user_id JOIN orders ON order_menu.user_id=orders.user_id';
    	$result=mysqli_query($con,$sql);
    	$count=mysqli_num_rows($result);
    	$i=0;
    	if($count>0)
    	{
    		while($rows=mysqli_fetch_array($result))
    		{   echo "<tr>";
    	        $i++;
    			$username=$rows['username'];
    			$balnce=$rows['amount'];
    			$address=$rows['address'];
    			$phone=$rows['phone'];
    			$product_name=$rows['product_name'];
    			$quantity=$rows['quantity'];
    			$price=$rows['price'];
    			$total_price=$rows['total_price'];
    			$order_date=$rows['order_date'];
    			echo " <td>$username</td>
    			<td>$balnce</td>
    			<td>$address</td>
    			<td>$phone</td>
    			<td>$product_name</td>
    			<td>$quantity</td>
    			<td>$price</td>
    			<td>$total_price</td>
    			<td>$order_date</td>
    			";
    			echo "</tr>";
    		}
    		$_SESSION['count']=$i;
    	}
    	?>
      <tr>
       </tr>
    </tbody>
  </table>
</div>

</body>
</html>

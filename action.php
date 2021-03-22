    <?php   
            session_start();
            include 'config.php';
            if(isset($_POST['category']))
			{	
				$sql="SELECT * FROM categories";
				$result=mysqli_query($con,$sql);
			
			    if(mysqli_num_rows($result)>0)
			  {   
				echo "<ul class='nav nav-pills nav-stacked'> ";

				while($row=mysqli_fetch_array($result))
				{
					$cat_id=$row['cat_id'];
					$cat_name=$row['cat_name'];
                   echo "<li ><a  class='category' cid='$cat_id' href='#'>$cat_name</a></li>";
                } 
				 echo "</ul>";
			   } 	
	         }
			
			 if(isset($_POST['product']))
			{
			 	$sql=" SELECT * FROM products";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['product_id'];
			 			$name=$row['product_name'];
			 			$id=$row['product_id'];
			 			$c_id=$row['cat_id'];
			 			$image=$row['product_image'];
			 			$price=$row['product_price'];
			 			$date=$row['added'];

			 			echo "<div class='col-sm-4'>
                        		<div class='panel panel-info'>
                        			<div class='panel-heading'>$name</div>
                        			<div class='panel-body'><img class='img-responsive' src='images/$image'></div>
                        			<div class='panel-footer'>Tk-$price
                        				<button  pid='$id'style='float: right' id='p_cart' class='btn btn-danger btn-sm'>AddToCart
                        				</button>
                        				
                        			</div>
                        		</div>
                        	</div>
                            ";
			 		}
			 	}
			 }
			 if(isset($_POST['get_selected_product']))
			 {
              $cid=$_POST['cat_id'];
              $sql=" SELECT * FROM products WHERE cat_id=$cid";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['product_id'];
			 			$name=$row['product_name'];
			 			$id=$row['product_id'];
			 			$c_id=$row['cat_id'];
			 			$image=$row['product_image'];
			 			$price=$row['product_price'];
			 			$date=$row['added'];

			 			echo "<div class='col-sm-4'>
                        		<div class='panel panel-info'>
                        			<div class='panel-heading'>$name</div>
                        			<div class='panel-body'><img class='img-responsive' src='images/$image'></div>
                        			<div class='panel-footer'>Tk-$price
                        				<button  pid='$id'style='float: right' id='p_cart' class='btn btn-danger btn-sm'>AddToCart
                        				</button>
                        				
                        			</div>
                        		</div>
                        	</div>
                            ";
			 		}
			 	}



			 }
			 if(isset($_POST['search']))
			 {
              $name=$_POST['name'];
              echo $name;
              $sql="SELECT * FROM products WHERE product_name LIKE '%$name%' ";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['product_id'];
			 			$name=$row['product_name'];
			 			$id=$row['product_id'];
			 			$c_id=$row['cat_id'];
			 			$image=$row['product_image'];
			 			$price=$row['product_price'];
			 			$date=$row['added'];

			 			echo "<div class='col-sm-4'>
                        		<div class='panel panel-info'>
                        			<div class='panel-heading'>$name</div>
                        			<div class='panel-body'><img class='img-responsive' src='images/$image'></div>
                        			<div class='panel-footer'>Tk-$price
                        				<button  pid='$id'style='float: right' id='p_cart' class='btn btn-danger btn-sm'>AddToCart
                        				</button>
                        				
                        			</div>
                        		</div>
                        	</div>
                            ";
			 		}
			 	}
			 	else
			 	{
			 		echo "No result found";
			 	}



			 }




			 if(isset($_POST['addProduct']))
			 {
			 	$product_id=$_POST['pro_id'];
			 	$user_id=$_SESSION['user_id'];
			 	echo $user_id;
			 	$sql="SELECT * FROM order_menu WHERE product_id='$product_id' AND user_id='$user_id'";
			 	$result=mysqli_query($con,$sql);
			 	$count=mysqli_num_rows($result);
			 	if($count>0)
			 	{
			 		echo "Item allready added to your menu";
			 	}
			 	else
			 	{
			 		$sql="SELECT * FROM products WHERE product_id='$product_id'";
			 		$result=mysqli_query($con,$sql);
			 		$row=mysqli_fetch_array($result);
			 		$product_id=$row['product_id']; 
			 		$user_id=$_SESSION['user_id'];
			 		$product_name=$row['product_name']; 
			 		$quantity=1;
			 		$price=$row['product_price'];
			 		
			 		$total=$quantity*$price;
			 	   
			 		$sql="INSERT INTO order_menu (product_id,user_id,product_name,quantity,price,total)
			 		VALUES('$product_id','$user_id','$product_name','$quantity','$price','$total')";
			 		$result=mysqli_query($con,$sql);
			 		if($result)
			 		{
			 			echo "<div class='alert alert-success alert-dismissible'>
						    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    <strong>Product is added successfully</strong> 
						  </div>
						</div>";
			 		}
			 	}
			 }
			 if(isset($_POST['get_cart']))
			 {
			 	$user_id=$_SESSION['user_id'];
			 	
			 	$sql="SELECT * FROM order_menu WHERE user_id= '$user_id'";
			 	$result=mysqli_query($con,$sql);
			 	$count=mysqli_num_rows($result);
			 	$i=1;
			 	if($count>0)
			 	{  
			 		while($row=mysqli_fetch_array($result))
			 		{ 
			 			$product_name=$row['product_name'];
			 			$product_price=$row['price'];
			 			$quantity=$row['quantity'];

			 			echo " <div class='row'>
										<div class='col-md-3'>$i</div>
										<div class='col-md-3'>$product_name</div>
										<div class='col-md-3'>$product_price</div>
										<div class='col-md-3'>$quantity</div>
											
									</div>	";
									$i++;

			 		}
			 	}
			 }


			 if(isset($_POST['check']))
			 {
			 	$user_id=$_SESSION['user_id'];
			 	
			 	$sql="SELECT * FROM order_menu WHERE user_id= '$user_id'";
			 	$result=mysqli_query($con,$sql);
			 	$count=mysqli_num_rows($result);
			 	$i=1;
			 	$total_amount=0;
			 	if($count>0)
			 	{  
			 		while($row=mysqli_fetch_array($result))
			 		{   $product_id=$row['product_id'];
			 			$product_name=$row['product_name'];
			 			$product_price=$row['price'];
			 			$quantity=$row['quantity'];
			 			$total=$row['total'];
			 			$total_amount=$total+$total_amount;

			 			echo "<div class='row'>
								<div class='col-sm-3'>
									<div class='btn-group'>
										<a href='#' remove_id='$product_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash '></span></a>
										<a href='#' update_id='$product_id' class='btn btn-success update'><span class='glyphicon glyphicon-ok-sign'></span></a>
										
									</div>
								</div>
								<div class='col-sm-3'><input type='text' class='form-control' name='product' value='$product_name'readonly></div>
								<div class='col-sm-2'><input type='text' class='form-control price' 
								pid='$product_id' name='price' id='price-$product_id' value='$product_price'readonly disabled></div>
								<div class='col-sm-2'><input type='text' class='form-control quantity' name='quantity' pid='$product_id'  id='quantity-$product_id' value='$quantity'></div>
								<div class='col-sm-2'><input type='text' class='form-control total' 
								pid='$product_id' name='total'  id='total-$product_id' value='$total'readonly></div>
							
								
							</div>";








			 			

			 		}
			 		
			 	}
			 }
			 
        if(isset($_POST['removeFromCart']))
        {
        	$user_id=$_SESSION['user_id'];
        	$product_id=$_POST['removeId'];
        	
        	$sql="DELETE FROM order_menu WHERE user_id='$user_id' AND product_id='$product_id'";
        	$result=mysqli_query($con,$sql);
        	if($result)
        	{
        		echo "<div class='alert alert-danger alert-dismissible'>
						    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    <strong>Product is removed successfully</strong> 
						  </div>
						</div>";
        	}
        }
        if(isset($_POST['updateCart']))
        {   echo "hi";
        	$user_id=$_SESSION['user_id'];
        	$product_id=$_POST['updateId'];
        	$product_price=$_POST['price'];
        	$quantity=$_POST['quantity'];
        	$total=$_POST['total'];
        	
        	$sql="UPDATE order_menu  SET quantity='$quantity',total='$total' WHERE user_id='$user_id' AND product_id='$product_id'";
        	$result=mysqli_query($con,$sql);
        	if($result)
        	{
        		echo "<div class='alert alert-success alert-dismissible'>
						    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    <strong>Order is updated successfully</strong> 
						  </div>
						</div>";
        	}
        }
        
					
					         
                   
				
			
			
			
    ?>
			
            
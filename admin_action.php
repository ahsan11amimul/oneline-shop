  <?php   
  session_start();
  include 'config.php';  
 
  if(isset($_POST['user']))
  {
  	$sql="SELECT user_id,username FROM users";
  	$res=mysqli_query($con,$sql);
  	$count=mysqli_num_rows($res);
  	$i=0;
  	if($count>0)
  	{
  		while($rows=mysqli_fetch_array($res))
  		{
  			$i++;
  		    $user_id=$rows['user_id'];
  			$user_name=$rows['username'];
  			echo "<li><a href='#' User_id='$user_id' class='user1'>$user_name</a></li>";
  		}
  		
  	}

  }  
  if(isset($_POST['product']))
  {
  	$sql="SELECT product_id,product_name FROM products";
  	$res=mysqli_query($con,$sql);
  	$count=mysqli_num_rows($res);
  	$i=0;
  	if($count>0)
  	{
  		while($rows=mysqli_fetch_array($res))
  		{
  			$i++;
  		    $pro_id=$rows['product_id'];
  			$pro_name=$rows['product_name'];
  			echo "<li><a href='#' Pro_id='$pro_id' class='user2'>$pro_name</a></li>";
  		}

  	}

  }  
  if(isset($_POST['category']))
  {
  	$sql="SELECT cat_id,cat_name FROM categories";
  	$res=mysqli_query($con,$sql);
  	$count=mysqli_num_rows($res);
  	$i=0;
  	if($count>0)
  	{
  		while($rows=mysqli_fetch_array($res))
  		{
  			$i++;
  		    $cat_id=$rows['cat_id'];
  			$cat_name=$rows['cat_name'];
  			echo "<li><a href='#'Cat_id='$cat_id' class='user3'>$cat_name</a></li>";
  		}

  	}

  }  
 if(isset($_POST['get_selected_product']))
			 {
              $pid=$_POST['pro_id'];
              $sql=" SELECT * FROM products WHERE product_id=$pid";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['product_id'];
			 			$name=$row['product_name'];
			 			
			 			$c_id=$row['cat_id'];
			 			$image=$row['product_image'];
			 			$price=$row['product_price'];
			 			$amount=$row['amount'];
			 			$date=$row['added'];
			 			echo "<tr>";

			 			echo "
			 			    <td>$id<br><button type='submit' class='btn btn-danger' pid='$id' id='delete_product'>Delete</button></td>
					        <td>$name</td>
					        <td>$c_id</td>
					        <td><img src='images/$image'></td>
					        <td><input type='text' value='$price' class='form-control up_pri'><button type='submit' class='btn btn-default' pid='$id' id='update_Price'>Update</button></td>
					        <td><input type='text' value='$amount' class='form-control up_am'><button type='submit' class='btn btn-default ' pid='$id' id='update_Amount'>Update</button></td>
					        <td>$date</td>
                            ";
                        echo "</tr>";
			 		}
			 	}
			 }
			 if(isset($_POST['get_selected_category']))
			 {
              $pid=$_POST['pro_id'];
              $sql=" SELECT * FROM products WHERE cat_id='$pid'";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['product_id'];
			 			$name=$row['product_name'];
			 			
			 			$c_id=$row['cat_id'];
			 			$image=$row['product_image'];
			 			$price=$row['product_price'];
			 			$amount=$row['amount'];
			 			$date=$row['added'];
			 			echo "<tr>";

			 			echo "
			 			    <td>$id
			 			    </td>
					        <td>$name</td>
					        <td>$c_id</td>
					        <td><img src='images/$image'></td>
					        <td>$price</td>
					        <td>$amount</td>
					        <td>$date</td>
                            ";
                        echo "</tr>";
			 		}
			 	}
			 }
			 if(isset($_POST['get_selected_users']))
			 {
              $uid=$_POST['user_i'];
              $sql=" SELECT * FROM users WHERE user_id='$uid'";
			 	$result=mysqli_query($con,$sql);
			 	if(mysqli_num_rows($result)>0)
			 	{
			 		while($row=mysqli_fetch_array($result))
			 		{
			 			$id=$row['user_id'];
			 			$name=$row['name'];
			 			$username=$row['username'];
			 			
			 			$email=$row['email'];
			 			$password=$row['password'];
			 			$phone=$row['phone'];
			 			$address=$row['address'];
			 			$amount=$row['amount'];
			 			$regi_date=$row['regi_date'];
			 			echo "<tr>";

			 			echo "
			 			    <td>$id</td>
			 			    
					        <td>$name</td>
					        <td>$username</td>
			 			    
					        <td>$email</td>
					        <td>$password</td>
					        <td>$phone</td>
					        <td>$address</td>
					        <td>$amount</td>
					        <td>$regi_date</td>
                            ";
                        echo "</tr>";
			 		}
			 	}
			 }


			 if(isset($_POST['update_price']))
			 {
			 	$product_id=$_POST['pro_id'];
			 	$pro_price=$_POST['price'];
			 	$sql="UPDATE products SET product_price='$pro_price' WHERE product_id='$product_id'";
			 	$res=mysqli_query($con,$sql);
			 	if($res)
			 	{
			 		echo "Updated Successfully";
			 	}
			 	
			 	
			 	
			 	
			 }
			  if(isset($_POST['update_amount']))
			 {
			 	$product_id=$_POST['pro_id'];
			 	$pro_am=$_POST['amount'];
			 	$sql="UPDATE products SET amount='$pro_am' WHERE product_id='$product_id'";
			 	$res=mysqli_query($con,$sql);
			 	if($res)
			 	{
			 		echo "Updated Successfully";
			 	}
			 	
			 	
			 	
			 	
			 }
			 if(isset($_POST['delete_pro']))
			 {
			 	$product_id=$_POST['pro_id'];
			 	
			 	$sql="DELETE FROM products WHERE product_id='$product_id'";
			 	$res=mysqli_query($con,$sql);
			 	if($res)
			 	{
			 		echo "Deleted Successfully";
			 	}
			 	
			 	
			 	
			 	
			 }



					         
                   
				
			
			
			
    ?>
			
            
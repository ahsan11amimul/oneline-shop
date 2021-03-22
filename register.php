<?php
require 'config.php';
//$nameErr = $emailErr = $genderErr = $websiteErr = "";
//$name = $email = $gender = $comment = $website = "";
//$nameErr=$userErr=$emailErr=$passwordErr=$phoneErr=$amountErr=$addressErr=$passwordErr=$check="";
$username = test_input($_POST["username"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["username"])) {
    $userErr = "UserName is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $userErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  $password=$_POST['password'];
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  }  
  if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    else
    {
      $password=$_POST['password'];
    }
  
 

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone Number required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["amount"])) {
    $amountErr = "Amount in Tk is required";
  } else {
    $amount = test_input($_POST["amount"]);
  }
  if (empty($_POST["address"])) {
    $addressErr = "Adress is required";
  } else {
    $address = test_input($_POST["address"]);
  }
}
$sql="SELECT user_id FROM users WHERE username='$username' LIMIT 1";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	$check="username already in our database try another one";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}



                        





$regi_date=$_POST['regi_date'];
if (isset($nameErr) || isset($userErr) || isset($emailErr) || isset($phoneErr) ||  isset($amountErr) || isset($check) ||isset($passwordErr))
{
	echo "

<div class='alert alert-danger alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>$nameErr $userErr $emailErr $phoneErr $amountErr $addressErr $passwordErr $check</strong> 
  </div>
</div>



	";
}
else
{
  $sql="INSERT INTO users(name,username,email,password,phone,address,amount,regi_date)
 VALUES('$name','$username','$email','$password','$phone','$address','$amount','$regi_date') ";
 $result=mysqli_query($con,$sql);
 if($result)
 {
 	echo "

<div class='alert alert-success alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Successfully signed up</strong> 
  </div>
</div>



	";

 }
}
?>
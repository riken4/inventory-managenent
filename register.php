<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dublicate = mysqli_query($conn, "SELECT * FROM register WHERE name = '$name' OR email = '$email'");
    if(mysqli_num_rows($dublicate) > 0){
        echo
        "<script> alert('account already taken'); </script>";
    }
    else{
        if($password == $password){
            $query = "INSERT INTO register VALUE('','$name', '$email', '$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('Password does not match'); </script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>
<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
color: white;
}
</style>
<body>
    <div class="nav">
<ul>
      <li><a href="addproduct.php">add</a></li>
    <li><a href="purchase.php">purchase</a></li>
    <li><a href="purchase_report.php">purchase report</a></li>
    <li><a href="sales.php">sales</a></li>
    <li><a href="sales_report.php">sales report</a></li>
    <li><a href="stock.php">stock</a></li>
    <li><a href="logout.php">logout</a></li>
    </ul></div>
<div class="reg">
    <h1>Register</h1>
    <form class="" action="" method="post" autocomplete="off">
        <div class="box">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required value=""placeholder="Name"><br>
        <label for="email">email:</label>
        <input type="email" name="email" id="email" required value="" placeholder="example@gmail.com"><br>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" required value=""><br>
        <button type="submit" name="submit">Register</button>
        </div>
    
    <h5>Already have an account?</h5>
    <button><a class="login" href="login.php">login</a></button>
    </div>
    </form>
</body>
</html>
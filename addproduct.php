<?php
   
    include "connection.php";

    if (isset($_POST['submit'])) 
    {
    // $p_id=$_POST['p_id'];
    $name=$_POST['name'];
    $des=$_POST['des'];
    $cha=$_POST['cha'];
    $unit=$_POST['unit'];
    $unitprice=$_POST['unitprice'];

    $insertsql = "INSERT INTO add_product(name, des, cha, unit, unitprice) VALUES ('$name', '$des', '$cha', '$unit','$unitprice')";
    
    
    if ($conn->query($insertsql) === TRUE) 
    {
      echo "   New record created successfully";
    } else 
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>

body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
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
}
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h5 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-primary {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
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
    <div class="container">
        <h5>add</h5>
    <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputDes" class="form-label">Description</label>
    <input type="text" name="des" class="form-control" id="exampleInputDes">
  </div>
  
  <div class="mb-3">
    <label for="usertype" class="form-label">character</label>
    <select name="cha" id="usertype">
                        <option value="v neck">v neck</option>
                        <option value="c neck">c neck</option>
                    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputUnit" class="form-label">Unit</label>
    <input type="number" name="unit" class="form-control" id="exampleInputUnit">
  </div>
  <div class="mb-3">
    <label for="exampleInputUnitprice" class="form-label">Unit Price</label>
    <input type="number" name="unitprice" class="form-control" id="exampleInputUnitprice">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    </div>
</body>
</html>
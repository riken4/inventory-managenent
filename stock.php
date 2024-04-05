<?php
  
    include "connection.php";

$sql = "SELECT * FROM add_product";

$result = $conn -> query ($sql);


if(isset($_POST['update_btn'])){
  $update_id = $_POST['update_id'];
  $name = $_POST['update_name'];
  $des = $_POST['update_des'];
  $cha=$_POST['update_cha'];
  $unit = $_POST['update_unit'];
  $unitprice = $_POST['update_unitprice'];
  
  $update_query = mysqli_query($conn, "UPDATE `add_product` SET unitprice = '$unitprice' , name='$name' , des='$des',cha='$cha' ,unit='$unit'  WHERE p_id = '$update_id'");
  if($update_query){
     header('location:stock.php');
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `add_product` WHERE p_id = '$remove_id'");
  header('location:stock.php');
};


?>

<html>
<head>
<style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .nav{
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
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
    </ul>
    </div>
    <div class="container">
    <h5>Stock Status</h5>
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">character</th>
      <th scope="col">Unit</th>
      <th scope="col">character</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="update_id"  value="<?php echo $row['p_id'];?>">
                <td><input type="text" name="update_name"  value="<?php echo $row['name'];?>"></td>
                <td><input type="text" name="update_des"  value="<?php echo $row['des'];?>"></td>
                <td><input type="text" name="update_cha"  value="<?php echo $row['cha'];?>"></td>
                <td><input type="number" name="update_unit"  value="<?php echo $row['unit'];?>"></td>
                <td><input type="number" name="update_unitprice"  value="<?php echo $row['unitprice'];?>"></td>
                <td><button type="submit" class="btn btn-primary" name="update_btn">update</button></td>
                <td><a  class="btn btn-primary" href="stock.php?remove=<?php echo $row['p_id']; ?>">delete</a></td>
                </tr>
                </form>
                <?php }
        } else {
            echo "0 results";
        }
        ?>
      

    
  </tbody>
</table>
</div>
</body>
</html>
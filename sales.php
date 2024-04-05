<?php
    
    include "connection.php";
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) 
{
$id=$_POST['id'];
$name=$_POST['name'];
$des=$_POST['des'];
$unit=$_POST['unit'];
$unitprice=$_POST['unitprice'];
$unitsale=$_POST['unitsale'];
$totalprice=$unitprice*$unitsale;
$u_unit=$unit-$unitsale;

if($unit>=$unitsale)
{
  $insertsql = "INSERT INTO sales(name, sellunit, totalprice, productid) VALUES ('$name', '$unitsale', '$totalprice','$id')";

if ($conn->query($insertsql) === TRUE) 
{
  echo " Sell successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$update_quantity_query = "UPDATE `product` SET unit = '$u_unit'  WHERE id = '$id'";

if ($conn->query($update_quantity_query) === TRUE) 
{
  echo " Update successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location:sales.php');

}
else
{
  echo "Out Of Stock";
}



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
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="number"] {
            width: 100px;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn:hover {
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
    <h5>Sales</h5>
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Unit</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Sell Unit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               <tr>
               <input type="hidden" name="id"  value="<?php echo $row['id'];?>">
                <input type="hidden" name="name"  value="<?php echo $row['name'];?>">
                <input type="hidden" name="des"  value="<?php echo $row['des'];?>">
               <input type="hidden" name="unit"  value="<?php echo $row['unit'];?>">
                <input type="hidden" name="unitprice"  value="<?php echo $row['unitprice'];?>">
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['des'];?></td>
                <td><?php echo $row['unit'];?></td>
                <td><?php echo $row['unitprice'];?></td>
                <td><div class="mb-3">
                    <input type="number" name="unitsale" class="form-control" id="exampleInputUnit">
               </div></td>
                <td><button type="submit" class="btn btn-primary" name="submit">Sell Now</button></td>
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
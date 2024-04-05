
<?php
 
    include "connection.php";
    $t=0;
if (isset($_POST['submit'])) 
{
    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];

$sql = "SELECT * FROM purchase where created_at>='$starttime' && created_at<'$endtime'";
$res = $conn -> query ($sql);
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

        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"], button[type="button"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
        }

        input[type="submit"]:hover, button[type="button"]:hover {
            background-color: #0056b3;
        }

        .total {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class='nav'>
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="starttime">Start (date and time):</label>
  <input type="datetime-local" id="starttime" name="starttime">

  <label for="endtime"> End (date and time):</label>
  <input type="datetime-local" id="endtime" name="endtime">
  <input type="submit" name="submit">
</form>
<button type="button" onclick="window.print();return false;">Pdf Report</button>
<h5>Purchase Report</h5>
<table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Unit</th>
      <th scope="col">Total Unit Price</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(isset($_POST['submit']))
 {
          if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($res)) {
                $t=$t+($row['unit']*$row['unitprice']);
              ?>
               <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['unit'];?></td>
                <td><?php echo $row['unit']*$row['unitprice'];?></td>

                </tr>
                </form>
                <?php
                 }
        } 
        else 
        {
            echo "0 results";
        }
    }
        ?>
    </tbody>
</table>
<?php echo "Total= " . $t ." Taka";?>
</div>
</body>
</html>

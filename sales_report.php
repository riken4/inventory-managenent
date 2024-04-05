<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
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

        .pendingbody {
            margin-top: 20px;
        }

        h5 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
<?php
 
include'connection.php';
$t=0;
if (isset($_POST['submit'])) 
{
    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];

$sql = "SELECT * FROM sales where created_at>='$starttime' && created_at<'$endtime'";
$result = $conn -> query ($sql);
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
        .h1{
          text-align: center;
        }
    </style>
</head><div class="nav">
<ul>
      <li><a href="addproduct.php">add</a></li>
    <li><a href="purchase.php">purchase</a></li>
    <li><a href="purchase_report.php">purchase report</a></li>
    <li><a href="sales.php">sales</a></li>
    <li><a href="sales_report.php">sales report</a></li>
    <li><a href="stock.php">stock</a></li>
    <li><a href="logout.php">logout</a></li>
    </ul></div>
<h1>Sales Report</h1>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="starttime">Start (date and time):</label>
  <input type="datetime-local" id="starttime" name="starttime">

  <label for="endtime"> End (date and time):</label>
  <input type="datetime-local" id="endtime" name="endtime">
  <input type="submit" name="submit">
</form>
<button type="button" onclick="window.print();return false;">Pdf Report</button>
<div class="container pendingbody">
  <h5>Sales Report</h5>
<table class="table">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Unit</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  <?php
   if(isset($_POST['submit']))
   {
          
  $t=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                    $t=$t+$row["totalprice"];

              ?>
    <tr>

      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["sellunit"] ?></td>
      <td><?php echo $row["totalprice"] ?></td>
    </tr>
    <?php 

    }

        } 
        else 
            echo "0 results";

    }
        ?>
  </tbody>
</table>
<?php echo "Total= " . $t ." Taka";?>

</div>
</body>
</html>

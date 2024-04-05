<?php
 SESSION_START();

 if(isset($_SESSION['auth']))
 {
    if($_SESSION['auth']!=1)
    {
        header("location:login.php");
    }
 }
 else
 {
    header("location:login.php");
 }
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Inventory Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchase.php">Purchase</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="sales.php">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="purchase_report.php">Purchase Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="sales_report.php">Sales Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:red!important;"  href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>
</html>
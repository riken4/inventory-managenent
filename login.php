<!DOCTYPE html>
<html lang="en">

<head>
    

</head>
<style>
        
    </style>

<body>
    <div class="ff">
        adc
            <h1>LOGIN</h1>
            <form class="loginform" method="post">
                <div class="userpass">
            Username <br> <input type="text" name="name" placeholder=" ">
            <br><br>
            Password <br> <input type="password" name="password">
            <br><br>
            <div class="loginb"><input type="submit" name="submit" value="LogIn"></div>
            </div>
            <p>Create an account</p>
            
            <button><a href="register.php">Register</a></button>


        </form></div>
        <?php
        include 'connection.php';
        session_start();
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM register where name='$name' and password='$password'";
            $result = mysqli_query($conn, $sql);
           
            
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $_SESSION['Login_session'] = $name;
                echo "Login Sucess";
                header("Location:http://localhost/Inventory-Management/home.php");

            } else {
                echo "invalid user";
            }
        }
        ?>
</body>

</html>
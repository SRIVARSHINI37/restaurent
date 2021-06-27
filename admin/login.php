<?php include('config/constant.php') ?>

<html>
<head>
<title>Login - Food Order System</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
        if(isset($_SESSION['login']))
        {
                echo $_SESSION['login'];//display message
                unset($_SESSION['login']);//remove message
        }
        if(isset($_SESSION['no-login-message']))
        {
                echo $_SESSION['no-login-message'];//display message
                unset($_SESSION['no-login-message']);//remove message
        }
        
        ?>
        <br><br>

        <form action="" method="POST" class="text-center">
        Username: 
        <input type="text" name="username" placeholder="Enter username"> <br><br>
        Password:
        <input type="password" name="password" placeholder="Enter your password"><br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
        </form>

        <p class="text-center">Created by - SriVarshini</p>
    </div>
</body>

</html>

<?php 

    //check whether submit is clicked
    if(isset($_POST['submit']))
    {
        //process for login
        //1. get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check whether username and password exsist
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3.execute query
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if($count == 1)
        {
            $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
            $_SESSION['user'] = $username; // to check whether user is loged in or not
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username and Password did not match.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>
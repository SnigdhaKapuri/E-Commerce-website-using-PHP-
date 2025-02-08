<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap CSS link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font ossum-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
body{
    overflow: hidden;
}
        </style>
</head>
<body>
    <div class="conatiner-fluid m-3 pt-3">
        <h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center">
    <div class="col-lg-6 col-x-5">
        <img src="../images/login.jpg" alt="Admin Registration" class="img-fluid">
    </div>
    <div class="col-lg-6 col-x-4 ">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-success text-dark py-2 px-3" name="admin_login" value="Login">
                <p class="text-bold mt-2 pt-1">Don't you have an account?<a href="admin_registration.php" class="text-success">Register</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $select_query="select * from `admin_table` where admin_name='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0){
        $_SESSION['admin_name']=$username;
            
    if(password_verify($password,$row_data['admin_password'])){
        echo "<script>alert('Login successful')</script>";
    echo "<script>window.open('index.php','_self') </script>";
        }
        
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
    
        }
    }
    
    ?>
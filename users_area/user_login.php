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
    <title>User Login page</title>
            <!-- bootstrap CSS link-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<style>
    body{
        overflow-x:hidden;
    }
    </style>
<body>
    <div class="container-fluid">
        <h2 class="text-center mt-4 pt-2">User Login</h2>
        <div class="row d-flex lign-items-center justify-content-center mt-5" >
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                     <!--username field-->
                     <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <!--login button-->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-success py-2 px-3" name="user_login">
                    <p  class="fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger"> Register</a></p>
                    <p  class="fw-bold pt-0 mb-3">Want to go to home page?<a href="../index.php" class="text-warning">Home page</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>


<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
     $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);


    if($row_count>0){
    $_SESSION['username']=$user_username;
        
if(password_verify($user_password,$row_data['user_password'])){
    //echo "<script>alert('Login Sucessfull')</script>";
    if($row_count==1 and $row_count_cart==0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('Login Sucessfull')</script>";
echo "<script>window.open('profile.php','_self') </script>";
    }else{
    $_SESSION['username']=$user_username;
        echo "<script>alert('Login Sucessfull')</script>";
        echo "<script>window.open('payment.php','_self') </script>";   
    }
    
    }else{
        echo "<script>alert('Invalid Credentials')</script>";

    }
}else{
    echo "<script>alert('Invalid Credentials')</script>";
}
}
?>
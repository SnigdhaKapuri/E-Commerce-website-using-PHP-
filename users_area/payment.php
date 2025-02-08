<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
     <!-- bootstrap CSS link-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>
.payment_img{
    width: 90%;
    margin: auto;
    display: block;
}


    </style>

<body>
    <!-- phpp code to acess user id-->
    <?php
$user_ip=getIPAddress();
$get_user="select * from `user_table` where user_ip='$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

    ?>
    <div class="container mt-4">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-item-center my-5" >
            <div class="col-6">
            <a href="https://pay.google.com/intl/en_in/about/" target="_blank"><img src="../images/pay.jpg" alt="" class= payment_img></a>

            </div>
            <div class="col-6 mt-5">
            <a href="order.php?user_id=<?php  echo $user_id ?>" target="_blank"><h2 class="text-center  my-5">Pay Offline</h2></a>
            <p  class="fw-bold pt-0 mb-3 "><a href="../index.php" class="text-warning "><h4 class="text-center">Go Home</h4></a></p>
                   

        </div>
    </div>
  
</body>
</html>
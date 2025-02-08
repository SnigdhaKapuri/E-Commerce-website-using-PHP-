<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content ="width=device-width, initial-scale-1.0">
        <title>Welcome <?php echo $_SESSION['username'] ?></title>
        <!-- bootstrap CSS link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font awsome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
        <!-- css file-->
      <link rel ="stylesheet" href="../styles.css">
      <style>
    body{
        overflow-x:hidden;
    }
    .profile_img{
    width: 80%;
    margin:auto;
    display:block;
    /*height: 100%;*/
    object-fit: contain;
}
.edit_image{
  width: 100px;
  height:100px ;
  object-fit: contain;
}
    </style>
    </head>
<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

  <img src="../images/logo.png"alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"></a><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</nav>

<!--calling  cart function-->
<?php
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
   
      <?php
      if(!isset($_SESSION['username'])){
        echo "      <li class='nav-item'>
        <a class='nav-link' href='login.php'>Welcome Guest</a>
      </li>   ";
      }else{
        echo "     <li class='nav-item'>
        <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
      </li>   ";
      }
      
if(!isset($_SESSION['username'])){
  echo "      <li class='nav-item'>
  <a class='nav-link' href='./users_area/user_login.php'>Login</a>
</li>  ";
}else{
  echo "      <li class='nav-item'>
  <a class='nav-link' href='../users_area/logout.php'>Logout</a>
</li>  ";
}
      ?>
    </ul>
</nav>
<!-- third child-->
<div class="bg-light">
    <h3 class="text-center">Everything store</h3>
    <p class="text-center">Communications is the heart of e-commerce and community</p>
</div>

<!--fourth child-->
<div class="row">
    <div class="col-md-2">
<ul class="navbar-nav bg-secondary text-center" style="height:100vh">
<li class="nav-item bg-info">
        <a class="nav-link text-light" href="#"> <h4>Your profile</h4></a>
      </li>
      <?php
$username=$_SESSION['username'];
$user_image="Select * from `user_table` where username='$username'";
$user_image=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo "      <li class='nav-item '>
<img src='./user_images/$user_image' class='profile_img my-4'alt=''>
</li>"


?>

      <li class="nav-item ">
        <a class="nav-link text-light" href="profile.php"> Pending Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account"> Edit account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account"> Delete Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php"> Logout</a> 
      </li>
</ul>
    </div>
<div class="clas col-md-10 text-center">
    <?php get_user_order_details();
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
     ?>
</div>
</div>

<!-- last child -->
<!-- include footer-->
<?php include("../includes/footer.php") ?>
    
</div>

<!--bootstrap js link-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
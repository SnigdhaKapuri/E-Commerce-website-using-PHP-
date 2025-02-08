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
        <title>Admin Dashboard</title>
        <!-- bootstrap CSS link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font ossum-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--css file-->
        <link rel="stylesheet" href="../styles.css">
        <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position:absolute;
    bottom:0;
}
body{
    overflow-x:hidden;
}
.product_img{
    width: 100px;
    object-fit: contain;
}
</style>
</head>
<body>
    <!--navbar-->
<!-- As a link -->
<div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <img src="../images/logo.png"alt="" class="logo" class="logo">
        <nav class="navbar navbar-expand-lg">
            <ul class ="navbar-nav">
                 <li class="nav-item">
                    <a href="" class="nav-link">Welcome Admin</a>
                </li>
            </ul>
        </nav>
    </nav>
    <!-- second child-->


    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
   
      <?php
      if(!isset($_SESSION['admin_name'])){
        echo "      <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>   ";
      }else{
        echo "     <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
      </li>   ";
      }
      
if(!isset($_SESSION['admin_name'])){
  echo "      <li class='nav-item'>
  <a class='nav-link' href='admin_login.php'>Login</a>
</li>  ";
}else{
  echo "      <li class='nav-item'>
  <a class='nav-link' href='../users_area/logout.php'>Logout</a>
</li>  ";
}
      ?>
    </ul>
</nav>

<div class="bg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-2 mg-2 d-flex align-items-center">
            <div class="p-4">
                <a href="#"><img src="../images/logo2.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-right">Admin Name</p>
            </div>
            <!-- comment-->
            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Log Out</a></button>
            </div>
        </div>
    </div>
<!--fourth child-->
        <div class="container my-3">
            <?php
    if(isset($_GET['insert_categories']))
    {
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand']))
    {
        include('insert_brand.php');
    }
    if(isset($_GET['view_products']))
    {
        include('view_products.php');
    }
    if(isset($_GET['edit_products']))
    {
        include('edit_products.php');
    }
    if(isset($_GET['delete_product']))
    {
        include('delete_product.php');
    }
    if(isset($_GET['view_categories']))
    {
        include('view_categories.php');
    }
    if(isset($_GET['view_brands']))
    {
        include('view_brands.php');
    }
    if(isset($_GET['edit_category']))
    {
        include('edit_category.php');
    }
    if(isset($_GET['edit_brands']))
    {
        include('edit_brands.php');
    }
    if(isset($_GET['delete_category']))
    {
        include('delete_category.php');
    }
    if(isset($_GET['delete_brands']))
    {
        include('delete_brands.php');
    }
    if(isset($_GET['list_orders']))
    {
        include('list_orders.php');
    }
        if(isset($_GET['delete_orders']))
    {
        include('delete_orders.php');
    }
    if(isset($_GET['list_payments']))
    {
        include('list_payments.php');
    }
    if(isset($_GET['delete_payment']))
    {
        include('delete_payment.php');
    }
    if(isset($_GET['list_users']))
    {
        include('list_users.php');
    }
    if(isset($_GET['delete_users']))
    {
        include('delete_users.php');
    }
         ?>
        </div>

<!-- last child -->
<!-- include footer-->
<?php include("../includes/footer.php") ?>
</div>
<!-- bootstrap JS link-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--JS link-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html> 
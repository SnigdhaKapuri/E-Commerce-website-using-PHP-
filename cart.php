<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content ="width=device-width, initial-scale-1.0">
        <title>Ecommerce Website-Cart Details</title>
        <!-- bootstrap CSS link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font awsome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
        <!-- css file-->
      <link rel ="stylesheet" href="styles.css">
      <style> 
    .cart_image{
    width: 80px;
    height: 80px;
    object-fit: contain;
}
</style>
    </head>

<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

  <img src="./images/logo.png"alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"></a><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
      </li>
    </ul>
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
              <a class='nav-link' href='#'>Welcome Guest</a>
            </li>   ";
            }else{
              echo "     <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>   ";
            }
if(!isset($_SESSION['username'])){
  echo "      <li class='nav-item'>
  <a class='nav-link' href='./users_area/user_login.php'>Login</a>
</li>  ";
}else{
  echo "      <li class='nav-item'>
  <a class='nav-link' href='./users_area/logout.php'>Logout</a>
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

<!-- fourth child  table-->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            
                <!--phpp code to display dynamic data-->
                <?php
                  
                  $get_ip_add = getIPAddress();  
                  $total_price=0;
                  $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                  $result=mysqli_query($con,$cart_query);
                  $result_count=mysqli_num_rows($result);
                  if($result_count>0){
                    echo "<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Images</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
                  while($row=mysqli_fetch_array($result)){
                    $product_id=$row['product_id'];
                    $select_products="select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                      $product_price=array($row_product_price['product_price']);
                      $price_table=$row_product_price['product_price'];
                      $product_title=$row_product_price['product_title'];
                      $product_image1=$row_product_price['product_image1'];
                      $product_values=array_sum($product_price);
                      $total_price+=$product_values;
                       ?>

               <tr>
                <td><?php echo $product_title ?> </td>
                <td><img src="./admin_area/product_images/ <?php echo $product_image1 ?>" alt="" class="cart_image"></td>
                <td><input type="text" name="qty" class="form-input w-50"></td>
                <?php
$get_ip_add = getIPAddress();  
if(isset($_POST['update_cart'])){ 
$quantities=$_POST['qty'];
$update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
$result_products_quantity=mysqli_query($con,$update_cart);
$total_price=$total_price*$quantities;
}
?>
                <td><?php echo $price_table ?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                <td>
                <!--<button class="bg-primary px-3 py-2 mx-3">Update</button>-->
                 <input type="submit" value="Update Cart" class="bg-primary px-3 py-2 mx-3" name="update_cart">
                  <!--  <button class="bg-danger px-3 py-2 mx-3">Remove</button>-->
                  <input type="submit" value="Remove cart" class="bg-primary px-3 py-2 mx-3" name="remove_cart">
                </td>
                
               </tr>
               <?php          
                    }
                }}
                else{
                    echo"<h2 class='text-center text-danger'>Please add something the Cart is empty!</h2>";
                }
                ?> 
            </tbody>
        </table>
        <!--subtotal-->
        <div class="d-flex mb-5">
            <?php
$get_ip_add = getIPAddress();  
$cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
echo"<h4 class='p-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
<input type='submit' value='Continue shopping' class='bg-primary px-3 py-2 mx-3' name='continue_shopping'>
<button class='bg-success px-3 py-2'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
}else{
   echo"<input type='submit' value='Continue shopping' class='bg-primary px-3 py-2 mx-3' name='continue_shopping'>";
}

if(isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
}
?>
         
        </div>
    </div>
</div>
</form>

<!-- function to remove items -->
<?php 
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self') </script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();


?>

<!-- last child -->
<!-- include footer-->
<?php include("./includes/footer.php") ?>
    
</div>

<!--bootstrap js link-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
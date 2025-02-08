
    <h3 class="text-danger mt-4 mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">

    <div class="form-outline">
        <input type="submit" class="form-control w-50 m-auto bg-danger text-light" name="delete" value="Delete_account"> 
    </div>
    <div class="form-outline mt-4">
        <input type="submit" class="form-control w-50 m-auto bg-success text-light" name="dont_delete" value="Don't Delete_account"> 
    </div>
    </form>

    <?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted sucessfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
    
}

?>
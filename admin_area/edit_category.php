<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];

    $get_categories="Select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];

}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    
    $update_query="update `categories` set category_title='$cat_title' where  category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category has been updated sucessfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";

    }



}
?>

<div class="container mt-5">
    <h2 name="title" class="text-center">Edit Category</h2>
    <form action="" method="post" class="text-center">
    <div class="form-outline w-50 m-auto mb-4">
        <label for="category_title" class="form-label p-2">Category Title</label>
        <input type="text" id="category_title" name="category_title" class="form-control" required="required" value="<?php echo $category_title?>">
    </div>
    <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3 mt-3" name="edit_cat">
    </form>
</div>
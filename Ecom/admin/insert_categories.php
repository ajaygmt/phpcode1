<?php
include("../includes/connect.inc.php");
if(isset($_POST['insert_cat'])){
    
    $category_title=$_POST['cat_title'];
    
    //select data from database

    $insert_query="select * from `categories` where categories_title='$category_title' ";
    $result_select=mysqli_query($con,$insert_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
            echo "<script>alert(' this category  is present inside the data base ')</script>";
    }else{

    $insert_query="insert into `categories` (categories_title) value ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('category has been inserted successfully')</script>";
    }else {
        echo "Error: " . mysqli_error($con);
    }
}}

?>

<h2 class="text-center">Insert categories</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="insert categories" 
        aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" 
        value="insert categories" class="bg-info">
         
    </div>
    
</form>
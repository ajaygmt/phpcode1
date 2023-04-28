<?php

require("../includes/connect.inc.php");
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_keyword=$_POST['product_keyword'];
    $category_id=$_POST['product_catagories'];
    $brand_id=$_POST['product_brand'];
    $product_price=$_POST['Product_price'];
    $product_status='true';

    //aceesing images
    $product_image=$_FILES['product_image']['name'];

    // //acessing image tempname
    $temp_image=$_FILES['product_image']['tmp_name'];

    // condition
   
    move_uploaded_file($temp_image,"./product_images/$product_image");

            // select data from database
    //         echo "<PRE>";
    // print_r($_POST);

    $insert_products="insert into `products` (product_title,product_description,product_keyword,
    category_id,brand_id,product_image,Product_price,data,status) values ('$product_title',
    '$product_description','$product_keyword','$category_id','$brand_id','$product_image',    
    '$product_price',NOW(),'$product_status')";     
    $result_query=mysqli_query($con,$insert_products);

    

    if($result_query){
        echo "<script>alert('product has been inserted successfully')</script>";
    }else {
        echo "Error: " . mysqli_error($con);
    }
}

    

    // // $temp_image2=$_FILES['product_image2']['tmp_name'];
    // // $temp_image3=$_FILES['product_image3']['tmp_name'];

    
        
        // move_uploaded_file($temp_image2,"./product_images/$product_image2");
        // move_uploaded_file($temp_image3,"./product_images/$product_image3");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php   
require('component/head.php');
?>
<link rel="stylesheet" href="../../style.css" >

</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Product</h1>
        <!--form-->
        <form action="" method="post" id="insert_product" enctype="multipart/form-data">
        <!--product title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Enter Product title" autocomplate="off" require="required">
                 
                 
            </div>
          
        <!-- description -->
          <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control"
                 placeholder="Enter Product description" autocomplate="off" require="required">
            </div>

        <!-- keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" class="form-control"
            placeholder="Enter Product keyword" autocomplate="off" require="required">
        </div>    
        
        <!--catagories-->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_catagories" id="" class="form-select">
            <option value="">Select a catagory</option>
            <?php
                $select_query="select * from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_id=$row['categories_id'];
                    $categories_title=$row['categories_title']; 
                    echo "<option value='$category_id'>$categories_title</option>";
                }

?>
                
          </select>
        </div>  

        <!--brands-->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_brand" id="" class="form-select">
                <option value="">Select a brand</option>
                <?php
                $select_query="select * from `brand`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_id=$row['brand_id'];
                    $brand_title=$row['brand_title'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }      
                ?>       
          </select>
        </div>

        <!--img-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_img1" class="form-label">Product image</label>
            <input type="file" name="product_image" id="Product_image" class="form-control" require="required">
        </div>


        <!--price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Price</label>
            <input type="text" name="Product_price" id="Product_price" placeholder="product price" 
            class="form-control" require="required">
        </div>

        <!--submit-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" id="Insert_Product"  
            class="btn-info myb-3 px-3 " value="Insert Products">
        </div>
        </form>
    </div>
    

     <!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>
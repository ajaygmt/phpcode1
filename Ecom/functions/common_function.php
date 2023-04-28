
<?php
//incliding connect file
include('./includes/connect.inc.php');

//getting products
function getproducts(){
    global $con;

    if(!isset($_GET['categories'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from  `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      // $product_keyword=$_row['product_keyword'];
      $product_image=$row['product_image'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card' >
      <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class=card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        
        <p class='card-text'><b>price:</b>$product_price</p>
        
        <a 'class='btn btn-info' href='add_to_cart.php?product_id=$product_id' >add to cart</a>
        
      </div>
    </div>
  </div>";
}
}
}
}

//getting unique categories
function get_unique_categories(){
    global $con;

    if(!isset($_GET['categories'])){
      $category_id=$_GET['categories'];
        // echo "<PRE>";
        // print_r($_POST);
    $select_query="select * from  `products` where category_id=$category_id";
    // echo "<PRE>";
    // print_r($_get);
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 text-center >No stock for this category</h2>";
    }
    

    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image=$row['product_image'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo"<div class='col-md-4 mb-2'>
      <div class='card' >
      <img src='../admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
      <div class=card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <a href='#' class='btn btn-info'>Add to cart</a>
        <a href='# class='btn btn-secondary'>view more</a>
      </div>
    </div>
  </div>";
}
}
}


//display brand insidenav
function getbrand(){
    global $con;
    $select_brands="select * from `brand`";
    $result_brands=mysqli_query($con,$select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while($row_data=mysqli_fetch_assoc($result_brands)){
        $brand_id=$row_data['brand_id'];
        $brand_title=$row_data['brand_title'];
      
      echo "<li class='nav-item'>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
}
}

//display category in sidenav

function getcategory(){
    global $con;
    $select_categories="select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    // $row_data=mysqli_fetch_assoc($result_categories);
    // echo $row_data['categories_title'];
    while($row_data=mysqli_fetch_assoc($result_categories)){
        $categories_id=$row_data['categories_id'];
        $categories_title=$row_data['categories_title'];
      
      echo "<li class='nav-item'>
      <a href='index.php?categories='$categories_id' class='nav-link text-light'>$categories_title</a>
        </li>";
}
}

//get seraching product
function search_product(){
  if(isset($_GET['search_data_product'])){
    $search_dala_value=$_GET['search_data'];
  $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
  $result_query=mysqli_query($con,$search_query);
  while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  // $product_keyword=$_row['product_keyword'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  echo"<div class='col-md-4 mb-2'>
  <div class='card' >
  <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
  <div class=card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    
    <p class='card-text'>$product_price</p>
    <a href='#' class='btn btn-info'>Add to cart</a>
    <a href='# class='btn btn-secondary'>view more</a>
  </div>
</div>
</div>";
}
}
}
function cart(){
  global $con;

  if(!isset($_GET['categories'])){
      if(!isset($_GET['brand'])){
  $select_query="select * from  `products` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keyword=$_row['product_keyword'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo"<div class='col-md-4 mb-2'>
    <div class='card' >
    <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
    <div class=card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      
      <p class='card-text'><b>price:</b>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      
    </div>
  </div>
</div>";
}
}
}
}


?>
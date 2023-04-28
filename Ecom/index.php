<?php

require('functions/common_function.php');


// print_r($_SESSION);die;

?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php
require('component/head.php');

?>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- frist child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><b>Home</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all_products.php"><b>Products</b></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_register.php"><b>Register</b></a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link" href="contact.php"><b>contact</b></a>
        </li> -->
        
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="oder_list.php"><b>oder list</b></a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

   <!--second child-->
   <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome 
            <?php if(isset($_SESSION["user_name"])){
                        echo $_SESSION['user_name'];
                      }else{
                        echo "guset";
                      }
            ?></a>
          <span></span>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION["user_name"])){
          ?>
          <a href="log_out.php" type="button" class="btn btn-danger">log out</a>
          <?php
            }else{ 
              ?>   
          <a type="button" class="btn btn-danger"href="login.php">login</a>
          <?php
        }
        ?>
        </li>
      </ul>
    </nav>

     <!--third child-->
     <div class="bg-light">
      <h3 class="text-center">Hidden store</h3>
      <p class="text-center">Communication is at the heart of e-commerce and community</p>

    </div>

      <!--forth child-->
      <div class="row px-1">
      <div class="col-md-10">
        <!--products-->
        <div class="row mb-1">
        <!--  -->
        <?php
        // getproducts();
        // get_unique_categories();
    $select_query="select * from  `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      
      $product_image=$row['product_image'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
    //           echo "<PRE>";
    // print_r($_row);
      echo"<div class='col-md-4 mb-2'>
        <div class='card' >
        <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
        <div class=card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        
        <p class='card-text'>$product_price</p>
        <a 'class=btn btn-info' href='add_to_cart.php?product_id=$product_id' >add to cart</a>
        
      </div>
    </div>
  </div>";
  
}
?>


        <!--  -->
            <!-- <div class="col-md-4 mb-2">
             <div class="card" >
                    <img src="./images/clthos/tshirt2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">view more</a>
              </div>
            </div>
          </div> -->
          <!-- row end -->
        </div>
        <!-- col end -->
      </div>

      <div class="col-md-2 bg-secondary p-0">
        <!--sidenav-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="# " class="nav-link text-light "><h4>Delivary brand</h4></a>
          </li>
          <?php
          getbrand();
  //         $select_brands="select * from `brand`";
  //         $result_brands=mysqli_query($con,$select_brands);
  //         // $row_data=mysqli_fetch_assoc($result_brands);
  //         // echo $row_data['brand_title'];
  //         while($row_data=mysqli_fetch_assoc($result_brands)){
  //           $brand_title=$row_data['brand_title'];
  //           $brand_id=$row_data['brand_id'];
  //           echo "<li class='nav-item'>
  //           <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  //             </li>";
  // }
?>
        </ul>

        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="# " class="nav-link text-light "><h4>categories</h4></a>
          </li>
          <?php
          getcategory();
  //         $select_categories="select * from `categories`";
  //         $result_categories=mysqli_query($con,$select_categories);
  //         // $row_data=mysqli_fetch_assoc($result_categories);
  //         // echo $row_data['categories_title'];
  //         while($row_data=mysqli_fetch_assoc($result_categories)){
  //           $categories_title=$row_data['categories_title'];
  //           $categories_id=$row_data['categories_id'];
  //           echo "<li class='nav-item'>
  //           <a href='index.php?categories=$brand_id' class='nav-link text-light'>$categories_title</a>
  //             </li>";
  // }
?>
        </ul>  
</div> 



  <!-- last child -->
  <div class="bg-info p-3 text-center">
    <p>All right reserved 0- deisgne by Ajay Gamit</p>
  </div> 

  <!-- javascripts link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
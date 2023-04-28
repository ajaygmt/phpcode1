<!DOCTYPE html>
<html lang="en">
<head>
 <?php   
require('component/head.php');
?>

    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    CSS File
    
    
    

    font awesome link
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>
<body>

    <!--navbar-->
    <div class="container-fluid p-0 ">
        <!--frist child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            
          
                            <a class="nav-link" href="user_register.php"><b>Register</b></a>
                        </li>
                        
                    </ul>

                </nav>

            </div>
        </nav>

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="">img</a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">insert product</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">view product</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">view categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">view Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All order</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All payment</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List user</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                 </div>

            </div>
        </div>


        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            ?>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
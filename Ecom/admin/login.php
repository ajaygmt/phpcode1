<?php
include("../includes/connect.inc.php");
if(isset($_POST['submit'])){


    // $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    
    //    echo "<PRE>";
    // print_r($_POST);
    $insert_query="select * from `user` where email_id='$user_email' and  user_password='$user_password'";
    $result_select=mysqli_query($con,$insert_query);
    if($result_select==true){

    
    $number=mysqli_num_rows($result_select);
    if($number>0){
      $row=mysqli_fetch_assoc($result_select);
      // print_r($row);
      $_SESSION['user_name']=$row['user_name'];
        header('location:index.php');
    }else{
      header('location:login.php?error=true');
    }
  }else{
    // echo "error".mysqli_error($con);
    header('location:login.php?error=true');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('component/head.php');

?>
    </head>
    <body>

    <h1 class="text-center"><B>User Login</B></h1>

    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./images/logo1.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="" method="post" id="user_submit">
        
          <div class="divider d-flex align-items-center my-4">
            
          </div> 

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="user_email" id="user_email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="user_password" id="user_password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <?php
            if(isset($_GET["error"])){

              ?>
            <span class="alert alert-danger">Invalid username or password.</span>
            <?php
          }
          ?>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" class="btn btn-primary btn-lg" id="User_submit" name="submit" value="login"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_register.php"
                class="link-danger">Register</a></p>
          </div>

          

        </form>
      </div>
    </div>
  </div>
  <!-- <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    Copyright
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    Copyright

    Right
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    Right
  </div> -->
</section>





<!-- javascripts link -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
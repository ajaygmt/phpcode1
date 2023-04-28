<?php
require("../includes/connect.inc.php");
if(isset($_POST['User_submit'])){

    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
  
    $user_password=$_POST['user_password'];
    $user_cpassword=$_POST['cpassword'];
    
    // echo "<PRE>";
    // print_r($_POST);
     $insert_query="select * from `user` where email_id='$user_email' ";
     $result_select=mysqli_query($con,$insert_query);
     $number=mysqli_num_rows($result_select);
     if($number>0){
             echo "<script>alert(' this user already present  ')</script>";
     }else{
        if($user_password != $user_cpassword){
            echo"<script>alert('password is not metch')</script>";
            // exit();
        }else{
            $insert_query="insert into `user` (user_name,email_id,user_password,
            user_cpassword) value ('$user_name','$user_email','$user_password',
            '$user_cpassword')";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert(' register sussesful ')</script>";
            header('location:login.php');

        }
        
     }

} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('component/head.php');

?>
<body>
<div class="container">
        <h1 class="text-center">New register</h1>
        <!--form-->
        <form action="" method="post" id="new_register" enctype="multipart/form-data">
        <!--user name-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label"><b>User Name:</b></label>
                <input type="text" name="user_name" id="user_name" class="form-control"
                 placeholder="Enter your name" autocomplate="off" require="required">  
            </div>
        <!-- User email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="User_email" class="form-label"><b>Email id:</b></label>
                <input type="text" name="user_email" id="user_email" class="form-control"
                 placeholder="Enter your email" autocomplate="off" require="required">  
            </div>
    
        <!-- user password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="User_password" class="form-label"><b>password:</b></label>
                <input type="text" name="user_password" id="user_password" class="form-control"
                 placeholder="password" autocomplate="off" require="required">  
            </div>
        <!-- confirm password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="cpassword" class="form-label"><b>Confirm password:</b></label>
                <input type="text" name="cpassword" id="cpassword" class="form-control"
                 placeholder="confirm password" autocomplate="off" require="required">  
            </div>
        
        <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="User_submit" id="User_submit"  
                class="btn-info myb-3 px-3" value="Submit">
            </div>


            </form>
    </div>


      <!-- javascripts link -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
    
    $product_id=$_GET['product_id'];
    
    $_COOKIESET;
    if(isset($_COOKIE['cart'])){
        $product_id=$_COOKIE['cart'];
        $productarry= explode('_',$_product_id);
        array_push($product_id,$productarry);
        $_COOKIE['cart']=implode('_',$productarry);
        


    }else{
        $_COOKIE['cart']=$product_id;
    }
    header('location:index.php');
?>










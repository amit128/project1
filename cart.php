<?php 
session_start(); 
include "./db_conn.php";

if (isset($_POST['id'])) {
    if($_POST['Action']=='add')
    {
        if($_SESSION['cart']!='')
        {
        $cart=$_SESSION['cart'];
        if (!in_array($_POST['id'], $cart)) {
        array_push($cart,$_POST['id']);
        $_SESSION['cart']=$cart;
        echo json_encode("Added to cart");

        }
        else
        {
            echo json_encode("Already in cart");

        }


        }
        else{
        $_SESSION['cart']=array($_POST['id']);
        echo json_encode("Added to cart");


        }
    }
    else if($_POST['Action']=='Delete')
    {

        if($_SESSION['cart']!='')
        {
        $cart=$_SESSION['cart'];
        if (($key = array_search($_POST['id'], $cart)) !== false) {
            unset($cart[$key]);
            if(count($cart)<1)
            {
                $_SESSION['cart']='';
            }
            else
            {
                $_SESSION['cart']=$cart;

            }
        
        }

    }}
   
}
if($_POST['Action']=='update')
{
    if (($_POST['fname'])!='' && isset($_POST['lname'])!='') {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
     $fname = validate($_POST['fname']);
     $lname = validate($_POST['lname']);
    //  print_r($_SESSION['cart']);
    //  die();
     
    if($_SESSION['cart']!='')
    {

    $cart=implode(",",$_SESSION['cart']);
    // echo $cart;
    if(count($_SESSION['cart'])>1)
    {
        $sql = "UPDATE bookinventory SET quantity= quantity-1 where book_id IN(".$cart.")";
    }
  else{
    $sql = "UPDATE bookinventory SET quantity= quantity-1 where book_id=".$cart."";
  }
    // echo $sql;
    // die();
    $result = mysqli_query($conn, $sql);
    if ($result!='') {
        $_SESSION['cart']='';
    }
    echo json_encode("Order placed");

    }
    else
    {
        echo json_encode("cart is empty");

    }
}else{
   
    echo json_encode("please enter valid data");
}

}





?>
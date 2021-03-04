<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['userid']) && isset($_SESSION['email'])) {
//  $_SESSION['cart']='';
    // if(isset($_SESSION['cart']))
    // {
    //      print_r($_SESSION['cart']);
    // }
    $sql = "SELECT * FROM bookinventory limit 6";
    $result = mysqli_query($conn, $sql);
    // $rows=mysqli_fetch_assoc($result);
    // print_r( $rows);

    //   die();
	if ($result!='' && mysqli_num_rows($result) >0) {
        // while ($row = $result->fetch_assoc()) { 
        //   echo $row['book_name'];
        // }
       
       
        // die();
    
    }

}else{
     header("Location: index.php");
     exit();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h2>All books</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>bookname</th>
        <!-- <th>Quantity</th> -->
        <th>Price</th>
        <th>Author</th>
        <th>Action</th>


      </tr>
    </thead>
    <tbody>
    <?php 
    while ($row = $result->fetch_assoc()) { 
        echo ' <tr>
        <td>'.$row['book_name'].'</td>
        <td>'.$row['price'].'</td>
        <td>'.$row['Author'].'</td>
        <td><a style="color:white;" id="book_'.$row['book_id'].'" type="button" class="btn btn-primary" >Add to cart</a></td>


      </tr>';
      }
    
    ?>
    
     
    
    </tbody>
  </table>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $("a").click(function(e){
        e.preventDefault();
        var id=$(this).attr('id');
        var res = id.split("_");
        var a=res[1];
        console.log(res);
        $.ajax({
    type: "POST",
    url: './cart.php',
    data:{id:a,Action:'add'},
    success: function(response){
        //if request if made successfully then the response represent the data

       alert('success');
    }
  });
      
       

       

    });
       
});
</script>

<?php 
session_start();
// $_SESSION['cart']='';

include "db_conn.php";
if (isset($_SESSION['email'])) {
    
   
    $x=0;
    if(isset($_SESSION['cart']))
    {
        if(($_SESSION['cart']!=''))
        {
            $cart=implode(",",$_SESSION['cart']);
            $sql = "SELECT * FROM bookinventory where book_id IN(".$cart.")";
            $result = mysqli_query($conn, $sql);
           
            if ($result!='' && mysqli_num_rows($result) >0) {
               
            
            }
        }

       
    
    }
   
}else{
     header("Location: index.php");
     exit();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Craig's Book Barn</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <style>
        h1 {
            text-align: left;
            padding: 4% 4% 4% 1%;
        }

        .books {
            margin: auto;
            width: 50%;
            padding: 20px;
            background-color: #f1f1f1;
            text-align: center;

        }
    </style>
</head>

<body>
    <!-- Start your project here-->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <a class="navbar-brand" href="#">
                        <img src="img/book1.png" height="40" alt="" loading="lazy" />
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./books.php">Books</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./checkout.php">checkout</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav d-flex flex-row">
                        <!-- Icons -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#">
                                <span class="badge badge-pill bg-danger">1</span>
                                <span><i class="fas fa-shopping-cart"></i></span>

                            </a>
                        </li>

                        <!-- Icon dropdown -->
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Sign in</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<div class="container">
  <h2>Checkout page</h2>
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
    if(isset($_SESSION['cart'])){
        if($_SESSION['cart']!=''&& $result!=''){
        while ($row = $result->fetch_assoc()) { 
            $x+=$row['price'];
            echo ' <tr>
            <td>'.$row['book_name'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['Author'].'</td>
            <td><a style="color:white;" id="book_'.$row['book_id'].'" type="button" class="addbtn btn btn-danger addbtn" >Delete</a></td>
    
          </tr>';
          }
    }  else{
        echo '<div class="alert alert-danger" role="alert">
        Empty Cart
      </div>';
    }
}
    else{
        echo '<div class="alert alert-danger" role="alert">
        Empty Cart
      </div>';
    }
  
    
    ?>
    
     
    
    </tbody>
     <div class="row">
      <div class="col-lg-4">

      <h3 class="heading">Price: <p><?php echo $x;?></p></h3>
    </div>
    <div class="col-lg-4">

      <h3 class="heading">Gst: <p><?php $total=$x*0.13; echo $total;?></p></h3>
    </div>
    <div class="col-lg-4">

      <h3 class="heading">Total: <p><?php $total=$x*0.13; echo $x+$total;?></p></h3>
    </div>
      </div>

  </table>
  
  <form >
  
  <div class="form-group">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" class="form-control" placeholder="Enter First Name" id="fname" required>
  </div>
  <div class="form-group">
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" id="lname" required>
  </div>
  <strong>Payment method?</strong>

  <div class="form-check">

   <input class="form-check-input" type="radio" name="payment"  value="cash" checked>
   <label class="form-check-label" >
   Cash
   </label>
</div>
<div class="form-check">
   <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="visa">
   <label class="form-check-label" >
   Visa
   </label>
</div>
 
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $(".addbtn").click(function(e){
        e.preventDefault();
        var id=$(this).attr('id');
        var res = id.split("_");
        var a=res[1];
        console.log(res);
        $.ajax({
    type: "POST",
    url: './cart.php',
    data:{id:a,Action:'Delete'},
    success: function(response){
        $('.alert').text(response);
    }
  });
      
    });
    $("#submit").click(function(e){
        e.preventDefault();
       var fname= $('#fname').val();
       var lname= $('#fname').val();

        $.ajax({
    type: "POST",
    url: './cart.php',
    data:{fname:fname,lname:lname,Action:'update'},
    success: function(response){
       alert(response);
       $('.alert').text(response);
    }
  });
      
       

       

    });
       
});
</script>

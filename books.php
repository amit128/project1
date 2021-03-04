<?php 
session_start();


    include "db_conn.php";
    if ( isset($_SESSION['email'])) {
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
                            <a class="nav-link" href="#">Books</a>
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
        <!-- Navbar -->


        
    </header>
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
        <td><a style="color:white;" id="book_'.$row['book_id'].'" type="button" class="addbtn btn btn-primary" >Add to cart</a></td>


      </tr>';
      }
    
    ?>
    
     
    
    </tbody>
  </table>
</div>
    <section class="">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color: #0a4275;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: CTA -->
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-3">Register for free</span>
                        <button type="button" class="btn btn-outline-light btn-rounded">
                            Sign up!
                        </button>
                    </p>
                </section>
                <!-- Section: CTA -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-white" href="#">Craigsbookbarn.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>



    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body></html>
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
    data:{id:a,Action:'add'},
    success: function(response){
        //if request if made successfully then the response represent the data

       alert('success');
    }
  });
      
       

       

    });
       
});
</script>

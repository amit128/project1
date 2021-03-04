<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['userid']) && isset($_SESSION['email'])) {

    $sql = "SELECT * FROM bookinventory limit 6";
    $result = mysqli_query($conn, $sql);
    // print_r(mysqli_fetch_array($result));
    // die();
	if ($result!='' && mysqli_num_rows($result)> 1) {
        $rows=mysqli_fetch_array($result);
       
        // foreach(mysqli_fetch_array($result) as $row )
        // {
        //     echo $row['email'];
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
                            <a class="nav-link" href="#">About Us</a>
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


        <!-- Background image -->
        <div class="p-5 text-center bg-image shadow-1-strong" style="
      background-image: url('img/clem-onojeghuo-0PPKxWtYh0g-unsplash.jpg');
      height: 600px;
    ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Mitali Book store</h1>
                        <h4 class="mb-3">Your searches end here...Sale upto 20%!</h4>
                        <a class="btn btn-outline-light btn-lg" href="#!" role="button">Explore Books</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <main class="mt-5">
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Navbar brand -->


                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <strong class="text-dark mr-2">Categories:</strong>
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Comic Books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Novels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Historical Fiction</a>
                            </li>
                        </ul>
                        <!-- Left links -->

                        <!-- Search form -->
                        <form class="d-flex input-group w-auto">
                            <input type="search" class="form-control" placeholder="Search Books" aria-label="Search" />
                            <button class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark">
                                Search
                            </button>
                        </form>
                    </div>
                    <!-- Collapsible wrapper -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
            <!-- Book Section -->
            <!-- Carousel wrapper -->
            </div>

            <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">

                <!-- Inner -->
                <div class="carousel-inner py-4">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/181.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/182.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/183.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/185.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/186.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/187.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/188.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
                                    <div class="card">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/189.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Inner -->
                <!-- Controls -->
                <div class="d-flex justify-content-center mb-4">
                    <button class="carousel-control-prev position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel wrapper -->
            <!-- End your project here-->

            <!-- MDB -->

        </div>
    </main>
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
</body>

</html>

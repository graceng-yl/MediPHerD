<?php
    // connect the MySQL server
    $conn = mysqli_connect("localhost", "root", "");
    if(!$conn){
        die("Could not connect to the server</body></html>"); 
    }

    // access the database
    if(!mysqli_select_db($conn, "medipherd")){
        die("Could not connect to the database</body></html>"); 
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href=""> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md justify-content-center" style="background-color: var(--c_darkgreen);">
            <!-- <div class="collapse navbar-collapse justify-content-center" id="navbarToggle">

                <ul class="navbar-nav">
                    <li class="nav-item pe-5">
                        <a class="nav-link active " href="#">Home </a>
                    </li>
                    <li class="nav-item pe-5">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>


              
            <a class="navbar-brand d-none d-lg-block" href="#">Navbar</a>



            <ul class="navbar-nav">
                <li class="nav-item ps-auto">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item ps-5">
                    <a class="nav-link" href="#">Link</a>
                </li>

            </ul>
            </div> -->
            <!-- <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Left</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="//codeply.com">Codeply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Right</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div> -->
            <!-- <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Left</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="//codeply.com">Codeply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Right</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div> -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item my-auto col-1 me-5 ml-auto">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item my-auto col-4 col-md-offset-2 ps-4">
                    <a class="nav-link" href="browse.php">Browse Database</a>
                </li>
                <li class="nav-item my-auto col-5">
                    <div class="mx-auto order-0">
                        <a class="navbar-brand" href="index.php">
                            <img src="www/logo.png" alt="Logo" href />
                        </a>

                    </div>
                </li>

                <li class="nav-item my-auto col-3">
                    <form class="d-flex form-inline mx-auto" action="searchresult.php" method="POST"
                        id="form_navsearch">

                        <input class="form-control me-5 rounded-pill" type="search" placeholder="Quick Search"
                            aria-label="Search" name="nav-search" id="nav-search"><i class="fas fa-search"
                            aria-hidden="true"></i>

                    </form>
                </li>
                <li class="nav-item my-auto col-3">
                    <a class="nav-link" href="advsearch.php">Advanced Search</a>
                </li>



            </ul>


        </nav>


    </header>

    <?php
?>
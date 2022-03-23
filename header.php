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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    <script src="js/script.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">

            </div>
            <div class="menu text-right">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="browse.php">Browse</a></li>
                    <li><input type="text"></li>
                    <li><a href="advsearch.php">Advanced Search</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </nav>
    </header>
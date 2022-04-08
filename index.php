<?php
include('header.php');
// select randomly 3 plants
$query = "SELECT * FROM plants ORDER BY RAND() LIMIT 3;";
if(!($result = mysqli_query($conn, $query))){
    echo "<p>Could not execute query</p>";
    die(mysqli_error($conn)."</body.</html>");
}
?>

<div class="container py-5">
    <div class="home_top">
        <div class="d-flex justify-content-center align-items-center">
            <p class="mx-auto home_title">MediPHerD</p>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <p class="home_desc">Malaysian Medical Plants and Herbs Database</p>
        </div>

        <div class="row height d-flex justify-content-center align-items-center">
            <form class="d-flex form-inline mx-auto" action="searchresult.php" method="POST" id="form_homepagesearch">

                <input class="form-control" type="search" placeholder="Tongkat Ali" aria-label="Search"
                    name="homepage-search" id="homepage-search"><i class="fas fa-search" aria-hidden="true"></i>

            </form>
            <div class="home_advs">
                <a href="advsearch.php">Advanced Search</a>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center py-5">
            <div class="home_about">
                <p>Malaysian Medicinal Plants and Herbs Database (MediPHerD), a database that provide medical information of medical plants in Malaysia. This database aims to help public in understanding and exploring Malaysia plant toxicity and protect human and animals from natural poisons.</p>
            </div>

        </div>
    </div>

    <div class="home_bottom">
        <div class="row mx-auto justify-content-center">
<?php
            while($row = mysqli_fetch_assoc($result)){
?>
                <div class="col-sm-12 col-md-3 mx-2 home_image" id="<?php echo $row['plant_id']; ?>">
                    <div class="hover hover-1 text-white">
                        <img class="img-fluid img-center" src=<?php echo "www/".$row['plant_id'].".jpg"; ?> />
                        <div class="hover-overlay"></div>
                        <div class="hover-1-content px-5 py-4">
                            <h3 class="hover-1-title text-uppercase font-weight-bold mb-1"><?php echo $row['plant_name']; ?></h3>
                            <p class="hover-1-description  mb-0"><?php echo preg_replace('/((\w+\W*){'.(10-1).'}(\w+))(.*)/', '${1}...', $row['plant_usage']); ?></p>
                        </div>
                    </div>
                </div>
<?php
            }
?>
            
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
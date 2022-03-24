<?php
include('header.php');
?>

<div class="container py-5">
    <div class="d-flex justify-content-center align-items-center">
        <p class="mx-auto" style="font-size: var(--font_xlarge);">MediPHerD</p>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <p>Malaysia Medical Plants and Herbs Database</p>
    </div>

    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-3 ">
            <form class="d-flex form-inline mx-auto" action="searchresult.php" method="POST" id="form_homepagesearch">

                <input class="form-control rounded-pill" type="search" placeholder="Tongkat Ali" aria-label="Search"
                    name="homepage-search" id="homepage-search"><i class="fas fa-search" aria-hidden="true"></i>

            </form>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center py-5">
        <div style="text-align:justify;width: 60%;">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda odio illo, officia temporibus cumque
                nobis ipsa repellat commodi facilis aliquid totam eius, reprehenderit aut incidunt iste ea iure,
                suscipit
                ipsum.</p>
        </div>

    </div>
    <!-- <div class="input-box"> <input type="text" class="form-control"> <i class="fa fa-search"></i> </div> -->

</div>


<?php
include('footer.php');
?>

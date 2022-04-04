<?php
include('header.php');
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
                <p>Malaysian Medicinal Plants and Herbs Database (MediPHerD), a database that provide medical information of
                    medical plants in Malaysia. This database aims to help public in understanding and exploring Malaysia
                    plant toxicity and protect human and animals from natural poisons.</p>
            </div>

        </div>
    </div>

    <div class="home_bottom">
        <div class="row mx-auto justify-content-center">

            <div class="col-sm-12 col-md-3 mx-2">
                <div class="hover hover-1 text-white">
                    <img class="img-fluid img-center" src="www/P047.jpg" />
                    <div class="hover-overlay"></div>
                    <div class="hover-1-content px-5 py-4">
                        <h3 class="hover-1-title text-uppercase font-weight-bold mb-1">Belalai Gajah</h3>
                        <p class="hover-1-description  mb-0">Treat cancer, inflammation and various skin
                            problems
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-3 mx-2">
                <div class="hover hover-1 text-white">
                    <img class="img-fluid img-center" src="www/P056.jpg" />
                    <div class="hover-overlay"></div>
                    <div class="hover-1-content px-5 py-4">
                        <h3 class="hover-1-title text-uppercase font-weight-bold mb-1">Bunga Telang</h3>
                        <p class="hover-1-description mb-0">Promote memory and inteligence, cure insect
                            bites, skin diseases, eye infections
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-3 mx-2">
                <div class="hover hover-1 text-white">
                    <img class="img-fluid img-center" src="www/P052.jpg" />
                    <div class="hover-overlay"></div>
                    <div class="hover-1-content px-5 py-4">
                        <h3 class="hover-1-title text-uppercase font-weight-bold mb-1">Halia Bara</h3>
                        <p class="hover-1-description  mb-0">Treat stomach discomfort, tumours, and
                            relieve
                            rheumatic pains
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
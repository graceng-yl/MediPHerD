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
            <p>Malaysian medicinal plants and herbs database system, a system that provide medical information of
                medical plants in Malaysia. This system aims to help public in understanding and exploring Malaysia
                plant toxicity and protect human and animals from natural poisons.</p>
        </div>

    </div>

    <!-- <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <img class="img-responsive" src="www/Naga_Buana.jpg" />
        </div>
        <div class="col-md-4">
            <img class="img-responsive" src="www/Rosa.jfif" />
        </div>

        <div class="col-md-4 h-100">
            <img class="img-responsive" src="www/Belalai_Gajah.jpg" />
        </div>

    </div> -->

    <!-- <div class="album">
        <div class="imgContainer">
            <div class="row mt-3">
                <div class="col px-2">
                    <img src="www/Belalai_Gajah.jpg">
                </div>
                <div class="col px-2">
                    <img src="www/Halia_Bara.jpg">
                </div>
                <div class="col px-2">
                    <img src="www/Rosa.jfif">
                </div>
            </div>


        </div>
    </div> -->

    <div class="container">
        <div class="row mx-auto justify-content-center">
            <!-- <div class="col-sm-12 col-md-3 mx-2">
                <img class="img-fluid img-center" src="www/Belalai_Gajah.jpg" />
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, quisquam?</p>
                </div>

            </div> -->

            <div class="col-sm-12 col-md-3 mx-2">
                <div class="hover hover-1 text-white">
                    <img class="img-fluid img-center" src="www/Belalai_Gajah.jpg" />
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
                    <img class="img-fluid img-center" src="www/Bunga_Telang.jpg" />
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
                    <img class="img-fluid img-center" src="www/Halia_Bara.jpg" />
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
            <!-- <div class="col-sm-12 col-md-3 mx-2">
                <img class="img-fluid img-center" src="www/Halia_Bara.jpg" />

            </div> -->
        </div>


    </div>
</div>


<?php
include('footer.php');
?>
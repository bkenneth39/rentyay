<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    @import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");

    .content {
        position: relative;
        top: 90px;
        width: 100%;
    }

    .jumbotron {
        width: 100%;
        color: white;

        /* The image used */
        background-image: url("/img/bannerhome2.jpg");
        background-blend-mode: darken;

        /* Set a specific height */
        min-height: 550px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .jumbotroncontent {
        position: relative;
        top: 80px;
    }

    .display-4 {
        font-weight: 400;
        text-shadow: 2px 2px #414141;
    }

    .my-4 {
        color: white;
    }


    .carouselStyle .card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 50vh;
        border-radius: 25px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .carouselStyle .card.first {
        background-image: url('img/bannerConsole.jpg');
    }

    .carouselStyle .card h1 {
        /* font-weight: 600; */
        font-size: 60px;
        text-shadow: 3px 3px 5px #222222;
        color: white;
    }

    .carouselStyle .card.second {
        background-image: url('/img/bannerhome.png');
    }

    .carouselStyle .card.third {
        background-image: url('img/bannerFifa.jpg');
        background-position-y: 10%;
        color: white;
    }

    .carouselStyle #carouselExampleCaptions {
        border-radius: 25px;
        width: 100%;
        box-shadow: 6px 6px 15px #b8b8b8;
    }

    .lead {
        font-weight: 300;
        text-shadow: 2px 2px #080808;
    }

    .playstation {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .button-rent-playstation {
        display: flex;
        justify-content: center;
        padding: 0px 0px 25px;
    }

    .button-rent-play {
        position: relative;
        top: 15px;
        width: 250px;
        height: 50px;
        border-radius: 20px;
    }

    .youtube {
        padding: 0px 0px 55px;
        display: flex;
    }

    .youtube-frame {
        display: flex;
        justify-content: center;
    }

    .youtube-frame.vid {
        margin-top: 30px;
    }

    .frameyoutube {
        position: relative;
    }

    /*---------------DESKTOP---------------------*/

    .footer {
        position: relative;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #020202;
        display: flex;
        justify-content: center;
        padding: 10px 0;
        padding-top: 25px;
        color: white;
    }

    .footer .row {
        width: 100%;
    }

    .footer .row .col {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .footer .row .col img {
        width: 255px;
    }

    .footer .row .col p {
        margin-top: 10px;
        width: 250px;
        text-align: left;
    }

    .footer .row .col iframe {
        width: 100%;
        height: 100%;
    }

    .footer .row .col .icons img {
        width: 30px;
        margin: 0 8px;
    }

    /*-----------------------------------------*/

    /*---------------MOBILE---------------------*/

    .footer2 {
        position: relative;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #020202;
        display: none;
        /* display: flex;
        flex-direction: column;
        justify-content: center; */
        padding: 10px 0;
        padding-top: 25px;
        color: white;
    }

    .footer2 .row {
        width: 100%;
        margin: 20px 0;
    }

    .footer2 .row .col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .footer2 .row .col img {
        width: 255px;
    }

    .footer2 .row .col p {
        width: 255px;
        text-align: center;
    }

    .footer2 .row .col iframe {
        width: 80%;
        height: 100%;
    }

    .footer2 .row .col .icons img {
        width: 30px;
        margin: 0 8px;
    }

    /*-----------------------------------------*/

    @media only screen and (max-width: 799px) {
        .footer {
            display: none;
        }

        .footer2 {
            display: block;
        }
    }

    @media only screen and (max-width: 541px) {

        .carouselStyle .card h1 {
            /* font-weight: 600; */
            font-size: 40px;
            text-shadow: 3px 3px 5px #222222;
        }

        .carouselStyle .card.first {
            background-position-x: 50%;
        }
    }

    @media only screen and (max-width: 390px) {
        .display-4 {
            font-size: 40px;
        }

        .carouselStyle .card h1 {
            /* font-weight: 600; */
            font-size: 20px;
            text-shadow: 3px 3px 5px #222222;
        }
    }
</style>

<div class="content">

    <div class="jumbotron">
        <div class="jumbotroncontent">
            <div class="container">
                <h1 class="display-4">Xbox Series X</h1>
                <p class="lead">Fastest and most powerful Xbox ever</p>
                <a class="btn btn-primary btn-lg" href="<?= base_url() ?>/RentList/detail/Xbox%20Series%20X" role="button">Try it Now!</a>
            </div>
        </div>
    </div>

    <div class="container carouselStyle" style="display:flex; justify-content:center">
        <div class="row" style="width: 100%;">
            <div class="col" style="width: 100%">
                <div style="width: 100%;" id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a style="text-decoration: none" href="<?= base_url() ?>/rentlist/console">
                                <div class="card first">
                                    <h1>Select Console</h1>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a style="text-decoration: none" href="<?= base_url() ?>/rentlist/allAccessories">
                                <div class="card second">
                                    <h1>Select Accessories</h1>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a style="text-decoration: none" href="<?= base_url() ?>/rentlist/allGames">
                                <div class="card third">
                                    <h1>Select Games</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <br>

    <div class="container">
        <img src="https://gmedia.playstation.com/is/image/SIEPDC/ps5-family-image-block-01-en-16sep20?$1600px--t$" class="img-fluid" alt="Responsive image">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12 playstation">
                <h1>PlayStation®5</h1>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12 playstation">
                <p>Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 button-rent-playstation">
                <a class="btn btn-dark btn-lg button-rent-play" href="<?= base_url() ?>/RentList/detail/PlayStation%205%20Console" role="button">Rent it now!</a>
            </div>
        </div>

        <div class="row youtube">
            <span class="col-lg-12 col-md-12 col-sm-12 col-sm-12"><br><br></span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 youtube-frame">
                <h1>Tips of the day</h1>
            </div>
            <span class="col-lg-12 col-md-12 col-sm-12 col-sm-12"><br></span>

            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/HYRAeOlXUB4" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/A4OTu9nG1LY" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/cssQqLj7vf4" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Footer in full desktop -->

    <div class="footer">
        <div class="row">
            <div class="col">
                <a href="<?= base_url('aboutus'); ?>"><img src="/img/logoputih.png" alt=""></a>
                <p>Summarecon Digital Center
                    Jalan Scientia Boulevard
                    Gading Serpong, Tangerang Selatan
                </p>
            </div>
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.052164018205!2d106.61432401476937!3d-6.25685889547114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc65266c0e8d%3A0x2870ec66797ea59f!2sSummarecon%20Digital%20Center%2C%20Curug%20Sangereng%2C%20Kec.%20Klp.%20Dua%2C%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1622397133795!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col">
                <h3>Follow Us On :</h3>
                <div class="icons">
                    <a target="blank" href="https://www.instagram.com/playstation/"><img src="https://iyadsughayer.com/wp-content/uploads/2018/11/Instagram-icon-WHITE.png" alt=""></a>
                    <a target="blank" href="https://www.facebook.com/playstation/"><img src="https://iconsplace.com/wp-content/uploads/_icons/ffffff/256/png/facebook-icon-18-256.png" alt=""></a>
                    <a target="blank" href="https://api.whatsapp.com/send?phone=6281230046555&text=Halo%20Admin,%20"><img src="img/whatsapp.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------ -->

    <!-- Footer in Mobile Device -->


    <div class="footer2">
        <div class="row">
            <div class="col">
                <a href="<?= base_url('aboutus'); ?>"><img src="/img/logoputih.png" alt=""></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.052164018205!2d106.61432401476937!3d-6.25685889547114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc65266c0e8d%3A0x2870ec66797ea59f!2sSummarecon%20Digital%20Center%2C%20Curug%20Sangereng%2C%20Kec.%20Klp.%20Dua%2C%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1622397133795!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Follow Us On :</h3>
                <div class="icons">
                    <a target="blank" href="https://www.instagram.com/playstation/"><img src="https://iyadsughayer.com/wp-content/uploads/2018/11/Instagram-icon-WHITE.png" alt=""></a>
                    <a target="blank" href="https://www.facebook.com/playstation/"><img src="https://iconsplace.com/wp-content/uploads/_icons/ffffff/256/png/facebook-icon-18-256.png" alt=""></a>
                    <a target="blank" href="https://api.whatsapp.com/send?phone=6281230046555&text=Halo%20Admin,%20"><img src="img/whatsapp.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>


    <!-- ------------------------ -->


</div>




<?= $this->endSection(); ?>
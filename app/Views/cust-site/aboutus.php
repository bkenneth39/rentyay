<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .maincontent {
        position: relative;
        top: 90px;
        margin: 0;
        padding: 0;
        background: #eee;
        padding-bottom: 5vh;
    }


    /* ===== ABOUT PAGE ===== */

    .team-item {
        padding: 35px;
        padding-right: 0;
        position: relative;
        z-index: 0;
    }

    .team-item:after,
    .team-item:before {
        content: "";
        position: absolute;
        -webkit-box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
        box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
        border-radius: 10px;
        z-index: -1;
    }

    .team-item:before {
        height: 100%;
        background-color: #fff;
        left: 0;
        top: 0;
        right: 30px;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .team-item:after {
        height: 6px;
        width: calc(100% - 30px);
        background-color: #000000;
        left: 0;
        bottom: 0;
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .team-item:hover:after {
        height: 100%;
    }

    .team-item .img-holder {
        -ms-flex-negative: 0;
        flex-shrink: 0;
        -webkit-box-shadow: 0 0 20px 0 rgba(51, 51, 51, 0.2);
        box-shadow: 0 0 20px 0 rgba(51, 51, 51, 0.2);
        border-radius: 10px;
        width: calc(100% - 70px);
        margin-left: 70px;
        overflow: hidden;
    }

    .team-item .img-holder img {
        border-radius: 10px;
        width: 100%;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        -webkit-transition: all 0.6s ease;
        transition: all 0.6s ease;
    }

    .team-item:hover .img-holder img {
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .team-item .socials {
        position: absolute;
    }

    .team-item .socials a {
        display: block;
        margin-right: 0;
        margin-bottom: 15px;
        -webkit-box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
    }

    .team-item .socials a:last-of-type {
        margin-bottom: 0;
    }

    .team-item .team-content {
        margin-right: 70px;
        text-align: center;
    }

    .team-item .team-content h5 {
        color: #101f41;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .team-item .team-content p {
        color: #221b1b;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        font-weight: 600;
        font-size: 14px;
    }

    .team-item:hover .team-content h5,
    .team-item:hover .team-content p {
        color: #fff;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .d-inline-block {
        display: inline-block !important;
    }

    .socials a {
        width: 35px;
        height: 35px;
        background-color: #494949;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 2px 0 #494949;
        box-shadow: 0 3px 2px 0 #494949;
        text-align: center;
        color: #fff;
        padding-top: 10px;
        font-size: 16px;
        margin-right: 10px;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .socials a:hover {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }

    .mb-2,
    .my-2 {
        margin-bottom: .5rem !important;
    }

    h5 {
        font-size: 21px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }
</style>


    <div class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-left text-center text-lg-left">
                        <h3 style="text-align: center;" class="top-sep">Meet the Teams</h3>
                        <p style="text-align: center;">IF430-FL</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 mb-30">
                    <div class="team-item">
                        <div class="mb-30 position-relative d-flex align-items-center">
                            <span class="socials d-inline-block">
                                <a href="https://github.com/bkenneth39" class="zmdi zmdi-github"></a>
                                <a href="https://www.linkedin.com/in/bryankenneth/" class="zmdi zmdi-linkedin"></a>
                                <a href="https://www.instagram.com/bkenneth39/" class="zmdi zmdi-instagram"></a>
                            </span>
                            <span class="img-holder d-inline-block">
                                <img src="/img/bryankenneth.jpg" alt="Team">
                            </span>
                        </div>
                        <div class="team-content">
                            <h5 class="mb-2">Bryan Kenneth</h5>
                            <p class="text-uppercase mb-0">00000034835</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-30">
                    <div class="team-item">
                        <div class="mb-30 position-relative d-flex align-items-center">
                            <span class="socials d-inline-block">
                                <a href="https://github.com/Wil-lab07" class="zmdi zmdi-github"></a>
                                <a href="https://www.linkedin.com/in/chandraWilliam/" class="zmdi zmdi-linkedin"></a>
                                <a href="https://www.instagram.com/willy_c8/" class="zmdi zmdi-instagram"></a>
                            </span>
                            <span class="img-holder d-inline-block">
                                <img src="/img/william.jpg" alt="Team">
                            </span>
                        </div>
                        <div class="team-content">
                            <h5 class="mb-2">William Chandra</h5>
                            <p class="text-uppercase mb-0">00000034995</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-30">
                    <div class="team-item">
                        <div class="mb-30 position-relative d-flex align-items-center">
                            <span class="socials d-inline-block">
                                <a href="https://github.com/FelixFer" class="zmdi zmdi-github"></a>
                                <a href="https://www.linkedin.com/in/felix-ferdinand-1394b9180/" class="zmdi zmdi-linkedin"></a>
                                <a href="https://www.instagram.com/felferdinand/" class="zmdi zmdi-instagram"></a>
                            </span>
                            <span class="img-holder d-inline-block">
                                <img src="/img/felix.jpg" alt="Team">
                            </span>
                        </div>
                        <div class="team-content">
                            <h5 class="mb-2">Felix Ferdinand</h5>
                            <p class="text-uppercase mb-0">00000035927</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>
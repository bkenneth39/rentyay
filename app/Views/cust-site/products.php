<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php //$cart->destroy(); 
?>

<style>
    /* ----------------------UMUM--------------------- */
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        position: relative;
        top: 90px;
        width: 100%;
    }

    /* ----------------------------------------------- */

    /* ----------------------STORE--------------------- */

    .dropdowns {
        padding: 10px 0;
    }

    .dropdowns .row {
        width: 500px;
        display: flex;
        justify-content: center;
    }

    .dropdowns .btn-group a {
        color: #000000;
        transition: 0.5s;
        border: none;
    }

    .dropdowns .btn-group a:hover {
        color: #343a40;
    }

    .cards .storeCard {
        background-color: white;
        border-radius: 15px;
        transition: 0.2s;
    }

    .cards .storeCard:hover {
        box-shadow: 3px 5px 3px darkgray;
    }

    .cards .card {
        border: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .cards .card img {
        width: 220px;
        padding: 10px;
        transition: 0.4s;
    }

    .cards .card img:hover {
        padding: 0px;
    }



    .cards .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: 290px;
    }

    .cards .card-body .form-group {
        display: flex;
        width: 110px;
        justify-content: space-between;
        align-items: center;
    }

    .cards .card-body .form-group input {
        width: 60px;
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

    /* ----------------------------------------------- */
</style>

<div class="content">

    <div class="dropdowns">

        <div class="btn-group">
            <a type="button" href="<?= base_url() ?>/rentlist" class="btn">All</a>
        </div>

        <div class="btn-group">
            <a type="button" href="<?= base_url() ?>/rentlist/console" class="btn">Console</a>
        </div>

        <div class="btn-group">
            <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Games
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/allGames">All Games</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/PS5 Game">Playstation 5</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/PS4 Game">Playstation 4</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/Xbox Game">Xbox</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/Nintendo Game">Nintendo Switch</a>
            </div>
        </div>

        <div class="btn-group">
            <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Accessories
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/allAccessories">All Accessories</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/PS5 Accessories">Playstation 5</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/PS4 Accessories">Playstation 4</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/XBox Accessories">Xbox</a>
                <a class="dropdown-item" href="<?= base_url() ?>/rentlist/Nintendo Accessories">Nintendo Switch</a>
            </div>
        </div>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" style="display: flex; align-items: center; justify-content: center;" role='alert'>
                <?= session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

    </div>


    <!-- Declare Array Data Nama di Cart -->

    <?php
    $data = $cart->contents();

    $dataArr = [];

    foreach ($data as $value) {
        array_push($dataArr, $value['name']);
    }
    ?>

    <!-- ------------------------------- -->

    <div class="container cards">
        <?php foreach (array_chunk($list, 4) as $item) : ?>
            <div class="row">
                <?php foreach ($item as $key => $value) : ?>
                    <div class="col-md storeCard" style="margin: 10px;">

                        <div class="card">
                            <a href="<?= base_url() ?>/rentlist/detail/<?= $value['nama'] ?>"><img class="image" src="/img/<?= $value['gambar'] ?>" alt=""></a>
                        </div>

                        <div class="card-body">

                            <h5 class="card-title text-center"><?= $value['nama']; ?></h5>
                            <p class="card-text text-center"><?= $value['harga']; ?>/day</p>

                            <?php if ($value['stock'] > 0) : ?>
                                <p style="color: green; font-weight:bold;">Available</p>
                            <?php else : ?>
                                <p style="color: red; font-weight:bold;">Out of Stock</p>
                            <?php endif; ?>

                            <form style="display:flex; flex-direction:column; align-items:center" action="<?= base_url() ?>/cart" method="post">

                                <?= csrf_field() ?>

                                <input type="hidden" name="id_products" value="<?= $value['id_products'] ?>">
                                <input type="hidden" name="name" value="<?= $value['nama'] ?>">
                                <input type="hidden" name="harga" value="<?= $value['harga'] ?>">
                                <input type="hidden" name="gambar" value="<?= $value['gambar'] ?>">

                                <!-- <div class="form-group">
                                        <label for="day">Day:</label>
                                        <input type="number" value="1" min="1" max="14" name = "day" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div> -->

                                <div class="buttons">

                                    <?php if (in_array($value['nama'], $dataArr)) : ?>
                                        <button style="width: 100px; display: flex; justify-content: center;" disabled type="submit" class="btn btn-success">Added</button>
                                    <?php else : ?>
                                        <?php if ($value['stock'] > 0) : ?>
                                            <?php if (logged_in()) : ?>
                                                <button style="width: 80px; display: flex; justify-content: space-between;" type="submit" class="btn btn-dark"><img style="width: 20px;" src="/img/carticonpngputih.png" alt="">Add</button>
                                            <?php else : ?>
                                                <button style="width: 80px; display: flex; justify-content: center;" disabled type="submit" class="btn btn-dark">Log in!</button>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?php if (logged_in()) : ?>
                                                <button style="width: 80px; display: flex; justify-content: center;" disabled type="submit" class="btn btn-danger">Empty</button>
                                            <?php else : ?>
                                                <button style="width: 80px; display: flex; justify-content: center;" disabled type="submit" class="btn btn-dark">Log in!</button>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>

                            </form>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<br><br><br><br><br><br>

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
                <a target="blank" href="https://api.whatsapp.com/send?phone=6281230046555&text=Halo%20Admin,%20"><img src="/img/whatsapp.png" alt=""></a>
            </div>
        </div>
    </div>
</div>

<!-- ------------------------ -->

<!-- Footer in Mobile Device -->


<div class="footer2">
    <div class="row">
        <div class="col">
            <a href="<?= base_url('aboutus'); ?>"> <img src="/img/logoputih.png" alt=""></a>
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
                <a target="blank" href="https://api.whatsapp.com/send?phone=6281230046555&text=Halo%20Admin,%20"><img src="/img/whatsapp.png" alt=""></a>
            </div>
        </div>
    </div>
</div>


<!-- ------------------------ -->


<?= $this->endSection(); ?>
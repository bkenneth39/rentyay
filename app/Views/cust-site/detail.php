<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    /* ----------------------UMUM--------------------- */
    body {
        /* margin: 0;
        padding: 0; */
        background-color: white;
        font-family: sans-serif;
    }

    .content-detail {
        position: relative;
        top: 90px;
        width: 100%;
        padding: 0;
        margin: 0;
        color: black;

    }

    .container {
        padding-bottom: 30px;
    }

    .button-rent {
        font-weight: bold;
        padding: 10px 20px;
    }

    .button-list {
        font-weight: bold;
        border: 1px solid #343a40;
        transition: 0.3s;
        padding: 10px 20px;
    }

    .button-list:hover {
        background-color: #343a40;
        color: white;
    }
</style>
<!-- Declare Array Data Nama di Cart -->

<?php
$data = $cart->contents();

$dataArr = [];

foreach ($data as $value) {
    array_push($dataArr, $value['name']);
}
?>

<!-- ------------------------------- -->


<div class="content-detail">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-mb-12">
                <img src="/img/<?= $list['gambar']; ?>" class="img-fluid">
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-mb-12 description-detail">
                <h1><?= $list['nama']; ?></h1>

                <br>

                <p style="text-align: justify;"><?= $list['description']; ?></p>
                <h2>Rp <?= $list['harga']; ?> / day</h2>

                <?php if ($list['stock'] > 0) : ?>
                    <p style="color: green; font-weight:bold;">Available</p>
                <?php else : ?>
                    <p style="color: red; font-weight:bold;">Out of Stock</p>
                <?php endif; ?>

                <form action="<?= base_url() ?>/cart" method="post">

                    <?= csrf_field(); ?>

                    <input type="hidden" name="id_products" value="<?= $list['id_products'] ?>">
                    <input type="hidden" name="name" value="<?= $list['nama'] ?>">
                    <input type="hidden" name="harga" value="<?= $list['harga'] ?>">

                    <!-- <div style="display: flex; width: 100px; align-items:center; justify-content:space-between;" class="form-group">
                        <label for="day">Day:</label>
                        <input style="width: 50px;" type="number" value="1" min="1" max="14" name="day" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div> -->
                   
                    <?php if (logged_in() && in_array($list['nama'], $dataArr)) : ?>
                        <button type="" disabled name="submit" class="btn btn-success button-rent">Added</button>
                    <?php else : ?>
                        <?php if (logged_in() && $list['stock'] > 0) : ?>
                            <button type="submit" name="submit" class="btn btn-dark button-rent"><img style="width: 20px;" src="/img/carticonpngputih.png" alt=""> Add</button>
                        <?php else : ?>
                            <?php if(logged_in()) : ?>
                            <button type="" disabled name="submit" class="btn btn-danger button-rent">Empty</button>
                            <?php else :  ?>
                                <button type="" disabled name="submit" class="btn btn-danger button-rent">Log In!</button>
                                <?php endif; ?>
                        <?php endif; ?>
                        
                    <?php endif; ?>



                    <a class="btn button-list" href="<?= base_url() ?>/rentlist">Back to List</a>

                </form>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>
<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

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

    body {
        background: white;
    }

    /* ----------------------------------------------- */

    /*---------------DESKTOP---------------------*/

    .footer {
        position: absolute;
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
        position: absolute;
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

    @media only screen and (max-width: 799px) {
        .footer {
            display: none;
        }

        .footer2 {
            display: block;
        }
    }

    /*-----------------------------------------*/
</style>

<?php
$data = $cart->contents();
?>

<div class="content ">
    <!-- <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga/Day</th>
                    <th scope="col">Day</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                foreach ($data as $key => $value) : ?>
                
                <tr>
                    <th scope="row"><?= $count; ?></th>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['price']; ?></td>
                    <td><?= $value['qty']; ?></td>
                    <td>Rp <?= $value['subtotal']; ?>, 00</td>
                    <?php $count++; ?>
                </tr>

                <?php
                endforeach; ?>
            </tbody>
        </table> -->

    <div class="table-responsive-md col-md">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga/Day</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                $day = 1;
                foreach ($data as $key => $value) : ?>

                    <tr>
                        <th scope="row"><?= $count; ?></th>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['price']; ?></td>
                        <td><?= $value['subtotal']; ?></td>
                        <form action="<?= base_url() ?>/cart/remove" method="post">
                            <input type="hidden" name="rowid" value="<?= $value['rowid']; ?>">
                            <td><button type="submit" name="submit" class="btn btn-danger">Cancel</button></td>
                        </form>
                        <?php $day = $value['qty']; ?>
                        <?php $count++; ?>
                    </tr>

                <?php endforeach; ?>

                <tr style="background-color: #f3f3f3">
                    <th scope="row">Day</th>
                    <td>
                        <form action="<?= base_url() ?>/Cart/Calculate" method="post">
                            <div class="form-group" style="display: flex;">
                                <input onchange="this.form.submit()" style="width: 110px;" type="number" value="<?= $day ?>" min="1" max="14" name="day" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <!-- <button type = "submit" name = "submit" class = "btn btn-dark">calculate</button> -->
                            </div>
                        </form>
                    </td>
                    <th scope="row">Total</th>
                    <td>Rp<?= $cart->total() ?>,00</td>
                    <td><a href="<?= base_url() ?>/Cart/Checkout" class="btn btn-success">Check Out</a></td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>

<?php $this->endSection(); ?>
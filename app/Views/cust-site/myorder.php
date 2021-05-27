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
</style>

<div class="content">
    <?php  ?>

    <div class="table-responsive-md col-md">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">List Barang</th>
                    <th scope="col">Durasi Peminjaman</th>
                    <th scope="col">Tanggal Peminjaman Berakhir</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $count = 1;
                foreach ($content as $value) : ?>
                    <tr>
                        <th scope="row"> <?= $count; ?> </th>
                        <td><?php
                            $nama = explode(',', $value['nama']);
                            foreach ($nama as $nm) :
                            ?>
                                <ul>
                                    <li><?= $nm; ?></li>
                                </ul>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $value['day']; ?> hari</td>
                        <td><?php
                            $date = $value['date'];
                            $day = $value['day'];
                            echo date('Y-m-d', strtotime($date . " + $day days"));

                            ?></td>
                        <td><?= $value['status']; ?></td>
                        <td>
                            <?php if ($value['status'] != 'Sudah Dikirim' && $value['status'] != 'Order Selesai') : ?>
                                
                                    <button  class="btn btn-warning" disabled>Menunggu Konfirmasi Sistem</button>
                            <?php endif; ?>
                            <?php if ($value['status'] == 'Sudah Dikirim') : ?>
                                <form action="/MyOrder/updatestatus" method="post">
                                    <input type="hidden" value="<?= $value['token']; ?>" name="token">
                                    <button type="submit" name="submit" value="Siap Di-Pick Up" class="btn btn-warning" >Siap Untuk Di-Pick Up</button>
                                </form>
                            <?php endif; ?>
                            <?php if ($value['status'] == 'Order Selesai') : ?>
                                
                                <button  class="btn btn-success" disabled>Order Selesai</button>
                        <?php endif; ?>

                        </td>

                    </tr>
                    <?php $count++; ?>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<?php $this->endSection(); ?>
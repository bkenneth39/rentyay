<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title; ?></title>
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="<?=base_url()?>/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <div class="navbar-brand ms-4">
                        <span class="logo-text">
                            <img src="/img/logo/logoputih.png" alt="homepage" class="dark-logo img-fluid" max-width: 100%; />
                        </span>
                    </div>
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white " href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <b class="nav-link text-light waves-effect waves-dark" style="font-size: 20px;"><i class="fas fa-user-alt"></i> Bryan Kenneth</b>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?=base_url()?>/Admin" aria-expanded="false">
                                <i class="fas fa-table"></i><span class="hide-menu">Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?=base_url()?>/Admin/order" aria-expanded="false">
                                <i class="fas fa-tasks"></i><span class="hide-menu">Order</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?=base_url()?>/Admin/report" aria-expanded="false">
                                <i class="fas fa-file"></i><span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?=base_url()?>/logout" aria-expanded="false">
                                <i class="fas fa-sign-out-alt"></i><span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h2 class="page-title mb-0 p-0" style="font-weight: 600;"><?= $title; ?></h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->


            <!-- Content -->
            <div class="container-fluid backG">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="/img/<?= $product['gambar']; ?>" class="card-img" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body" style="padding-right: 25px;">
                                        <h5 class="card-title"><?= $product['nama']; ?></h5>
                                        <p class="card-text">Kategori:
                                            <?php if ($product['id_category'] == 1) {
                                                echo 'Console';
                                            } else if ($product['id_category'] == 2) {
                                                echo 'PS5 Game';
                                            } else if ($product['id_category'] == 3) {
                                                echo 'PS4 Game';
                                            } else if ($product['id_category'] == 4) {
                                                echo 'XBox Game';
                                            } else if ($product['id_category'] == 5) {
                                                echo 'Nintento Game';
                                            } else if ($product['id_category'] == 6) {
                                                echo 'PS5 Accessories';
                                            } else if ($product['id_category'] == 7) {
                                                echo 'PS4 Accessories';
                                            } else if ($product['id_category'] == 8) {
                                                echo 'XBox Accessories';
                                            } else if ($product['id_category'] == 9) {
                                                echo 'Nintento Accessories';
                                            }
                                            ?>
                                        </p>
                                        <p class="card-text">Harga per hari: Rp <?= $product['harga']; ?>,00</p>
                                        <p class="card-text">Stok: <?= $product['stock']; ?></p>
                                        <p class="card-text" style="text-align: justify;"><?= $product['description']; ?></p>

                                        <a href="<?=base_url()?>/Admin/edit/<?= $product['id_products']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="<?=base_url()?>/Admin/Delete/<?= $product['id_products']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"><i class="fas fa-trash-alt"></i></button>
                                        </form>

                                        <br>
                                        <br>
                                        <a href="<?=base_url()?>/Admin" class="btn btn-primary">Back to Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Content -->

        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/waves.js"></script>
    <script src="/js/custom.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</body>

</html>
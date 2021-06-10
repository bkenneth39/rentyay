<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title; ?></title>
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="<?= base_url() ?>/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="icon" href="/img/logorputih.png" type="image/x-icon" />
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
                            <a href="<?= base_url(); ?>"><img src="/img/logoputih.png" alt="homepage" class="dark-logo img-fluid" max-width: 100%; /></a>
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
                            <b class="nav-link text-light waves-effect waves-dark" style="font-size: 20px;"><i class="fas fa-user-alt"></i>    <?= $user['fullname']; ?></b>
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
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?= base_url() ?>/Admin" aria-expanded="false">
                                <i class="fas fa-table"></i><span class="hide-menu">Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?= base_url() ?>/Admin/order" aria-expanded="false">
                                <i class="fas fa-tasks"></i><span class="hide-menu">Order</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?= base_url() ?>/Admin/report" target="blank" aria-expanded="false">
                                <i class="fas fa-file"></i><span class="hide-menu">Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" style="text-decoration: none;" href="<?= base_url() ?>/logout" aria-expanded="false">
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
                        <h2 class="page-title mb-0 p-0" style="font-weight: 600;">Dashboard</h2>
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
                        <a href="<?= base_url() ?>/Admin/add" class="btn btn-primary mb-3">Add Product</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <table class="table table-striped table-bordered mydatatable" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Picture</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($item as $i) : ?>
                                    <tr>
                                        <td><?= $i['id_products']; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td>
                                            <?php if ($i['id_category'] == 1) {
                                                echo 'Console';
                                            } else if ($i['id_category'] == 2) {
                                                echo 'PS5 Game';
                                            } else if ($i['id_category'] == 3) {
                                                echo 'PS4 Game';
                                            } else if ($i['id_category'] == 4) {
                                                echo 'XBox Game';
                                            } else if ($i['id_category'] == 5) {
                                                echo 'Nintento Game';
                                            } else if ($i['id_category'] == 6) {
                                                echo 'PS5 Accessories';
                                            } else if ($i['id_category'] == 7) {
                                                echo 'PS4 Accessories';
                                            } else if ($i['id_category'] == 8) {
                                                echo 'XBox Accessories';
                                            } else if ($i['id_category'] == 9) {
                                                echo 'Nintento Accessories';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $i['harga']; ?></td>
                                        <td><?= $i['description']; ?></td>
                                        <td><img src="/img/<?= $i['gambar']; ?>" alt="" width="100"></td>
                                        <td><?= $i['stock']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>/Admin/detail/<?= $i['id_products']; ?>" class="btn btn-success"><span><i class="fas fa-search"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('.mydatatable').DataTable();
    </script>
</body>

</html>
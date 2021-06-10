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
                    <div class="col-8">
                        <form action="<?= base_url() ?>/Admin/update/<?= $product['id_products']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="gambarLama" value="<?= $product['gambar']; ?>">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Name" autofocus value="<?= (old('name')) ? old('name') : $product['nama']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="<?= (old('category')) ? old('category') : $product['id_category']; ?>">
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
                                        </option>
                                        <option value="1">Console</option>
                                        <option value="2">PS5 Game</option>
                                        <option value="3">PS4 Game</option>
                                        <option value="4">XBox Game</option>
                                        <option value="5">Nintento Game</option>
                                        <option value="6">PS5 Accessories</option>
                                        <option value="7">PS4 Accessories</option>
                                        <option value="8">XBox Accessories</option>
                                        <option value="9">Nintento Accessories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" placeholder="Price" value="<?= (old('price')) ? old('price') : $product['harga']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('price'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('stock')) ? 'is-invalid' : ''; ?>" id="stock" name="stock" placeholder="Stock" value="<?= (old('stock')) ? old('stock') : $product['stock']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stock'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="desc" name="desc" rows="5"><?= (old('desc')) ? old('desc') : $product['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="/img/<?= $product['gambar']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                        <label class="custom-file-label" for="gambar"><?= $product['gambar']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <a href="<?= base_url() ?>/Admin" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
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
    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>
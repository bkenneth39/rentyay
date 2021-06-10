<nav class="navbar navbar-expand-lg navbar-light bg-lignt " id="navbar">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="/img/logohitam.png" class="logotop" width="100" height="23" alt="" loading="lazy">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link active navlink" href="<?= base_url() ?>/RentList/">Rent!</a></li>

            <li class="nav-item"><a class="nav-link active navlink" href="<?= base_url('aboutus'); ?>">About Us</a></li>
            <?php if (in_groups('Admin')) : ?>
                <li class="nav-item"><a class="nav-link active navlink" href="<?= base_url() ?>/Admin">Go to Admin Page</a></li>
            <?php endif; ?>
        </div>
        <div class="navbar-nav ml-auto">

            <div class="form-inline">
                <?php if (logged_in()) : ?>
                    <div class="btn-group">
                        <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?= $user['username']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url() ?>/MyOrder">My Order</a>
                        </div>
                    </div>
                    <li class="nav-item"><a class="nav-link active navlink" href="<?= base_url() ?>/logout"><button type="button" class="btn btn-dark btn-sign-in">Log out</button></li>
                <?php else :  ?>
                    <li class="nav-item"><a class="nav-link active navlink" href="<?= base_url() ?>/login"><button type="button" class="btn btn-dark btn-sign-in">Log in</button></li>
                <?php endif; ?>

                <?php if (count($cart->contents()) === 0): ?>
                    <li class="nav-item"><a class="nav-link active navlink carticon" href=""><img src="/img/carticonpng.png" width="40" height="40" alt="" loading="lazy"> <?php echo count($cart->contents()); ?> </a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link active navlink carticon" href="<?= base_url() ?>/cart/check"><img src="/img/carticonpng.png" width="40" height="40" alt="" loading="lazy"> <?php echo count($cart->contents()); ?> </a></li>
                <?php endif ; ?>
            </div>

        </div>

    </div>


</nav>
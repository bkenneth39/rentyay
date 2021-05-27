<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <?php //$cart->destroy(); ?> 

    <style>

        /* ----------------------UMUM--------------------- */
        .content{
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
        
        .dropdowns{
            padding: 10px 0;
        }
        
        .dropdowns .row{
            width: 500px;
            display: flex;
            justify-content: center;
        }

        .dropdowns .btn-group a{
            color: #000000;
            transition: 0.5s;
            border: none;
        }

        .dropdowns .btn-group a:hover{
            color: #343a40;
        }

        .cards .storeCard{
            background-color: white;
            border-radius: 15px;
            transition: 0.2s;
        }

        .cards .storeCard:hover{
            box-shadow: 3px 5px 3px darkgray;
        }

        .cards .card{
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cards .card img{
            width: 220px;
        }

        .cards .card-body{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 290px;
        }

        .cards .card-body .form-group{
            display: flex;
            width: 110px;
            justify-content: space-between;
            align-items: center;
        }

        .cards .card-body .form-group input{
            width: 60px;
        }

        /* ----------------------------------------------- */

    </style>

    <div class="content">
    
        <div class="dropdowns">
            
            <div class="btn-group">
                <a type="button" href = "<?=base_url()?>/rentlist" class="btn">All</a>
            </div>
    
            <div class="btn-group">
                <a type="button" href = "<?=base_url()?>/rentlist/console" class="btn">Console</a>
            </div>
    
            <div class="btn-group">
                <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Games
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/allGames">All Games</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/PS5 Game">Playstation 5</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/PS4 Game">Playstation 4</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/Xbox Game">Xbox</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/Nintendo Game">Nintendo Switch</a>
                </div>
            </div>
    
            <div class="btn-group">
                <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accessories
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/allAccessories">All Accessories</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/PS5 Accessories">Playstation 5</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/PS4 Accessories">Playstation 4</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/XBox Accessories">Xbox</a>
                    <a class="dropdown-item" href="<?=base_url()?>/rentlist/Nintendo Accessories">Nintendo Switch</a>
                </div>
            </div>

            <?php if(session()->getFlashdata('message')): ?>
                <div class="alert alert-success alert-dismissible fade show" style = "display: flex; align-items: center; justify-content: center;"role='alert'>
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

            foreach($data as $value){
                array_push($dataArr, $value['name']);
            }
        ?>

        <!-- ------------------------------- -->

        <div class="container cards">  
            <?php foreach(array_chunk($list, 4) as $item): ?>        
                <div class="row">
                    <?php foreach($item as $key=>$value): ?>    
                        <div class="col-md storeCard" style = "margin: 10px;">
            
                            <div class="card">
                                <a href="<?=base_url()?>/rentlist/detail/<?=$value['nama']?>"><img src="/img/<?=$value['gambar']?>" alt=""></a>
                            </div>
                            
                            <div class="card-body">
                                
                                <h5 class="card-title text-center"><?= $value['nama'];?></h5>
                                <p class="card-text text-center"><?= $value['harga']; ?>/day</p>

                                <?php if ($value['stock'] > 0) : ?>
                                    <p style="color: green; font-weight:bold;">Available</p>
                                <?php else : ?>
                                    <p style="color: red; font-weight:bold;">Out of Stock</p>
                                <?php endif; ?>
                                
                                <form style = "display:flex; flex-direction:column; align-items:center" action="<?=base_url()?>/cart" method="post">
                                    
                                    <?= csrf_field() ?>
                                    
                                    <input type = "hidden" name = "id_products" value="<?=$value['id_products']?>">
                                    <input type = "hidden" name = "name" value="<?=$value['nama']?>">
                                    <input type = "hidden" name = "harga" value="<?=$value['harga']?>">
                                    <input type = "hidden" name = "gambar" value="<?=$value['gambar']?>">

                                    <!-- <div class="form-group">
                                        <label for="day">Day:</label>
                                        <input type="number" value="1" min="1" max="14" name = "day" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div> -->

                                    <div class="buttons">
                                                                            
                                        <?php if(in_array($value['nama'], $dataArr)): ?>
                                            <button style = "width: 100px; display: flex; justify-content: center;" disabled type = "submit" class="btn btn-success">Added</button>
                                        <?php else: ?>
                                            <?php if ($value['stock'] > 0) : ?>
                                                <?php if(logged_in()) : ?>
                                                    <button style = "width: 80px; display: flex; justify-content: space-between;" type = "submit" class="btn btn-dark"><img style = "width: 20px;" src="/img/carticonpngputih.png" alt="">Add</button>
                                                <?php else : ?>
                                                    <button style = "width: 80px; display: flex; justify-content: center;" disabled type = "submit" class="btn btn-dark">Log in!</button>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php if(logged_in()) : ?>
                                                    <button style = "width: 80px; display: flex; justify-content: center;" disabled type = "submit" class="btn btn-danger">Empty</button>
                                                <?php else : ?>
                                                    <button style = "width: 80px; display: flex; justify-content: center;" disabled type = "submit" class="btn btn-dark">Log in!</button>
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

<?= $this->endSection(); ?>

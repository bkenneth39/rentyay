<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .content {
    position: relative;
    top: 90px;
    width: 100%;
    }
    .jumbotron {
    width: 100%;
    color: white;

    /* The image used */
    background-image: url("/img/bannerhome2.jpg");
    background-blend-mode:darken;

    /* Set a specific height */
    min-height: 550px;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

    .jumbotroncontent {
    position: relative;
    top: 80px;
    }

    .display-4 {
    font-weight: 400;
    text-shadow: 2px 2px #414141;
    }

    .my-4 {
    color: white;
    }

    .lead {
    font-weight: 300;
    text-shadow: 2px 2px #080808;
    }

    .playstation {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    }

    .button-rent-playstation {
    display: flex;
    justify-content: center;
    padding: 0px 0px 25px;
    }

    .button-rent-play {
    position: relative;
    top: 15px;
    width: 250px;
    height: 50px;
    border-radius: 20px;
    }

    .youtube {
    padding: 0px 0px 55px;
    display: flex;
    }
    .youtube-frame {
    display: flex;
    justify-content: center;
    }

    .youtube-frame.vid{
        margin-top: 30px;
    }

    .frameyoutube{
        position: relative;
    }
</style>

<div class="content">
    
    <div class="jumbotron">
        <div class="jumbotroncontent">
            <h1 class="display-4">Xbox Series X</h1>
            <p class="lead">Fastest and most powerful Xbox ever</p>
            <a class="btn btn-primary btn-lg" href="<?=base_url()?>/RentList/detail/Xbox%20Series%20X" role="button">Try it Now!</a>
        </div>
    </div>

    <div class="container">
        <img src="https://gmedia.playstation.com/is/image/SIEPDC/ps5-family-image-block-01-en-16sep20?$1600px--t$" class="img-fluid" alt="Responsive image">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12 playstation">
                <h1>PlayStation®5</h1>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12 playstation">
                <p>Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 button-rent-playstation">
                <a class="btn btn-primary btn-lg button-rent-play" href="<?=base_url()?>/RentList/detail/PlayStation%205%20Console" role="button">Rent it now!</a>
            </div>
        </div>
        
        <div class="row youtube">
            <span class="col-lg-12 col-md-12 col-sm-12 col-sm-12"><br><br></span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 youtube-frame">
                <h1>Tips of the day</h1>
            </div>
            <span class="col-lg-12 col-md-12 col-sm-12 col-sm-12"><br></span>
            
            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/HYRAeOlXUB4" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/A4OTu9nG1LY" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-sm-12 youtube-frame vid">
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/cssQqLj7vf4" title="YouTube video player" class="frameyoutube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>
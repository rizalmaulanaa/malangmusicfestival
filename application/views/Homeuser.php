<?php
if ($this->session->userdata['status']=='loginuser') {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Malang Music Festival</title>
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/avatar-01.jpg') ?>"/>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/modern-business.css') ?>" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url('homeuser') ?>">Malang Music Festival</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('listnews') ?>">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"> | </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('listevent') ?>">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"> | </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Rp. <?php echo number_format($saldo); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"> | </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('profile') ?>"><?php echo $this->session->userdata('nama'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"> | </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('MainC/logout/user') ?>">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('<?php echo base_url('assets/img/shon.jpg') ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Shawn Mendes: The World Tour 2019</h3>
                            <p>Graha Cakrawala, Universitas Negeri Malang</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('<?php echo base_url('assets/img/hivi.jpg') ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Hivi: Kereta Kencan Tour</h3>
                            <p>Lapangan Rampal</p>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('<?php echo base_url('assets/img/maliq.jpg') ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Maliq & D'Essentials</h3>
                            <p>Rooftop Mall Dinoyo</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
        <!-- Page Content -->
        <div class="container">
            <!-- Portfolio Section -->
            <br>
            <h2>Events</h2>
            <div class="row">
            <?php
            $tot=0;
            foreach($posts as $post){
            if ($tot>=7) { ?>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="<?php echo base_url('listevent')?>"><img class="card-img-top" src="<?php echo base_url('assets/img/sign.jpg'); ?>" alt="image" height="300" width="300"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?php echo base_url('listevent') ?>" style="align-content: center">See all events...</a>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php $tot=0; break; }?>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="<?php echo base_url('detailevent/').$post->id_event ?>"><img class="card-img-top" src="<?php echo base_url('assets/img/').$post->gambar_event; ?>" alt="image" height="300" width="500"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?php echo base_url('detailevent/').$post->id_event ?>"><?php echo $post->nama_event; ?></a>
                            </h4>
                            <p class="card-text"><?php echo substr($post->isi_event,0,35);echo '. . .'; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            $tot++; } ?>
            </div>
            <a href="<?php echo base_url('listevent') ?>">See all events...</a>
            <br><br>
            <h2>Recent News</h2>
            <!-- Marketing Icons Section -->
            <div class="row">
                <?php
                $tot=0;
                foreach($posts1 as $post){
                if ($tot>=7) { ?>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">See all news...</h4>
                        <div class="card-body">
                            <p class="card-text">See all news...</p>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('listnews') ?>" class="btn btn-primary">See all news...</a>
                        </div>
                    </div>
                </div>
                <?php $tot=0; break; }?>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header"><?php echo substr($post->nama_berita,0,31); echo '. . .'; ?></h4>
                        <div class="card-body">
                            <p class="card-text"><?php echo substr($post->isi_berita,0,145); echo '. . .'; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('detailnews/').$post->newsID ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <?php $tot++; } ?>
            </div>
            <a href="<?php echo base_url('listnews') ?>">See all news...</a>
            <br><br>
            <h2>Vouchers</h2>
            <div class="row">
                <?php foreach ($posts2 as $post) {?>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header"><?php echo $post->title_voucher ?></h4>
                        <div class="card-body">
                            <p class="card-text"><?php echo $post->isi_voucher;?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <hr>
        </div>
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Malang Music Festival 2018</p>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    </body>
</html>
<?php
}else{
    redirect(base_url());
}

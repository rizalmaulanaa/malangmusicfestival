<?php
if ($this->session->userdata['status'] == 'loginadmin') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Admin Page</title>
            <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/avatar-01.jpg') ?>"/>
            <!-- Bootstrap core CSS -->
            <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/modern-business.css') ?>" rel="stylesheet">
        </head>
        <body>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo base_url('homeadmin') ?>">Malang Music Festival</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('MainC/verifikasi') ?>">Verif saldo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"> | </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><?php echo $this->session->userdata('nama'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"> | </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('MainC/logout/admin') ?>">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <div class="container">
                <!-- Page Heading -->
                <h1 style = "text-align : center" class="my-4"> <b> Admin Page </b>
                </h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo base_url('MainC/tambahnews') ?>">(+) News </a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusnews') ?>">(O) Update News </a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusnews') ?>">(-) News </a><br>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo base_url('MainC/tambahevent') ?>">(+) Event </a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusevent') ?>">(O) Update Event</a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusevent') ?>">(-) Event</a><br>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo base_url('MainC/tambahvoucher') ?>">(+) Voucher </a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusvoucher') ?>">(O) Update Voucher</a><br>
                                    <br>
                                    <a href="<?php echo base_url('MainC/hapusvoucher') ?>">(-) Voucher</a><br>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($gagal) { ?>
                <div class="container">
                    <h3 style = "text-align : center; color:limegreen " class="my-4">Data berasil dimasukkan ke database</h3>
                </div>
            <?php } else { ?>
                <br>
                <br>
                <br>
                <br>
            <?php } ?>
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
} else {
    redirect(base_url('signinadmin'));
}

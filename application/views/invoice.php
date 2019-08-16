<?php
if ($this->session->userdata['status'] == 'loginuser') {
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
                                <a class="nav-link" href="<?php echo base_url('MainC/profile') ?>"><?php echo $this->session->userdata('nama'); ?></a>
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
            <!-- Page Content -->
            <div class="container">
                <!-- Page Heading -->
                <h1 class="my-4">Invoice
                    <p>
                        ---------------------------------------------------------------------
                    </p>
                    <small> </small>
                </h1>
                <!-- Event 1 -->
                <div class="row">
                    <div class="col-md-5">
                        <?php foreach ($posts as $post) { ?>
                            <p><b>NAMA         : </b><?php echo $post->uname_User ?></p>
                            <p><b>EVENT         : </b><?php echo $post->nama_event; ?></p>
                            <p><b>JUMLAH TIKET  : </b><?php echo $post->total_tiket; ?></p>
                            <p><b>-------------------------------------------------------</b> </p>
                            <p><b>TOTAL AKHIR   : </b>Rp. <?php echo number_format($post->harga_tiket); ?></p>
                            <p><b>KODE BOOKING  : </b><?php echo $post->id_transaction; ?></p>
                        <?php } ?>
                        <br><br><br>
                    </div>
                </div>
            </div>
            <!-- /.row -->
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
    redirect(base_url());
}

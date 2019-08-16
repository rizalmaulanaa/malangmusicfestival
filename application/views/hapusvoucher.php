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
                    <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo base_url('MainC/searchadmin/voucher') ?>">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
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
                <h1 class="my-4">VOUCHER
                    <p>
                        ---------------------------------------------------------------------
                    </p>
                    <small> </small>
                </h1>
                <!-- Voucher 1 -->
                <?php if ($hapus) { ?>
                    <div><h2 style="color: orangered;text-align:center" >Data berasil dihapus</h2></div>
                    <br>
                <?php
                }
                foreach ($posts as $post) {
                    ?>
                    <div class="row">
                        <div class="col-md-5">
                            <h3><?php echo $post->isi_voucher ?></h3>
                            <p><b>Voucher Code  : </b> <?php echo $post->title_voucher ?></p>
                            <p><b>Voucher Value : </b> <?php echo $post->voucher_value ?>%</p>
                            <a class="btn btn-primary" href="<?php echo base_url('MainC/updatevoucher/') . $post->voucherID ?>">Update</a>
                            <a href="<?php echo base_url('MainC/hapussemua/voucher/') . $post->voucherID ?>"><img src="<?php echo base_url('assets/img/trash.png') ?>" height="30" width="30"></a>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                <?php
                }
                ?>
                <ul class="pagination justify-content-center">
                    <?php
                    if ($tes) {
                        echo $page;
                    }
                    ?>
                </ul>
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
} else {
    redirect(base_url('signinadmin'));
}

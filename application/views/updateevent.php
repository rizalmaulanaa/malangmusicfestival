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
            <br>
            <div class="form-group mx-sm-3 mb-2">
                <div class="container">
                    <?php foreach($posts as $post){ ?>
                    <form method="post" action="<?php echo base_url('MainC/updatee/') . $post->id_event ?>">
                        <div class="form-group shadow-textarea">
                            <h2>Update Event</h2>
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="judul"><?php echo $post->nama_event ?></textarea>
                        </div>
                        <div class="form-group shadow-textarea">
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="10" name="keterangan"><?php echo $post->isi_event ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-2">
                                <div class="form-group shadow-textarea">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="tanggal"><?php echo $post->waktu_event ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group shadow-textarea">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="harga"><?php echo $post->harga_tiket ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group shadow-textarea">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="tiket"><?php echo $post->total_tiket ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-2">
                                <div class="form-group shadow-textarea">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="tempat"><?php echo $post->tempat_event ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group shadow-textarea">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="1" name="gambar"><?php echo $post->gambar_event ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
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

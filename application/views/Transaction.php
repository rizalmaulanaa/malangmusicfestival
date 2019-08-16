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
            <title>Transaction</title>
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
                <div class="row">
                    <div class="col-lg-3">
                        <h1 class="my-4">Transaction</h1>
                    </div>
                    <div class="col-lg-9">
                        <form method="post" action="<?php echo base_url('MainC/sukses') ?>">
                            <?php foreach ($posts as $post) { ?>
                                <div class="card mt-4">
                                    <img class="card-img-top img-fluid" src="<?php echo base_url('assets/img/').$post->gambar_event; ?>" alt="">
                                    <div class="card-body">
                                        <h3>Invoice</h3>
                                        <h5 class="card-title"><input type="hidden" name="nama" value="<?php echo $post->nama_event; ?>"><?php echo $post->nama_event; ?></h5>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Tickets</td>
                                                <td><input type="number" max="8" min="1" id="jumlah" onchange="calculate()" name="jumlah" required></td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td><input required type="hidden" id="harga" value="<?php echo $post->harga_tiket; ?>">Rp. <?php echo number_format($post->harga_tiket); ?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Voucher</td>
                                                <td>
                                                    <select id="voucher" onchange="calculate()" name="voc">
                                                        <option></option>
                                                        <?php foreach ($posts2 as $post1) { ?>
                                                            <option value="<?php echo $post1->voucher_value ?>"><?php echo $post1->title_voucher ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><input type="text" id="tot" name="total" onchange="calculate()" required></td>
                                            </tr>
                                        </table>
                                        <div align="right">
                                            <button class="btn btn-primary">Checkout</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <?php } ?>
                        </form>
                    </div>
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
            <script type="text/javascript">
                                                    function calculate()
                                                    {
                                                        var jumlah = parseInt(document.getElementById('jumlah').value);
                                                        var harga = parseInt(document.getElementById('harga').value);
                                                        var voucher = document.getElementById('voucher').value;
                                                        var tot = jumlah * harga;
                                                        var tot1 = jumlah * harga * (voucher / 100);
                                                        jumlah = isNaN(jumlah) ? 0 : jumlah;
                                                        document.getElementById('tot').value = tot - tot1;
                                                    }
            </script>
        </body>
    </html>
    <?php
} else {
    redirect(base_url());
}

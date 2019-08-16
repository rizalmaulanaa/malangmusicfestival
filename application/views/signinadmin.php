<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign in admin MMF</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/avatar-01.jpg') ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asstes/css/material-design-iconic-font.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asstes/css/animsition.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asstes/css/daterangepicker.css') ?>/">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('<?php echo base_url('assets/img/avatar-01.jpg') ?>');">
                <div class="wrap-login100 p-t-70 p-b-30">
                    <form class="login100-form validate-form" method="post" action="<?php echo base_url('MainC/verif/admin') ?>">
                        <div class="login100-form-avatar">
                            <img src="<?php echo base_url('assets/img/avatar-01.jpg') ?>" width="125" height="125">
                        </div>
                        <span class="login100-form-title p-t-20 p-b-45">
                            Admin MMF
                        </span>
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn">
                                Sign in
                            </button>
                        </div>
                        <div class="text-center w-full p-t-25 p-b">
                            <?php if ($gagal) {?>
                            <div><a style="color: orangered">Username atau password anda salah</a></div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="dropDownSelect1"></div>
        <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/popper.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
    </body>
</html>
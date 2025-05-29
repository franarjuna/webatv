<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/favicon.ico">

        <!-- App css -->
        <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>


    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="fas fa-home h2 text-dark"></i></a>
        </div>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html">
                                <span><img src="https://atvarquitectos.com/static/img/atv-logo.svg" alt="" height="90"></span>
                            </a>
                            <p class="text-muted mt-2 mb-4">CMS </p>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0"><?php echo $error;?></h4>
                                </div>

                                <form action="#" method="post">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Usuario</label>
                                        <input class="form-control" type="email" name="loginusuario" id="emailaddress" required="" placeholder="Usuario">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="loginpass" required="" id="password" placeholder="Password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Ingresar </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="/admin/recupero" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Olvidó su contraseña?</a></p>
                                <?php /*<p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>*/?>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- Vendor js -->
        <script src="/assets/admin/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="/assets/admin/assets/js/app.min.js"></script>

    </body>
</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('../assets/images/logos/favicon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('../assets/css/styles.min.css') ?>" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url('../assets/images/logos/dark-logo.svg') ?>" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Login Please</p>
                                <form method="post" action="<?= base_url('home/aksi_login') ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" id="" placeholder="username"
                                            name="username">
                                    </div>
                                    <div class=" mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="" required="required"
                                            placeholder="password" name="password">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('../assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
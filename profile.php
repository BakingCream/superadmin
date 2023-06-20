<?php session_start(); ?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Super Admin - PUPAA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="libs/plugins/datatables/dataTables.bootstrap5.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php include_once('nav.php'); ?>
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="assets/img/default_pic.jpg" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                            <h4><?php echo($_SESSION['user']['FULL_NAME']); ?></h4>
                            <p class="text-secondary mb-1"><?php echo($_SESSION['user']['DEPARTMENT']); ?></p>
                            <p class="text-muted font-size-sm"><?php echo($_SESSION['user']['EMAIL_ADDRESS']); ?></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo($_SESSION['user']['FULL_NAME']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo($_SESSION['user']['EMAIL_ADDRESS']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Department</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo($_SESSION['user']['DEPARTMENT']); ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank">Edit</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                </div>
            </div>
        </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © PUPAA 2023</span></div>
                </div>
            </footer>   
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include_once('scripts.php'); ?>
    <script src="libs/scripts/dashboard.js"></script>
</body>

</html>
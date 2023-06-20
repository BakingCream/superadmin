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
           <form action="">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" id="oldPassword" class="form-control" placeholder="Old Password">
                        <label class="form-label">Old Password</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" id="newPassword" class="form-control" placeholder="New Password">
                        <label class="form-label">New Password</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                        <label class="form-label">Confirm Password</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary w-100" onclick="ChangePassword.changePassword();">Change Password</button>
                </div>
            </div>
           </form>
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
    <script src="libs/scripts/change-password.js"></script>
</body>

</html>
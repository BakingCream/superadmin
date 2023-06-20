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
                <div class="container-fluid">
                    <div class="modal fade" role="dialog" tabindex="-1" id="addAdminModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Account</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3"><input type="text" id="firstName" class="form-control" placeholder="First Name"><label class="form-label">First Name</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3"><input type="text" id="lastName" class="form-control" placeholder="Last Name"><label class="form-label" id="lastName">Last Name</label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3"><input type="text" id="emailAddress" class="form-control" placeholder="Email Address"><label class="form-label">Email Address</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="department">
                                                        <option value="" selected disabled>Please Select</option>
                                                        <option value="Accounting Office">Accounting Office</option>
                                                        <option value="Director's Office">Director's Office</option>
                                                        <option value="Registrar's Office">Registrar's Office</option>
                                                </select>
                                                <label class="form-label">Department</label></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="button" onclick="Dashboard.addAdmin();">Add Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-dark mb-4">Accounts</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <p class="text-primary m-0 fw-bold">Employee Info</p><button class="btn btn-primary" id="addButton" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>Add Account</button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody id="adminTable">
                                </tbody>
                            </table>
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/datatables/css/buttons.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout_dashboard/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout_dashboard/topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('dashboard-content') ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Copyright Subhan Fadilah <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar dari aplikasi ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('/logout') ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
    <!-- datatables -->
    <script src="<?= base_url() ?>/datatables/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url() ?>/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/jszip.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/datatables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#tabledata').DataTable({
            "info": false,
            // "lengthChange": false,
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],
            buttons: ['excel', 'pdf', 'print'],
            dom: "<'row'<'col-md-4 mt-2'l><'col-md-4'B><'col-md-4 mt-2'f>>rt<'bottom'p>"
        });

        table.buttons().container()
            .appendTo('#tabledata_wrapper .col-md-6:eq(0)');
    });
    </script>

</body>

</html>
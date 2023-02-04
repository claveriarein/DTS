<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $page_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <link href="/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <!-- <link href="/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" /> -->

        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  
        <?= $this->rendersection('content') ?>
     
        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/9cef9fee62.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <!-- bundle -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>

        <script src="/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="/assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="/assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/buttons.html5.min.js"></script>
        <script src="/assets/js/vendor/buttons.flash.min.js"></script>
        <script src="/assets/js/vendor/buttons.print.min.js"></script>
        <script src="/assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="/assets/js/vendor/dataTables.select.min.js"></script>

        <script src="/assets/js/pages/demo.datatable-init.js"></script>
        <script src="/assets/js/myAlerts.js"></script>
        <script src="/assets/js/permissions.js"></script>

        <!-- third party js -->
        <script src="/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- dragula js-->
        <!-- <script src="/assets/js/vendor/dragula.min.js"></script> -->

        <!-- demo js -->
        <!-- <script src="/assets/js/ui/component.dragula.js"></script> -->
        <script src="/assets/js/pages/demo.dashboard-projects.js"></script>
        <!-- end demo js-->
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.table').DataTable();
            });
        </script>

    </body>
</html>
    <?= $this->include('templates/notifications'); ?>
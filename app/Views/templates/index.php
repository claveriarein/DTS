<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<!-- Begin page -->
<div class="wrapper">
    <?= $this->include('templates/sidenav'); ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <?= $this->include('templates/navbar'); ?>

            <!-- Start Content-->
            <div class="container-fluid">
                
                <?= view(esc($view)) ?>
                
            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <script>document.write(new Date().getFullYear())</script> © DTS - Defect Tracker System | DELCS Development Team & Naevis Development Team
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<?= $this->endsection('content'); ?>

<?= $this->section('totalItemStatusChart'); ?>
    <?= $this->include('Modules\DashboardManagement\Views\dashboard\totalItemStatusChart'); ?>
<?= $this->endsection('totalItemStatusChart'); ?>

<?= $this->include('templates/notifications'); ?>


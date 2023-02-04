<?php if (session()->get('addCartAdminOpenModal')) : ?>
    <script type="text/javascript">
        // var myModalEl = document.getElementById('<?=session()->get('addCartAdminOpenModal')?>')
        // myModalEl.addEventListener('show.bs.modal', function (e) {
        //     var modalToggle = $(e.target).attr('id') // relatedTarget
        //     myModalEl.show(modalToggle)
        // })
    </script>
<?php endif; ?>

<?php if (session()->get('success_login')) : ?>
    <script type="text/javascript">
        alert_login_success('<?= session()->get('success_login') ?>');
    </script>
<?php endif; ?>

<?php if (session()->get('warning')) : ?>
    <script type="text/javascript">
        alert_warning('<?= session()->get('warning') ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
    <script type="text/javascript">
        alert_success('<?= $_SESSION['success']; ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <script type="text/javascript">
        alert_error('<?= $_SESSION['error']; ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['success_no_flash'])) : ?>
    <script type="text/javascript">
        alert_success_no_flash('<?= $_SESSION['success_no_flash']; ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['error_no_flash'])) : ?>
    <script type="text/javascript">
        alert_error_no_flash('<?= $_SESSION['error_no_flash']; ?>');
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['alert_no_flash'])) : ?>
    <script type="text/javascript">
        alert_no_flash('<?= $_SESSION['alert_no_flash']; ?>');
    </script>
<?php endif; ?>
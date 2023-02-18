<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $page_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <link rel="shortcut icon" href="/assets/images/DTS_white_logo_sm.png">

        <link href="/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />

        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  
        <?= $this->rendersection('content') ?>
     
        <div class="rightbar-overlay"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/9cef9fee62.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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
        <script>
            defectItemListViewReload();
            function defectItemListViewReload(){
                var element = $('#defect-item-list-view-reload');
                $.ajax({
                    url: "/defect-items/defect-item-list-view-reload",
                    type: 'GET',
                    data: {},
                    success: function (html) {
                        element.html(html);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                });
            }
            itemTaskListViewReload();
            function itemTaskListViewReload(){
                var element = $('#item-task-list-view-reload');
                $.ajax({
                    url: "/defect-items/tasks/item-task-list-view-reload",
                    type: 'GET',
                    data: {},
                    success: function (html) {
                        element.html(html);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                });
            }
            $('#task-title').keyup(function() {
                $('#task-title').addClass('is-valid');
            });
            $('#task-description').keyup(function() {
                $('#task-description').addClass('is-valid');
            });
            function submitNewItem(route, title, description, title_id, description_id, modal_id){
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {
                        title : title,
                        description : description,
                    },
                    cache: false,
                    success: function (response) {
                        if(response.status_icon == 'success'){
                            alert_no_flash(response.status_text, response.status_icon)
                            defectItemListViewReload();
                            title_id.val("");
                            description_id.val("");
                            title_id.removeClass('is-invalid');
                            description_id.removeClass('is-invalid');
                            title_id.removeClass('is-valid');
                            description_id.removeClass('is-valid');
                            $(modal_id).modal('hide');
                        }else{
                            alert_no_flash(response.status_text, response.status_icon)
                            if(response.title_and_description == ''){
                                title_id.addClass('is-invalid');
                                title_id.val("");
                                description_id.addClass('is-invalid');
                                description_id.val("");
                            } else if(response.title == '') {
                                title_id.addClass('is-invalid');
                                title_id.val("");
                                description_id.addClass('is-valid');
                                description_id.removeClass('is-invalid');
                            } else {
                                title_id.removeClass('is-invalid');
                                title_id.addClass('is-valid');
                                description_id.addClass('is-invalid');
                                description_id.val("");
                            }
                        }
                    }
                });
            }
            function submitTaskStatus(route, item_status_id, assignee_id, severity_id, start_at, modal_id){
                const date = moment(start_at).format('YYYY-MM-DD');
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {
                        item_status_id : item_status_id,
                        assignee_id : assignee_id,
                        severity_id : severity_id,
                        start_at : date,
                    },
                    cache: false,
                    success: function (response) {
                        if(response.status_icon == 'success'){
                            alert_no_flash(response.status_text, response.status_icon)
                            itemTaskListViewReload();
                            $(modal_id).modal('hide');
                        }else{
                            alert_no_flash(response.status_text, response.status_icon)
                            itemTaskListViewReload();
                            $(modal_id).modal('hide');
                        }
                    }
                });
            }
            itemTaskListViewHistoryReload();
            function itemTaskListViewHistoryReload(){
                var element = $('#item-task-list-view-history-reload');
                $.ajax({
                    url: "/defect-items/history/item-task-list-view-history-reload",
                    type: 'GET',
                    data: {},
                    success: function (html) {
                        element.html(html);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                });
            }
        </script>

        <script src="/assets/js/vendor/apexcharts.min.js"></script>

        <?= $this->rendersection('totalItemStatusChart'); ?>
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
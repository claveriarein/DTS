
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0">
                            <div class="card-body text-center">
                                <i class="mdi mdi-briefcase-download-outline text-muted" style="font-size: 24px;"></i>
                                <h3><span><?=$getCountOpenItems['count_status_items']?></span></h3>
                                <p class="text-muted font-15 mb-0"><?=$getCountOpenItems['item_status_id']? $getCountOpenItems['item_status_id'] : 'OPEN'?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-timer-sand text-muted" style="font-size: 24px;"></i>
                                <h3><span><?=$getCountOngoingItems['count_status_items']?></span></h3>
                                <p class="text-muted font-15 mb-0"><?=$getCountOngoingItems['item_status_id']? $getCountOngoingItems['item_status_id'] : 'ONGOING'?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-stop-circle-outline text-muted" style="font-size: 24px;"></i>
                                <h3><span><?=$getCountOnholdItems['count_status_items']?></span></h3>
                                <p class="text-muted font-15 mb-0"><?=$getCountOnholdItems['item_status_id']? $getCountOnholdItems['item_status_id'] : 'ONHOLD'?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-briefcase-check-outline text-muted" style="font-size: 24px;"></i>
                                <h3><span><?=$getCountDoneItems['count_status_items']?></span></h3>
                                <p class="text-muted font-15 mb-0"><?=$getCountDoneItems['item_status_id']? $getCountDoneItems['item_status_id'] : 'DONE'?></p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Total Items Status Chart</h4>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div id="average-sales" class="apex-charts mb-4 mt-4"
                    data-colors="#727cf5,#ffbc00,#39afd1,#0acf97"></div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="chart-widget-list">
                    <p>
                        <i class="mdi mdi-square text-primary"></i> <?=$getCountOpenItems['item_status_id']? $getCountOpenItems['item_status_id'] : 'OPEN'?>
                        <span class="float-end"><?=$getCountOpenItems['count_status_items']?></span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-warning"></i> <?=$getCountOngoingItems['item_status_id']? $getCountOngoingItems['item_status_id'] : 'ONGOING'?>
                        <span class="float-end"><?=$getCountOngoingItems['count_status_items']?></span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-info"></i> <?=$getCountOnholdItems['item_status_id']? $getCountOnholdItems['item_status_id'] : 'ONHOLD'?>
                        <span class="float-end"><?=$getCountOnholdItems['count_status_items']?></span>
                    </p>
                    <p class="mb-0">
                        <i class="mdi mdi-square text-success"></i> <?=$getCountDoneItems['item_status_id']? $getCountDoneItems['item_status_id'] : 'DONE'?>
                        <span class="float-end"><?=$getCountDoneItems['count_status_items']?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

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
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add-new-task-modal" class="btn btn-success btn-sm">Add New Item</a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped dt-responsive nowrap w-100 text-center">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Reporter</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($getAllItemsNotAssigned as $itemsNotAssigned):?>
                            <tr>
                                <th><?= $itemsNotAssigned['item_code'];?></th>
                                <th><?=  ucwords($itemsNotAssigned['title']);?></th>
                                <td><?= ucwords($itemsNotAssigned['description']);?></td>
                                <td><?= ucwords($itemsNotAssigned['r_first_name']);?></td>
                                <td><?= date('M d, Y',strtotime($itemsNotAssigned['created_at']));?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--  Add new item modal -->
    <div class="modal fade task-modal-content" id="add-new-task-modal" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="NewTaskModalLabel">Add New Defect Item</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="task-title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="task-title" name="title" placeholder="Enter title">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="task-description" class="form-label">Description</label>
                            <textarea class="form-control" id="task-description" name="description" placeholder="Enter description" rows="3"></textarea>
                        </div>
                        
                        <div class="text-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-1"> Assigned Item Status </h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-sm table-striped dt-responsive nowrap w-100 text-center">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Reporter</th>
                            <th>Status</th>
                            <th>Started Date</th>
                            <th>Assignee</th>
                            <th>Severity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($getAllItems as $items):?>
                            <tr>
                                <th><?= $items['item_code'];?></th>
                                <th><?=  ucwords($items['title']);?></th>
                                <td><?= ucwords($items['description']);?></td>
                                <td><?= ucwords($items['r_first_name']);?></td>
                                <td>
                                    <?php if($items['item_status_id'] == 'OPEN'): ?>
                                        <span class="badge bg-primary"><?= $items['item_status_id'];?></span>
                                    <?php elseif($items['item_status_id'] == 'ONGOING'):?>
                                        <span class="badge bg-warning"><?= $items['item_status_id'];?></span>
                                    <?php elseif($items['item_status_id'] == 'ONHOLD'):?>
                                        <span class="badge bg-secondary"><?= $items['item_status_id'];?></span>
                                    <?php elseif($items['item_status_id'] == 'DONE'):?>
                                        <span class="badge bg-success"><?= $items['item_status_id'];?></span>
                                    <?php else:?>
                                        <span class="badge bg-secondary">NOT SET</span>
                                    <?php endif;?>
                                </td>
                                <td><?= date('M d, Y',strtotime($items['start_at']));?></td>
                                <td><?= ucwords($items['a_first_name']);?></td>
                                <td>
                                    <?php if($items['severity_id'] == 'LOW'): ?>
                                        <span class="badge bg-info"><?= $items['severity_id'];?></span>
                                    <?php elseif($items['severity_id'] == 'MEDIUM'):?>
                                        <span class="badge bg-warning"><?= $items['severity_id'];?></span>
                                    <?php elseif($items['severity_id'] == 'HIGH'):?>
                                        <span class="badge bg-danger"><?= $items['severity_id'];?></span>
                                    <?php else:?>
                                        <span class="badge bg-secondary">NOT SET</span>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
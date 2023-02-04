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
        <div class="page-title-box">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-new-task-modal" class="btn btn-success btn-sm">Add New Task</a>
        </div>
        <div class="mt-2">
            <h5 class="m-0 pb-2">
                <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
                    <i class='uil uil-angle-down font-18'></i>Open <span class="text-muted">(<?=count($getAllItemsPerItemStatusOpen)?>)</span>
                </a>
            </h5>

            <div class="collapse show" id="todayTasks">
                <div class="card mb-0">
                    <div class="card-body">
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Reporter</th>
                                    <th>Started Date</th>
                                    <th>Assignee</th>
                                    <th>Severity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($getAllItemsPerItemStatusOpen)):?>
                                    <?php foreach($getAllItemsPerItemStatusOpen as $open):?>
                                        <tr class="border-bottom">
                                            <th><?= $open['item_code'];?></th>
                                            <th><?= ucwords($open['title']);?></th>
                                            <td><?= ucfirst($open['description']);?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($open['r_first_name']);?>
                                            </td>
                                            <td><?= date('M d, Y',strtotime($open['start_at']));?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                    data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($open['a_first_name']);?>
                                            </td>
                                            <td>
                                                <?php if($open['severity_id'] == 'LOW'): ?>
                                                    <span class="badge badge-info-lighten"><?= $open['severity_id'];?></span>
                                                <?php elseif($open['severity_id'] == 'MEDIUM'):?>
                                                    <span class="badge badge-warning-lighten"><?= $open['severity_id'];?></span>
                                                <?php elseif($open['severity_id'] == 'HIGH'):?>
                                                    <span class="badge badge-danger-lighten"><?= $open['severity_id'];?></span>
                                                <?php else:?>
                                                    <span class="badge badge-secondary-lighten">NOT SET</span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <select class="form-control form-select form-control-sm" name="item_status_id" id="item_status_id">
                                                        <option value="OPEN">Open</option>
                                                        <option value="ONGOING">Ongoing</option>
                                                        <option value="ONHOLD">Onhold</option>
                                                        <option value="DONE">Done</option>
                                                    </select>
                                                    <button type="button" onclick="updateStatus(alert('sent'));" class="btn btn-sm btn-primary p-1 ms-1">Submit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">No open task for now.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>

        <div class="mt-4">
            <h5 class="m-0 pb-2">
                <a class="text-dark" data-bs-toggle="collapse" href="#upcomingTasks" role="button" aria-expanded="false" aria-controls="upcomingTasks">
                    <i class='uil uil-angle-down font-18'></i>Ongoing <span class="text-muted">(<?=count($getAllItemsPerItemStatusOngoing)?>)</span>
                </a>
            </h5>
            <div class="collapse show" id="upcomingTasks">
                <div class="card mb-0">
                    <div class="card-body">
                        <table class="text-center w-100">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Reporter</th>
                                    <th>Started Date</th>
                                    <th>Assignee</th>
                                    <th>Severity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($getAllItemsPerItemStatusOngoing)):?>
                                    <?php foreach($getAllItemsPerItemStatusOngoing as $ongoing):?>
                                        <tr class="border-bottom">
                                            <th><?= $ongoing['item_code'];?></th>
                                            <th><?= ucwords($ongoing['title']);?></th>
                                            <td><?= ucfirst($ongoing['description']);?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($ongoing['r_first_name']);?>
                                            </td>
                                            <td><?= date('M d, Y',strtotime($ongoing['start_at']));?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                    data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($ongoing['a_first_name']);?>
                                            </td>
                                            <td>
                                                <?php if($ongoing['severity_id'] == 'LOW'): ?>
                                                    <span class="badge badge-info-lighten"><?= $ongoing['severity_id'];?></span>
                                                <?php elseif($ongoing['severity_id'] == 'MEDIUM'):?>
                                                    <span class="badge badge-warning-lighten"><?= $ongoing['severity_id'];?></span>
                                                <?php elseif($ongoing['severity_id'] == 'HIGH'):?>
                                                    <span class="badge badge-danger-lighten"><?= $ongoing['severity_id'];?></span>
                                                <?php else:?>
                                                    <span class="badge badge-secondary-lighten">NOT SET</span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <select class="form-control form-select form-control-sm" name="item_status_id" id="item_status_id">
                                                        <option value="OPEN">Open</option>
                                                        <option value="ONGOING">Ongoing</option>
                                                        <option value="ONHOLD">Onhold</option>
                                                        <option value="DONE">Done</option>
                                                    </select>
                                                    <button type="button" onclick="updateStatus(alert('sent'));" class="btn btn-sm btn-primary p-1 ms-1">Submit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">No ongoing task for now.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4 mb-4">
            <h5 class="m-0 pb-2">
                <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button" aria-expanded="false" aria-controls="otherTasks">
                    <i class='uil uil-angle-down font-18'></i>Onhold <span class="text-muted">(<?=count($getAllItemsPerItemStatusOnhold)?>)</span>
                </a>
            </h5>

            <div class="collapse show" id="otherTasks">
                <div class="card mb-0">
                    <div class="card-body">
                        <table class="text-center w-100">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Reporter</th>
                                    <th>Started Date</th>
                                    <th>Assignee</th>
                                    <th>Severity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($getAllItemsPerItemStatusOnhold)):?>
                                    <?php foreach($getAllItemsPerItemStatusOnhold as $onhold):?>
                                        <tr class="border-bottom">
                                            <th><?= $onhold['item_code'];?></th>
                                            <th><?= ucwords($onhold['title']);?></th>
                                            <td><?= ucfirst($onhold['description']);?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($onhold['r_first_name']);?>
                                            </td>
                                            <td><?= date('M d, Y',strtotime($onhold['start_at']));?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                    data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($onhold['a_first_name']);?>
                                            </td>
                                            <td>
                                                <?php if($onhold['severity_id'] == 'LOW'): ?>
                                                    <span class="badge badge-info-lighten"><?= $onhold['severity_id'];?></span>
                                                <?php elseif($onhold['severity_id'] == 'MEDIUM'):?>
                                                    <span class="badge badge-warning-lighten"><?= $onhold['severity_id'];?></span>
                                                <?php elseif($onhold['severity_id'] == 'HIGH'):?>
                                                    <span class="badge badge-danger-lighten"><?= $onhold['severity_id'];?></span>
                                                <?php else:?>
                                                    <span class="badge badge-secondary-lighten">NOT SET</span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <select class="form-control form-select form-control-sm" name="item_status_id" id="item_status_id">
                                                        <option value="OPEN">Open</option>
                                                        <option value="ONGOING">Ongoing</option>
                                                        <option value="ONHOLD">Onhold</option>
                                                        <option value="DONE">Done</option>
                                                    </select>
                                                    <button type="button" onclick="updateStatus(alert('sent'));" class="btn btn-sm btn-primary p-1 ms-1">Submit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">No onhold task for now.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
        
        <div class="mt-4 mb-4">
            <h5 class="m-0 pb-2">
                <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button" aria-expanded="false" aria-controls="otherTasks">
                    <i class='uil uil-angle-down font-18'></i>Done <span class="text-muted">(<?=count($getAllItemsPerItemStatusDone)?>)</span>
                </a>
            </h5>

            <div class="collapse show" id="otherTasks">
                <div class="card mb-0">
                    <div class="card-body">
                        <table class="text-center w-100">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Reporter</th>
                                    <th>Started Date</th>
                                    <th>Assignee</th>
                                    <th>Severity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($getAllItemsPerItemStatusDone)):?>
                                    <?php foreach($getAllItemsPerItemStatusDone as $done):?>
                                        <tr class="border-bottom">
                                            <td><?= $done['item_code'];?></td>
                                            <td><?= ucwords($done['title']);?></td>
                                            <td><?= ucfirst($done['description']);?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($done['r_first_name']);?>
                                            </td>
                                            <td><?= date('M d, Y',strtotime($done['start_at']));?></td>
                                            <td>
                                                <img src="/assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                    data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                <?= ucwords($done['a_first_name']);?>
                                            </td>
                                            <td>
                                                <?php if($done['severity_id'] == 'LOW'): ?>
                                                    <span class="badge badge-info-lighten"><?= $done['severity_id'];?></span>
                                                <?php elseif($done['severity_id'] == 'MEDIUM'):?>
                                                    <span class="badge badge-warning-lighten"><?= $done['severity_id'];?></span>
                                                <?php elseif($done['severity_id'] == 'HIGH'):?>
                                                    <span class="badge badge-danger-lighten"><?= $done['severity_id'];?></span>
                                                <?php else:?>
                                                    <span class="badge badge-secondary-lighten">NOT SET</span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <select class="form-control form-select form-control-sm" name="item_status_id" id="item_status_id">
                                                        <option value="OPEN">Open</option>
                                                        <option value="ONGOING">Ongoing</option>
                                                        <option value="ONHOLD">Onhold</option>
                                                        <option value="DONE">Done</option>
                                                    </select>
                                                    <button type="button" onclick="updateStatus(alert('sent'));" class="btn btn-sm btn-primary p-1 ms-1">Submit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">No done task for now.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>

    </div>
</div>
<!--  Add new task modal -->
<div class="modal fade task-modal-content" id="add-new-task-modal" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="NewTaskModalLabel">Create New Task</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-2">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-label">Defect Items</label>
                            <select class="form-select" id="assignee_id" name="assignee_id">
                                <option selected disabled>Select defect item</option>
                                <?php foreach($getAllItemsForOption as $option):?>
                                    <option value="<?=$option['id']?>">
                                        <?=  ucwords('['.$option['item_code'].'] '.$option['title']);?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="severity_id" class="form-label">Severity</label>
                                <select class="form-select" id="severity_id" name="severity_id">
                                    <option selected disabled>Select severity</option>
                                    <option value="LOW">Low</option>
                                    <option value="MEDIUM">Medium</option>
                                    <option value="HIGH">High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="assignee_id" class="form-label">Assign To</label>
                                <select class="form-select" id="assignee_id" name="assignee_id">
                                    <option selected disabled>Select Assignees</option>
                                    <?php foreach($getUsers as $user):?>
                                        <option value="<?=$user['id']?>">
                                            <?=  ucwords($user['first_name'].' '.$user['last_name']);?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="task-priority" class="form-label">Start Date</label>
                                <input type="text" class="form-control form-control-light" id="birthdatepicker" name="start_at" data-toggle="date-picker" data-single-date-picker="true">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
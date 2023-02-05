
<div class="mt-2">
    <h5 class="m-0 pb-2">
        <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
            <i class='uil uil-angle-down font-18'></i>Status <span class="text-muted">(<?=count($getAllItemsPerItemStatus)?>)</span>
        </a>
    </h5>

    <div class="collapse show" id="todayTasks">
        <div class="card mb-0">
            <div class="card-body">
                <table class="table table-sm w-100">
                    <thead class="text-center">
                        <tr>
                            <th>Item Code</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Started Date</th>
                            <th>Assignee</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($getAllItemsPerItemStatus)):?>
                            <?php foreach($getAllItemsPerItemStatus as $status):?>
                                <tr class="border-bottom">
                                    <th><?= $status['item_code'];?></th>
                                    <th><?= ucwords($status['title']);?></th>
                                    <td><?= ucfirst($status['description']);?></td>
                                    <td class="text-center">
                                        <?= $status['start_at'] == NULL ? 
                                            '<span class="badge bg-secondary">Not started</span>' : 
                                            date('M d, Y',strtotime($status['start_at']));?>
                                    </td>
                                    <td>
                                        <?php if(!empty($status['a_first_name'])):?>
                                            <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" 
                                                data-bs-placement="bottom" title="Assigned to <?= ucwords($status['a_first_name'].' '.$status['a_last_name']);?>" />
                                            <?= ucwords($status['a_first_name'].' '.$status['a_last_name']);?>
                                        <?php else:?>
                                            <span class="badge bg-secondary">Not assigned</span>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#update-new-task-status-modal<?=$status['id'];?>" class="btn btn-sm btn-default"><i class="text-primary dripicons-pencil"></i></a>
                                        <!--  Update defect item status modal -->
                                        <div class="modal fade task-modal-content" id="update-new-task-status-modal<?=$status['id'];?>" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-top modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="NewTaskModalLabel">Issue: <?= ucwords($status['title']);?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="p-2">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label class="form-label">Select item status</label>
                                                                    <div class="d-flex">
                                                                        <select class="form-control form-select" name="item_status_id" id="item_status_id<?=$status['id'];?>">
                                                                            <option <?=$status['item_status_id']=="OPEN"?"selected":""?> value="OPEN">OPEN</option>
                                                                            <option <?=$status['item_status_id']=="ONGOING"?"selected":""?> value="ONGOING">ONGOING</option>
                                                                            <option <?=$status['item_status_id']=="ONHOLD"?"selected":""?> value="ONHOLD">ONHOLD</option>
                                                                            <option <?=$status['item_status_id']=="DONE"?"selected":""?> value="DONE">DONE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <div class="mb-3">
                                                                        <?php if($status['severity_id']=="NOT_STARTED"):?>
                                                                            <label for="severity_id" class="form-label">Severity</label>
                                                                            <select class="form-select" id="severity_id<?=$status['id'];?>" name="severity_id">
                                                                                <option <?=$status['severity_id']=="LOW"?"selected":""?> value="LOW">LOW</option>
                                                                                <option <?=$status['severity_id']=="MEDIUM"?"selected":""?> value="MEDIUM">MEDIUM</option>
                                                                                <option <?=$status['severity_id']=="HIGH"?"selected":""?> value="HIGH">HIGH</option>
                                                                            </select>
                                                                        <?php else:?>
                                                                            <input type="hidden" name="severity_id" value="<?=$status['severity_id'];?>" id="severity_id<?=$status['id'];?>">
                                                                            <label for="severity_id" class="form-label">Severity:</label><br>
                                                                            <?php if($status['severity_id'] == 'NOT_STARTED'): ?>
                                                                                <span class="badge badge-secondary-lighten"><?= $status['severity_id'];?></span>
                                                                            <?php elseif($status['severity_id'] == 'LOW'): ?>
                                                                                <span class="badge badge-info-lighten"><?= $status['severity_id'];?></span>
                                                                            <?php elseif($status['severity_id'] == 'MEDIUM'):?>
                                                                                <span class="badge badge-warning-lighten"><?= $status['severity_id'];?></span>
                                                                            <?php elseif($status['severity_id'] == 'HIGH'):?>
                                                                                <span class="badge badge-danger-lighten"><?= $status['severity_id'];?></span>
                                                                            <?php else:?>
                                                                                <span class="badge badge-secondary-lighten">NOT SET</span>
                                                                            <?php endif;?>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="mb-3">
                                                                        <?php if(!empty($status['assignee_id'])):?>
                                                                            <input type="hidden" name="assignee_id" value="<?=$status['assignee_id'];?>" id="assignee_id<?=$status['id'];?>">
                                                                            <label for="assignee_id" class="form-label">Assign To: </label><br>
                                                                            <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" 
                                                                                data-bs-placement="bottom" title="Assigned to <?= ucwords($status['a_first_name'].' '.$status['a_last_name']);?>" />
                                                                            <?= ucwords($status['a_first_name'].' '.$status['a_last_name']);?>
                                                                        <?php else:?>
                                                                            <label for="assignee_id" class="form-label">Assign To</label>
                                                                            <select class="form-select" id="assignee_id<?=$status['id'];?>" name="assignee_id">
                                                                                <option selected disabled>Select Assignees</option>
                                                                                <?php foreach($getUsers as $user):?>
                                                                                    <?php if($user['role_name'] != "admin"):?>
                                                                                        <option value="<?=$user['id']?>">
                                                                                            <?=  ucwords($user['first_name'].' '.$user['last_name'].' | '.$user['role_name']);?>
                                                                                        </option>
                                                                                    <?php endif;?>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <div class="mb-3">
                                                                        <?php if($status['start_at'] == NULL || $status['start_at'] == 0):?>
                                                                            <label for="task-priority" class="form-label">Start Date</label>
                                                                            <input type="date" class="form-control" id="start_at<?=$status['id'];?>" name="start_at">
                                                                        <?php else:?>
                                                                            <label for="task-priority" class="form-label">Start Date</label>
                                                                            <input type="text" class="form-control" disabled value="<?=date('M d, Y',strtotime($status['start_at']))?>">
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="assignee_id" class="form-label">Reported by: </label><br>
                                                                        <img src="/assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" 
                                                                            data-bs-placement="bottom" title="Reported by <?= ucwords($status['r_first_name'].' '.$status['r_last_name']);?>" />
                                                                        <?= ucwords($status['r_first_name'].' '.$status['r_last_name']);?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-primary" 
                                                                    onclick="submitTaskStatus(
                                                                        '/defect-items/tasks/u/<?=$status['id'];?>',
                                                                        $('#item_status_id<?=$status['id'];?>').val(),
                                                                        $('#assignee_id<?=$status['id'];?>').val(),
                                                                        $('#severity_id<?=$status['id'];?>').val(),
                                                                        $('#start_at<?=$status['id'];?>').val(),
                                                                        '#update-new-task-status-modal<?=$status['id'];?>'
                                                                    );">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?php if($status['item_status_id']=="OPEN"):?>
                                            <span class="badge bg-primary"><?= $status['item_status_id'];?></span>
                                        <?php elseif($status['item_status_id']=="ONGOING"):?>
                                            <span class="badge bg-warning"><?= $status['item_status_id'];?></span>
                                        <?php elseif($status['item_status_id']=="ONHOLD"):?>
                                            <span class="badge bg-info"><?= $status['item_status_id'];?></span>
                                        <?php elseif($status['item_status_id']=="DONE"):?>
                                            <span class="badge bg-success"><?= $status['item_status_id'];?></span>
                                        <?php else:?>
                                            <span class="badge bg-secondary">NOT SET</span>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No status task for now.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <script>
                    $('.table').DataTable();
                </script>
            </div>
        </div> 
    </div>
</div>
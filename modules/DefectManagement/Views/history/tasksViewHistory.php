
<div class="mt-2 mb-2">
    <?php if(!empty($getUserList)):?>
        <?php foreach($getUserList as $users):?>
            <?php if($users['role_id'] != 1):?>
                <h5 class="m-0 pb-2 mt-2">
                    <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks<?=$users['id'];?>" role="button" aria-expanded="false" aria-controls="todayTasks">
                        <i class='uil uil-angle-down font-18'></i>
                        <img src="/assets/img/user.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" 
                            data-bs-placement="bottom" title="Assigned to <?= ucwords($users['first_name'].' '.$users['last_name']);?>" />
                            <?= ucwords($users['first_name'].' '.$users['last_name']);?> | <?= ucwords($users['role_name']);?> 
                        
                    </a>
                </h5>

                <div class="collapse" id="todayTasks<?=$users['id'];?>">
                    <div class="card mb-0">
                        <div class="card-body">
                            <table class="table table-sm w-100">
                                <thead class="text-center">
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Started Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($getAllItemsPerItemStatus)):?>
                                        <?php foreach($getAllItemsPerItemStatus as $status):?>
                                            <?php if($status['assignee_id'] == $users['id']):?>
                                                <tr class="border-bottom">
                                                    <th><?= $status['item_code'];?></th>
                                                    <th><?= ucwords($status['title']);?></th>
                                                    <td><?= ucfirst($status['description']);?></td>
                                                    <td class="text-center">
                                                        <?= date('M d, Y',strtotime($status['start_at']));?>
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
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>  
                                        <tr>
                                            <td colspan="6">No finished tasks.</td>
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
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>  
        <h1 class="text-center">No Users.</h1>
    <?php endif; ?>
</div>
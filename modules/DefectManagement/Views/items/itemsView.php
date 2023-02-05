<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title m-1"> Items </h4>
        <?php if(user_link('defect-items/a', session()->get('userPermissionView'))):?>
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-new-task-modal" class="btn btn-success btn-sm ms-2">Add New Item</a>
        <?php else: ?>
            <button class="btn btn-success btn-sm ms-2" title="No permission" disabled>Add New Item</button>
        <?php endif; ?>
    </div>
    <div class="card-body p-2">
        <table id="datatable-buttons" class="table table-sm table-striped dt-responsive nowrap w-100">
            <thead class="text-center">
                <tr>
                    <th>Item Code</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Reporter</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($getAllItems as $items):?>
                    <tr>
                        <th class="text-center"><?= $items['item_code'];?></th>
                        <th><?=  ucwords($items['title']);?></th>
                        <td><?= ucwords($items['description']);?></td>
                        <td class="text-center">
                            <img src="/assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" 
                            data-bs-placement="bottom" title="Reported by <?= ucwords($items['r_first_name'].' '.$items['r_last_name']);?>" />
                            <?= ucwords($items['r_first_name'].' '.$items['r_last_name']);?>
                        </td>
                        <td class="text-center">
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
                        <td>
                            <?php if(user_link('defect-items/u', session()->get('userPermissionView'))):?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit-new-task-modal<?=$items['id'];?>" class="btn btn-sm btn-default"><i class="text-primary dripicons-pencil"></i></a>
                                <!--  Edit new item modal -->
                                <div class="modal fade task-modal-content" id="edit-new-task-modal<?=$items['id'];?>" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-top modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="NewTaskModalLabel">Edit defect item</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="p-2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="task-title" class="form-label text-start">Title</label>
                                                                <input type="text" class="form-control" id="edit-task-title" name="title" placeholder="Enter title" value="<?=ucwords($items['title']);?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="task-description" class="form-label text-start">Description</label>
                                                        <textarea class="form-control" id="edit-task-description" name="description" placeholder="Enter description" value="<?=ucwords($items['description']);?>" rows="3" required><?=ucwords($items['description']);?></textarea>
                                                    </div>
                                                    
                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" onclick="submitNewItem('defect-items/u/<?=$items['id'];?>', $('#edit-task-title').val(), $('#edit-task-description').val(), $('#edit-task-title'), $('#edit-task-description'), '#edit-new-task-modal<?=$items['id'];?>');" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <button type="button" class="btn btn-default btn-sm" disabled>Edit</button>
                            <?php endif; ?>
                            <?php if(user_link('defect-items/d', session()->get('userPermissionView'))):?>
                                <a onclick="confirmDelete('/defect-items/d/',<?=$items['id']?>)" title="Delete" class="btn btn-sm btn-default"><i class="text-danger dripicons-trash"></i></a>
                            <?php else: ?>
                                <button type="button" class="btn btn-default btn-sm" disabled>Delete</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            $('.table').DataTable();
        </script>
    </div>
</div>
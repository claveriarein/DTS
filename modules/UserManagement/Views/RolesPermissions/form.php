<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/role-permissions"><?= $title ?></a></li>
                            <li class="breadcrumb-item active"><?= $edit?'Edit ':'Add '?><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $edit?'Edit ':'Add '?><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <form method="POST" action="<?= base_url('role-permissions')?>/<?= $edit ? 'u/'.esc($id): 'a'?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Permission <small class="text-danger">*</small></label>
                                <input value="<?=isset($value['role_name']) ? esc($value['role_name']): ''?>" type="text" name="role" class="form-control" id="role" disabled>
                                <?php if(isset($errors['role_id'])):?>
                                  <p class="text-danger"><?=esc($errors['role_id'])?><p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <label class="form-label" for="permission_id">Permission Name</label>
                              <div class="input-group mb-2">
                                <select class="js-example-basic-multiple form-control" name="permission_id[]" multiple="multiple" id="permissions">
                                  <?php foreach ($modules as $module): ?>
                                    <optgroup label="<?=ucwords(esc($module['module_name']))?>">
                                      <?php foreach ($permissions as $permission): ?>
                                        <?php $selected = false; ?>
                                        <?php if (!empty($role_permissions)): ?>
                                          <?php foreach ($role_permissions as $role_permission): ?>
                                            <?php if ($role_permission['permission_id'] == $permission['id']): ?>
                                              <?php $selected = true; ?>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if ($module['id'] == $permission['module_id']): ?>
                                          <option value="<?=esc($permission['id'])?>" <?=$selected ? 'selected': ''?>><?=ucwords(esc($permission['permission_name']))?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </optgroup>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                                <?php if(isset($errors['permission_id'])):?>
                                  <p class="text-danger"><?=esc($errors['permission_id'])?><p>
                                <?php endif;?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success float-end mt-2"><?= $action ?></button>
                    </form>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
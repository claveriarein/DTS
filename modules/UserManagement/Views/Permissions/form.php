<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/permissions"><?= $title ?></a></li>
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
                    <form method="POST" action="/permissions/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Permission <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['permission_name']) ? 'is-invalid':'is-valid' ?>" name="permission_name" placeholder="Permission Name" value="<?= isset($value['permission_name'])? esc($value['permission_name']) : ''?>">
                                <?php if(isset($errors['permission_name'])):?>
                                    <small class="text-danger"><?=esc($errors['permission_name'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Permission Type <small class="text-danger">*</small></label>
                                <select class="form-control custom-select <?= isset($errors['permission_type_id']) ? 'is-invalid':'is-valid' ?>" name="permission_type_id">
                                    <option value="x" <?= isset($permissionTypes) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($permissionTypes as $option) : ?>
                                        <?php $selected = false ?>
                                        <?php if(isset($value['permission_type_id'])): ?>
                                            <?php if($option['id'] == $value['permission_type_id']): ?>
                                                <?php $selected = true;?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['permission_type_id'])):?>
                                    <small class="text-danger"><?=esc($errors['permission_type_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Module <small class="text-danger">*</small></label>
                                <select class="form-control custom-select <?= isset($errors['module_id']) ? 'is-invalid':'is-valid' ?>" name="module_id">
                                    <option value="x" <?= isset($modules) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($modules as $option) : ?>
                                        <?php $selected = false ?>
                                        <?php if(isset($value['module_id'])): ?>
                                            <?php if($option['id'] == $value['module_id']): ?>
                                                <?php $selected = true;?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['module_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['module_id'])):?>
                                    <small class="text-danger"><?=esc($errors['module_id'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Slug <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['slug']) ? 'is-invalid':'is-valid' ?>" name="slug" placeholder="Slug" value="<?= isset($value['slug'])? esc($value['slug']) : ''?>">
                                <?php if(isset($errors['slug'])):?>
                                    <small class="text-danger"><?=esc($errors['slug'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Icon <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['icon']) ? 'is-invalid':'is-valid' ?>" name="icon" placeholder="Icon" value="<?= isset($value['icon'])? esc($value['icon']) : ''?>">
                                <?php if(isset($errors['icon'])):?>
                                    <small class="text-danger"><?=esc($errors['icon'])?></small>
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
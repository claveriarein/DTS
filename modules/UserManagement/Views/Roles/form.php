<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/roles"><?= $title ?></a></li>
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
                    <form method="POST" action="/roles/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Role name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['role_name']) ? 'is-invalid':'is-valid' ?>" name="role_name" placeholder="Role name" value="<?= isset($value['role_name'])? esc($value['role_name']) : ''?>">
                                <?php if(isset($errors['role_name'])):?>
                                    <small class="text-danger"><?=esc($errors['role_name'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Description <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" name="description" placeholder="Description" value="<?= isset($value['description'])? esc($value['description']) : ''?>">
                                <?php if(isset($errors['description'])):?>
                                    <small class="text-danger"><?=esc($errors['description'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="inputAddress2">Landing Page <small class="text-danger">*</small></label>
                                <select class="form-select <?= isset($errors['landing_page_id']) ? 'is-invalid':'is-valid' ?>" name="landing_page_id">
                                    <option value="" <?= isset($permissions) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($modules as $index) : ?>
                                        <?php foreach ($permissions as $option) : ?>
                                            <?php if($index['id'] == $option['module_id']): ?>
                                                <?php $selected = false ?>
                                                <?php if(isset($value['landing_page_id'])): ?>
                                                    <?php if($option['id'] == $value['landing_page_id']): ?>
                                                        <?php $selected = true;?>
                                                    <?php endif; ?>
                                                <?php endif;?>
                                                <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['permission_name']); ?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['landing_page_id'])):?>
                                    <small class="text-danger"><?=esc($errors['landing_page_id'])?></small>
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
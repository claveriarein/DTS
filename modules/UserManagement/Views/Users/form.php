<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/users"><?= $title ?></a></li>
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
                    <form method="POST" action="/users/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <?php if($edit):?>
                            <input type="hidden" name="userID" value="<?=$id?>">                             
                        <?php endif;?>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4">Last name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'is-valid' ?> " id="inputEmail4" name="last_name" placeholder="Last name" value="<?= isset($value['last_name']) ? esc($value['last_name']) : '' ?>">
                                <?php if(isset($errors['last_name'])):?>
                                    <small class="text-danger"><?=esc($errors['last_name'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4">First name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'is-valid' ?> " id="inputPassword4" name="first_name" placeholder="First name" value="<?= isset($value['first_name']) ? esc($value['first_name']) : '' ?>">
                                <?php if(isset($errors['first_name'])):?>
                                    <small class="text-danger"><?=esc($errors['first_name'])?></small>
                                <?php endif;?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputCity">Email Address <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?> " id="inputCity" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? esc($value['email_address']) : '' ?>">
                                <?php if(isset($errors['email_address'])):?>
                                    <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                <?php endif;?>    
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Role <small class="text-danger">*</small></label>
                                <select class="form-control custom-select <?= isset($errors['role_id']) ? 'is-invalid':'is-valid' ?>" name="role_id">
                                    <option value="x" <?= isset($roles) ? null : 'selected' ?>>-- select --</option>
                                    <?php foreach ($roles as $option) : ?>
                                        <?php $selected = false ?>
                                        <?php if(isset($value['role_id'])): ?>
                                            <?php if($option['id'] == $value['role_id']): ?>
                                                <?php $selected = true;?>
                                            <?php endif; ?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= ucwords($option['role_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['role_id'])):?>
                                    <small class="text-danger"><?=esc($errors['role_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Username <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'is-valid' ?>"  name="username" id="username" value="<?= isset($value['username']) ? esc($value['username']) : '' ?>" placeholder="Username">
                                <?php if(isset($errors['username'])):?>
                                    <small class="text-danger"><?=esc($errors['username'])?></small>
                                <?php endif;?>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress2">Password <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'is-valid' ?> " name="password" id="password" placeholder="Password">
                                <?php if(isset($errors['password'])):?>
                                    <small class="text-danger"><?=esc($errors['password'])?></small>
                                <?php endif;?>    
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2">Confirm Password <small class="text-danger">*</small></label>
                                <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'is-valid' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                <?php if(isset($errors['confirm_password'])):?>
                                    <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
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
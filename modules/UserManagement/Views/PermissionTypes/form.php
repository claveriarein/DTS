<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/permission-types"><?= $title ?></a></li>
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
                    <form method="POST" action="/permission-types/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Permission Type <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['type']) ? 'is-invalid':'is-valid' ?>" name="type" placeholder="Permission Type" value="<?= isset($value['type'])? esc($value['type']) : ''?>">
                                <?php if(isset($errors['type'])):?>
                                    <small class="text-danger"><?=esc($errors['type'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="col-md-6">
                                <label>Slug  <small class="text-danger">*</small></label>
                                <input type="text" class="form-control <?= isset($errors['slug']) ? 'is-invalid':'is-valid' ?>" name="slug" placeholder="Slug" value="<?= isset($value['slug'])? esc($value['slug']) : ''?>">
                                <?php if(isset($errors['slug'])):?>
                                    <small class="text-danger"><?=esc($errors['slug'])?></small>
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
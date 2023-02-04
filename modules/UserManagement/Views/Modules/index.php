<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

    </div> <!-- end col -->

</div>

<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <?php if(user_link('modules/a', session()->get('userPermissionView'))):?>
                    <a class="btn btn-primary btn-sm float-end" href="/modules/a" role="button">  Add </a>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Add</button>
                <?php endif; ?>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover dt-responsive nowrap w-100 text-center">
                            <thead class="thead-dark">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; foreach ($modules as $module) : ?>
                                    <tr>
                                        <th scope="row"><?= $id++; ?></th>
                                        <td><?= ucwords($module['module_name']); ?></td>
                                        <td><?= ucwords($module['description']); ?></td>
                                        <td>
                                            <?php if(user_link('modules/u', session()->get('userPermissionView'))):?>
                                                <a href="/modules/u/<?= $module['id']; ?>" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | Edit</button>
                                            <?php endif; ?>
                                            <?php if(user_link('modules/d', session()->get('userPermissionView'))):?>
                                                <a onclick="confirmDelete('/modules/d/',<?=$module['id']?>)" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | Delete</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>              
               
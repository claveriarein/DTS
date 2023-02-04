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
                <?php if(user_link('roles/a', session()->get('userPermissionView'))):?>
                    <a class="btn btn-primary btn-sm float-end" href="/roles/a" role="button">  Add </a>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Add Button</button>
                <?php endif; ?>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-sm table-hover dt-responsive nowrap w-100 text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Landing Page</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 1; foreach ($roles as $role) : ?>
                                    <tr>
                                        <th scope="row"><?= $id++ ?></th>
                                        <td><?= strtolower($role['role_name']); ?></td>
                                        <td><?= strtolower($role['description']); ?></td>
                                        <td><?= ucwords($role['permission_name']); ?></td>
                                        <td>
                                            <?php if(user_link('roles/u', session()->get('userPermissionView'))):?>
                                                <a href="/roles/u/<?= $role['id']; ?>" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | Edit</button>
                                            <?php endif; ?>
                                            <?php if(user_link('roles/d', session()->get('userPermissionView'))):?>
                                                <a onclick="confirmDelete('/roles/d/',<?=$role['id']?>)" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
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
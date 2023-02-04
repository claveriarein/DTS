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
                <?php if(user_link('users/a', session()->get('userPermissionView'))):?>
                    <a class="btn btn-primary btn-sm float-end" href="/users/a" role="button">  Add </a>
                <?php else: ?>
                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Add</button>
                <?php endif; ?>
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="table-responsive table-responsive-sm">
                        <table id="basic-datatable" class="table table-sm table-hover dt-responsive text-center nowrap w-100">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ctr = 1; foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row"><?= $ctr++ ?></th>
                                        <td><?= ucwords($user['first_name']) . " " . ucwords($user['last_name']); ?></td>
                                        <td><?= strtolower($user['role_name']); ?></td>
                                        <td><?= strtolower($user['username']); ?></td>
                                        <td><?= strtolower($user['email_address']); ?></td>
                                        <td>
                                            <?php if(user_link('users/v', session()->get('userPermissionView'))):?>
                                                <a href="/users/v/<?= $user['id']; ?>" class="btn btn-sm btn-default"><i class="mdi mdi-eye"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | View</button>
                                            <?php endif; ?>
                                            <?php if(user_link('users/u', session()->get('userPermissionView'))):?>
                                                <a href="/users/u/<?= $user['id']; ?>" class="btn btn-sm btn-default"><i class=" dripicons-pencil"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | Edit</button>
                                            <?php endif; ?>
                                            <?php if(user_link('users/d', session()->get('userPermissionView'))):?>
                                                <a onclick="confirmDelete('/users/d/',<?=$user['id']?>)" class="btn btn-sm btn-default"><i class=" dripicons-trash"></i></a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-secondary btn-sm">No Permission | Delete</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php $ctr++;
                                endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <script>
                            $(document).ready(function () {
                                $('#basic-datatable').DataTable({
                                    order: [[3, 'asc']],
                                });
                            });
                        </script> -->
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
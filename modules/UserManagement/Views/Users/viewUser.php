<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active"><?=$action;?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title;?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 


<div class="row">
    <div class="col-sm-12">
        <!-- Profile -->
        <?php foreach ($users as $user) : ?>
            <div class="card bg-primary">
                <div class="card-body profile-user-box">

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="/assets/img/user.jpg" alt="" class="rounded-circle img-thumbnail">
                                    </div>
                                </div> 
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white"><?= ucwords($user['first_name']) . " " . ucwords($user['last_name']) ?></h4>
                                        <p class="font-13 text-white-50"> <?= strtolower($user['role_name']) ?></p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1"><?= strtoupper($user['username']) ?></h5>
                                                <p class="mb-0 font-13 text-white-50">Username</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1"><?= strtolower($user['email_address']) ?></h5>
                                                <p class="mb-0 font-13 text-white-50">Email Address</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                <?php if(user_link('users/u', session()->get('userPermissionView'))):?>
                                    <a href="/users/u/<?= $user['id'] ?>" type="button" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                    </a>
                                <?php else: ?>
                                    <button type="button" class="btn btn-secondary btn-sm">No Permission | Edit Button</button>
                                <?php endif; ?>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div><!--end profile/ card -->
        <?php endforeach; ?>
    </div> <!-- end col-->
</div>
<!-- end row -->
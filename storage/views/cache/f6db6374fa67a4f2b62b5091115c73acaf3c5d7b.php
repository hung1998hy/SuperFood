
<?php if(!checkPer($_SESSION['user']['id'], 'user_view')): ?>
    <?php
        header("Location: /superFood/admin/dashboard/");
        ?>
<?php endif; ?>


<?php $__env->startSection('title'); ?><?php echo e('Users'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin.layouts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý người dùng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý người dùng</li>
                    </ol>
                    <?php if(checkPer($_SESSION['user']['id'], 'user_add')): ?>
                        <a href="/superFood/admin/users/create" class="btn btn-primary addBtn">Thêm người dùng
                        </a>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng người dùng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Ảnh đại diện</th>
                                        <th>Tên</th>
                                        <th>Họ</th>
                                        <th>Email</th>
                                        <th>Nhóm quyền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><img src="<?php if($user->images): ?>
                                                        /<?php echo e($_ENV['APP_NAME']); ?>/uploads/<?php echo e($user->images); ?>

                                                <?php else: ?>
                                                        /<?php echo e($_ENV['APP_NAME'].'/backend/assets/images/userImages/defaultImage.png'); ?>

                                                <?php endif; ?>" alt="" width="100" height="100"></td>
                                            <td><?php echo e($user->firstname); ?></td>
                                            <td><?php echo e($user->lastname); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($user->role_id == $role->id): ?>
                                                        <?php echo e($role->name); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                            <?php if(checkPer($_SESSION['user']['id'], 'user_edit')): ?>
                                                <a class="btn btn-primary"
                                                   href="/superFood/admin/users/edit/<?php echo e($user->id); ?>">Sửa</a>
                                            <?php endif; ?>
                                            <?php if(checkPer($_SESSION['user']['id'], 'user_delete')): ?>
                                                <a class="user_delete btn btn-danger"
                                                   href="/superFood/admin/users/delete/<?php echo e($user->id); ?>">Xóa</a>
                                                <?php endif; ?>
                                                </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/users/index.blade.php ENDPATH**/ ?>
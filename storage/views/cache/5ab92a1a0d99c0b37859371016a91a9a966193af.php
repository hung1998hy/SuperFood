<?php if(!checkPer($_SESSION['user']['id'], 'role_view')): ?>
    <?php
    header("Location: /superFood/admin/dashboard/");
    ?>
<?php endif; ?>

<?php $__env->startSection('title'); ?><?php echo e('News Categories'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin.layouts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý phân quyền</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý phân quyền</li>
                    </ol>
                    <?php if(checkPer($_SESSION['user']['id'], 'role_add')): ?>
                        <a href="/superFood/admin/roles/create" class="btn btn-primary addBtn">Thêm quyền
                        </a>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng phân quyền
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($role->id); ?></td>
                                        <td><?php echo e($role->name); ?></td>
                                        <td>
                                            <?php if(checkPer($_SESSION['user']['id'], 'role_edit')): ?>
                                            <a class="btn btn-primary" href="/superFood/admin/roles/edit/<?php echo e($role->id); ?>">Sửa</a>
                                            <?php endif; ?>
                                            <?php if(checkPer($_SESSION['user']['id'], 'role_delete')): ?>
                                                <a class="btn btn-danger" href="/superFood/admin/roles/delete/<?php echo e($role->id); ?>">Xóa</a>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title'); ?><?php echo e('Add Users'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin.layouts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý người dùng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm người dùng</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="/superFood/admin/users/update/<?php echo e($user->id); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="images">Ảnh mô tả</label>
                            <input type="file" name="userImageUpdate" class="form-control" id="images">
                        </div>
                        <div class="form-group">
                            <label for="userFirstNameUpdate">Tên:</label>
                            <input value="<?php echo e($user->firstname); ?>" type="text" name="userFirstNameUpdate" class="form-control" id="userFirstNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userLastNameUpdate">Họ:</label>
                            <input value="<?php echo e($user->lastname); ?>" type="text" name="userLastNameUpdate" class="form-control" id="userLastNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userEmailUpdate">Email:</label>
                            <input value="<?php echo e($user->email); ?>" type="text" name="userEmailUpdate" class="form-control" id="userEmailUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userPasswordUpdate">Mật khẩu:</label>
                            <input type="password" name="userPasswordUpdate" class="form-control" id="userPasswordUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userRepasswordUpdate">Nhập lại mật khẩu:</label>
                            <input type="password" name="userRepasswordUpdate" class="form-control" id="userRepasswordUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userRoleUpdate">Nhóm quyền:</label>
                            <select name="role_id" class="form-control" id="userRoleUpdate">
                                <option value=""></option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if ($role->id == $user->role_id) echo 'selected' ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        
                        
                        
                        
                        
                        <button class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </main>
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>
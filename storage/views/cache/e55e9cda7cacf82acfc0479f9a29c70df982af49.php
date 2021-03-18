<?php if(!checkPer($_SESSION['user']['id'], 'post_view')): ?>
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
                    <h1 class="mt-4">Quản lý danh mục tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý danh mục tin tức</li>
                    </ol>
                    <?php if(!checkPer($_SESSION['user']['id'], 'post_add')): ?>
                    <a href="/superFood/admin/newsCategories/create" class="btn btn-primary addBtn">Thêm danh mục
                    </a>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng danh mục tin tức
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
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->id); ?></td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td>
                                            <?php if(!checkPer($_SESSION['user']['id'], 'post_edit')): ?>
                                                <a class="btn btn-primary" href="/superFood/admin/newsCategories/edit/<?php echo e($category->id); ?>">Sửa</a>
                                            <?php endif; ?>
                                            <?php if(!checkPer($_SESSION['user']['id'], 'post_delete')): ?>
                                                <a class="btn btn-danger" href="/superFood/admin/newsCategories/delete/<?php echo e($category->id); ?>">Xóa</a>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/news_categories/index.blade.php ENDPATH**/ ?>
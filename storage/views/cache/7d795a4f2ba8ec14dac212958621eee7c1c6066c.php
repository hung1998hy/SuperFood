<?php if(!checkPer($_SESSION['user']['id'], 'post_view')): ?>
    <?php
    header("Location: /superFood/admin/dashboard/");
    ?>
<?php endif; ?>

<?php $__env->startSection('title'); ?><?php echo e('News'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin.layouts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý tin tức</li>
                    </ol>
                    <?php if(checkPer($_SESSION['user']['id'], 'post_add')): ?>
                        <a href="/superFood/admin/news/create" class="btn btn-primary addBtn">Thêm tin tức
                        </a>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng tin tức
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Ảnh tin</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Tác giả</th>
                                        <th>Danh mục</th>
                                        <th>Tags</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><img src="../../public/uploads/<?php echo e($news->images); ?>" alt="" width="100" height="100"></td>
                                        <td><?php echo e($news->title); ?></td>
                                        <td><?php echo e($news->description); ?></td>
                                        <td><?php echo e($news->author); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($news->category_id == $category->id): ?>
                                                    <?php echo e($category->name); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $newsTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($news->id == $newsTag->news_id): ?>
                                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($tag->id == $newsTag->tag_id): ?>
                                                            <?php echo e($tag->name . ','); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php if(checkPer($_SESSION['user']['id'], 'post_edit')): ?>
                                            <a class="btn btn-primary" href="/superFood/admin/news/edit/<?php echo e($news->id); ?>">Sửa</a>
                                            <?php endif; ?>
                                            <?php if(checkPer($_SESSION['user']['id'], 'post_delete')): ?>
                                                <a class="btn btn-danger" href="/superFood/admin/news/delete/<?php echo e($news->id); ?>">Xóa</a>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/news/index.blade.php ENDPATH**/ ?>
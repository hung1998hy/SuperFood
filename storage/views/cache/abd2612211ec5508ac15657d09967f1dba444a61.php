
<?php $__env->startSection('title'); ?><?php echo e('Add News'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin.layouts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm tin tức</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="/superFood/admin/news/update/<?php echo e($news->id); ?>" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="newsTitleUpdate">Tiêu đề:</label>
                                <input value="<?php echo e($news->title); ?>" type="text" name="newImageUpdate" class="form-control"
                                       id="newsTitleUpdate">
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh mô tả</label>
                                <input type="file" name="images" class="form-control" id="images">
                            </div>
                            <div class="form-group">
                                <label for="newsDescUpdate">Mô tả:</label>
                                <input value="<?php echo e($news->description); ?>" type="text" name="newsDescUpdate"
                                       class="form-control" id="newsDescUpdate">
                            </div>
                            <div class="form-group">
                                <label for="newsContentUpdate">Nội dung:</label>
                                <textarea type="text" name="newsContentUpdate" class="form-control"
                                          id="newsContentUpdate"><?php echo e($news->content); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="newsAuthorUpdate">Tác giả:</label>
                                <input value="<?php echo e($news->author); ?>" type="text" name="newsAuthorUpdate"
                                       class="form-control" id="newsAuthorUpdate">
                            </div>
                            <div class="form-group">
                                <label for="newsCategoryUpdate">Danh mục:</label>
                                <select name="newsCategoryUpdate" id="newsCategoryUpdate" class="form-control">
                                    <option value="0">Chọn làm danh mục cha:</option>
                                    <?php echo $html; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label style="display: inline-block; width: 100%;">
                                        <input style="margin-right: 5px" name="tags[]"
                                               <?php $__currentLoopData = $newsTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $newsTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($news->id == $newsTag->news_id): ?>
                                               <?php if($tag->id == $newsTag->tag_id): ?>
                                               checked
                                               <?php endif; ?>
                                               <?php endif; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               type="checkbox" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </main>
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>
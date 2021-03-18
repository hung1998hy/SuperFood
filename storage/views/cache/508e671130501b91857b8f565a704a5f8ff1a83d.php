
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
                    <form action="/superFood/admin/news/store" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="newsTitleAdd">Tiêu đề:</label>
                                <input type="text" name="newsTitleAdd" class="form-control" id="newsTitleAdd">
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh mô tả</label>
                                <input type="file" name="images" class="form-control" id="images">
                            </div>
                            <div class="form-group">
                                <label for="newsDescAdd">Mô tả:</label>
                                <input type="text" name="newsDescAdd" class="form-control" id="newsDescAdd">
                            </div>
                            <div class="form-group">
                                <label for="newsContentAdd">Nội dung:</label>
                                <textarea type="text" name="newsContentAdd" class="form-control"
                                          id="newsContentAdd"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="newsAuthorAdd">Tác giả:</label>
                                <input type="text" name="newsAuthorAdd" class="form-control" id="newsAuthorAdd">
                            </div>
                            <div class="form-group">
                                <label for="newsCategoryAdd">Danh mục:</label>
                                <select name="newsCategoryAdd" id="newsCategoryAdd" class="form-control">
                                    <option value="0">Chọn làm danh mục cha:</option>
                                    <?php echo $html; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label style="display: inline-block; width: 100%;"><input style="margin-right: 5px" name="tags[]" type="checkbox" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></label>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/news/add.blade.php ENDPATH**/ ?>
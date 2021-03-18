<?php
    if (isset($_SESSION['user'])) {
        header('Location:/superFood/admin/dashboard/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>SuperFood| Register</title>
    <link href="<?php echo e(BASE_URL.'core/assets/css/core.css'); ?>" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3>
                            </div>
                            <div class="card-body">
                                <form action="/superFood/admin/registerCheck" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Tên</label>
                                                <input name="firstname" class="form-control py-4" id="inputFirstName"
                                                       type="text" placeholder="Nhập tên"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputLastName">Họ</label>
                                                <input name="lastname" class="form-control py-4" id="inputLastName"
                                                       type="text" placeholder="Nhập họ"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input name="email" class="form-control py-4" id="inputEmailAddress"
                                               type="text" aria-describedby="emailHelp"
                                               placeholder="Nhập Email"/>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Mật khẩu</label>
                                                <input name="password" class="form-control py-4" id="inputPassword"
                                                       type="password" placeholder="Nhập mật khẩu"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">Xác nhận
                                                    mật khẩu</label>
                                                <input name="confirm" class="form-control py-4"
                                                       id="inputConfirmPassword" type="password"
                                                       placeholder="Xác nhận mật khẩu"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <button name="register" class="btn btn-primary btn-block">Tạo tài khoản
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="/superFood/admin/login">Đã có tài khoản? Đăng nhập ngay!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Bản quyền &copy; Website của bạn 2020</div>
                    <div>
                        <a href="#">Chính sách Bảo mật</a>
                        &middot;
                        <a href="#">Điều khoản & Điều kiện</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="<?php echo e(BASE_URL.'backend/assets/js/scripts.js'); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SuperFood\resources\views/admin/auth/register.blade.php ENDPATH**/ ?>
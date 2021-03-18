@extends('admin.layouts.master')
@section('title'){{'Add Users'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
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
                    <form action="/superFood/admin/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="images">Ảnh mô tả</label>
                            <input type="file" name="userImageUpdate" class="form-control" id="images">
                        </div>
                        <div class="form-group">
                            <label for="userFirstNameUpdate">Tên:</label>
                            <input value="{{$user->firstname}}" type="text" name="userFirstNameUpdate" class="form-control" id="userFirstNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userLastNameUpdate">Họ:</label>
                            <input value="{{$user->lastname}}" type="text" name="userLastNameUpdate" class="form-control" id="userLastNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userEmailUpdate">Email:</label>
                            <input value="{{$user->email}}" type="text" name="userEmailUpdate" class="form-control" id="userEmailUpdate">
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
                                @foreach($roles as $role)
                                    <option @php if ($role->id == $user->role_id) echo 'selected' @endphp value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
{{--                                                <div class="form-group position-relative text-center">--}}
{{--                                                    <img class="imagesForm" width="100" src="../../../../public/admin/assets/images/userImages/defaultImage.png"/>--}}
{{--                                                    <label class="formLabel" for="fileToAddUser"><i class="fas fa-pen"></i><input--}}
{{--                                                                style="display: none" type="file" id="fileToAddUser"--}}
{{--                                                                name="fileToUpload"></label>--}}
{{--                                                </div>--}}
                        <button class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
@endsection
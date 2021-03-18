@if(!checkPer($_SESSION['user']['id'], 'role_view'))
    <?php
    header("Location: /superFood/admin/dashboard/");
    ?>
@endif
@extends('admin.layouts.master')
@section('title'){{'News Categories'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý phân quyền</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý phân quyền</li>
                    </ol>
                    @if(checkPer($_SESSION['user']['id'], 'role_add'))
                        <a href="/superFood/admin/roles/create" class="btn btn-primary addBtn">Thêm quyền
                        </a>
                    @endif
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
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @if(checkPer($_SESSION['user']['id'], 'role_edit'))
                                            <a class="btn btn-primary" href="/superFood/admin/roles/edit/{{$role->id}}">Sửa</a>
                                            @endif
                                            @if(checkPer($_SESSION['user']['id'], 'role_delete'))
                                                <a class="btn btn-danger" href="/superFood/admin/roles/delete/{{$role->id}}">Xóa</a>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
@endsection
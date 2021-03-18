@if(!checkPer($_SESSION['user']['id'], 'post_view'))
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
                    <h1 class="mt-4">Quản lý danh mục tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý danh mục tin tức</li>
                    </ol>
                    @if(checkPer($_SESSION['user']['id'], 'post_add'))
                    <a href="/superFood/admin/newsCategories/create" class="btn btn-primary addBtn">Thêm danh mục
                    </a>
                    @endif
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
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @if(checkPer($_SESSION['user']['id'], 'post_edit'))
                                                <a class="btn btn-primary" href="/superFood/admin/newsCategories/edit/{{$category->id}}">Sửa</a>
                                            @endif
                                            @if(checkPer($_SESSION['user']['id'], 'post_delete'))
                                                <a class="btn btn-danger" href="/superFood/admin/newsCategories/delete/{{$category->id}}">Xóa</a>
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
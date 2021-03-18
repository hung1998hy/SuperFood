@if(!checkPer($_SESSION['user']['id'], 'post_view'))
    <?php
    header("Location: /superFood/admin/dashboard/");
    ?>
@endif
@extends('admin.layouts.master')
@section('title'){{'News Tags'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Tags tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý Tags tin tức</li>
                    </ol>
                    @if(checkPer($_SESSION['user']['id'], 'post_add'))
                    <a href="/superFood/admin/newsTags/create" class="btn btn-primary addBtn">Thêm Tag
                    </a>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng Tags tin tức
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
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>
                                            @if(checkPer($_SESSION['user']['id'], 'post_edit'))
                                                <a class="btn btn-primary" href="/superFood/admin/newsTags/edit/{{$tag->id}}">Sửa</a>
                                            @endif
                                            @if(checkPer($_SESSION['user']['id'], 'post_delete'))
                                                <a class="btn btn-danger" href="/superFood/admin/newsTags/delete/{{$tag->id}}">Xóa</a>
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
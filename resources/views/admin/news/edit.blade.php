@extends('admin.layouts.master')
@section('title'){{'Add News'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
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
                    <form action="/superFood/admin/news/update/{{$news->id}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="newsTitleUpdate">Tiêu đề:</label>
                                <input value="{{$news->title}}" type="text" name="newsTitleUpdate" class="form-control"
                                       id="newsTitleUpdate">
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh mô tả</label>
                                <input type="file" name="images" class="form-control" id="images">
                            </div>
                            <div class="form-group">
                                <label for="newsDescUpdate">Mô tả:</label>
                                <input value="{{$news->description}}" type="text" name="newsDescUpdate"
                                       class="form-control" id="newsDescUpdate">
                            </div>
                            <div class="form-group">
                                <label for="newsContentUpdate">Nội dung:</label>
                                <textarea type="text" name="newsContentUpdate" class="form-control"
                                          id="newsContentUpdate">{{$news->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="newsAuthorUpdate">Tác giả:</label>
                                <input value="{{$news->author}}" type="text" name="newsAuthorUpdate"
                                       class="form-control" id="newsAuthorUpdate">
                            </div>
                            <div class="form-group">
                                <label for="newsCategoryUpdate">Danh mục:</label>
                                <select name="newsCategoryUpdate" id="newsCategoryUpdate" class="form-control">
                                    <option value="0">Chọn làm danh mục cha:</option>
                                    {!! $html !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                @foreach ($tags as $key => $tag)
                                    <label style="display: inline-block; width: 100%;">
                                        <input style="margin-right: 5px" name="tags[]"
                                               @foreach ($newsTags as $key => $newsTag)
                                               @if ($news->id == $newsTag->news_id)
                                               @if($tag->id == $newsTag->tag_id)
                                               checked
                                               @endif
                                               @endif
                                               @endforeach
                                               type="checkbox" value="{{$tag->id}}">{{$tag->name}}
                                    </label>
                                @endforeach
                            </div>
                            <button class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
@endsection
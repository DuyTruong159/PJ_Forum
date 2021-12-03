@extends('layout')
@section('content')

<div class="body_post">
    <div class="container py-3 mb-3">
    <form action="{{route('blogpostdone')}}" method="post" class="form-post">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('status')=='Success')
        <div class="alert alert-success">
            Thêm bài viết thành công !!!
        </div>
        @endif
        <h3>Thêm bài viết mới</h3>
        <div class="form-group">
            <label for="tag">Chủ đề</label>
            <select name="tag" id="tag">
                @foreach ($tag as $t)
                <option value="{{$t->Id}}">{{$t->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề bài viết:<i class="text-danger">*</i></label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="post_content">Nội dung:<i class="text-danger">*</i></label>
            <textarea name="post_content" id="post_content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="is_public">Public bài viết:</label>
            <div class="btn_check">
                <input type="checkbox" id="is_public" name="is_public" value="1" checked class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div></div>
            <div class="btn_wrapper">
                <div class="">
                    <input type="submit" name="btn_submit" value="Thêm bài viết" class="form-control btn_submit">
                </div>
            </div>
        </div>

    </form>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#post_content' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'ckfinder', 'imageUpload', 'blockQuote', 'insertTable', '|',  'undo', 'redo' ]
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

</script>

@endsection

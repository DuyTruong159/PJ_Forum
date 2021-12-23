@extends('admin.layoutAdmin')
@section('contentAdmin')

<style>
.ck-editor__editable {
    min-height: 300px;
    max-height: 300px;
}
</style>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Default Basic Forms</h4>
                        <p class="mb-30">All bootstrap element classies</p>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('blogPostAdone')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="title" class="col-sm-12 col-md-2 col-form-label">Tiêu đề bài viết:<i class="text-danger">*</i></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="title" type="text" value="{{old('title')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tag" class="col-sm-12 col-md-2 col-form-label">Chủ Đề:</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="tag" style="width: 100%;" class="form-control">
                                @foreach ($tag as $t)
                                <option value="{{$t->Id}}">{{$t->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="post_content" class="col-sm-12 col-md-2 col-form-label">Nội dung:<i class="text-danger">*</i></label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="post_content" id="post_content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="is_public">Public bài viết</label>
                        <div class="col-sm-12 col-md-10 d-flex justify-content-start">
                            <input type="checkbox" id="is_public" name="is_public" value="1" checked class="form-control" style="width: 24px; height: 24px;">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <input type="submit" name="btn_submit" value="Thêm bài viết" class="form-control btn_submit" style="width: 20%; background-color: #1b00ff; color: white;">
                    </div>
                </form>
            </div>
            <!-- Default Basic Forms End -->

            <!-- horizontal Basic Forms Start -->


        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
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

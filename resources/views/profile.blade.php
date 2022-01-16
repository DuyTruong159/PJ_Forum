@extends('layout')
@section('content')

<style>
    .search .container,.profile .container{
    border-bottom: 1px solid rgb(190, 190, 190);
    border-left: 1px solid rgb(190, 190, 190);
    border-right: 1px solid rgb(190, 190, 190);
}
.table_ td,.table_ th{
    text-align: left;
}
.img-circle{
    border-radius: 50%;
}
.pull-left{
    float: left;
}
.panel-default{
    border-color: #ddd!important;
}
.panel{
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
.panel-default .panel-heading{
     color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-heading{
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body{
    padding: 15px;
}
.col-xs-6{
    width: 50%;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    float: left;
}
.col-xs-12{
    width: 100%;
    float: left;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.f-16{
    font-size: 16px;
}
</style>

<div class="alert alert-success alert-dismissible fade show position-fixed" style="left:1100px; top:80px; z-index: 2;display: none;" role="alert">
    Xóa thành công!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="profile">
    <div class="container p-2 mb-3">
        <div class="wrapper" style="border: 1px solid  rgb(190, 190, 190) ; padding: 10px;">
            <h3 style="letter-spacing: 3px;">Profile</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="text-center mb-3">
                        <img src="{{Cookie::get('avatar')}}" class="avatar img-circle img-thumbnail" alt="avatar" style="height: 192px; width: 192px">
                    </div>
                    <div class="panel text-center">
                        <button class="update_ btn btn-primary" >
                            Cập Nhật
                        </button>
                        <div class="modal-update">
                            <div class="model-box">
                                <div class="box-wrapper">
                                    <h3 class="box-header">
                                        <span id="close1"  class="close close-update"><i class="fas fa-times"></i></span>
                                    </h3>
                                    <div class="box-body mb-2">
                                        <form method="POST" >
                                            <h4 style="text-transform: uppercase;">User Updated</h4>
                                            <div class="form-group row">
                                                <label for="Nickname" class="col-sm-12 col-md-2 col-form-label">Nickname:<i class="text-danger">*</i></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Nickname" type="text" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Email" class="col-sm-12 col-md-2 col-form-label">Email:</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Email" type="email" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Sex" class="col-sm-12 col-md-2 col-form-label">Sex:</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Sex" type="text" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Username" class="col-sm-12 col-md-2 col-form-label">Username:<i class="text-danger">*</i></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Username" type="text" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Password" class="col-sm-12 col-md-2 col-form-label">Password:</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Password" type="text" value="" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="Sex" class="col-sm-12 col-md-2 col-form-label">Sex:</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" name="Sex" type="text" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center ">
                                                <input type="submit" name="btn_submit" value="Cập nhật" class="form-control btn_submit" style="width: 30%; background-color: #1b00ff; color: white;">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <ul class="list-group">
                            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Nickname</strong></span>{{Cookie::get('nickname')}}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span>{{Cookie::get('email')}}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Sex</strong></span>{{Cookie::get('sex')}}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>DateCreated</strong></span>{{Carbon\Carbon::parse(Cookie::get('date'))->diffForHumans()}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="table_user py-5">
                        <div class=" py-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @elseif (session('status')=='Updated')
                                <div class="alert alert-success">
                                    Cập nhật bài viết thành công !!!
                                </div>
                            @endif
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Tag</th>
                                        <th>Active</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $b)
                                    <tr id="row-{{$b->Id}}">
                                        <td>{{$b->Id}}</td>
                                        <td>{{$b->Title}}</td>
                                        <td>@php echo html_entity_decode($b->Content) @endphp</td>
                                        <td>{{$b->Tag->Name}}</td>
                                        <td>@php echo $b->Active==1 ? '<i class="fa fa-check-circle-o" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-ban" style="color: red" aria-hidden="true"></i>' @endphp</td>
                                        <td>@php $d=date_create($b->created_date); echo date_format($d, 'd/m/Y'); @endphp</td>
                                        <td>
                                            <div>
                                                <a href="javascript:;" class="update_" style="color: grey;" onclick="edit({{$b->Id}})">
                                                    <span class="material-icons-outlined">
                                                    build
                                                    </span>
                                                </a>
                                                <div class="modal-update">
                                                    <div class="model-box">
                                                        <div class="box-wrapper">
                                                            <h3 class="box-header">
                                                                <span id="close1"  class="close close-update"><i class="fas fa-times"></i></span>
                                                            </h3>
                                                            <div class="box-body mb-2">
                                                                <form method="post" action="{{route('updateBlogProfile', ['blogId'=>$b->Id])}}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group row" style="width: 90%;">
                                                                        <label for="title" class="col-sm-12 col-md-2 col-form-label" style=" padding: 0;padding-top:5px;">Tiêu đề:<i class="text-danger">*</i></label>
                                                                        <div class="col-sm-12 col-md-10">
                                                                            <input class="form-control" name="title" id="title-{{$b->Id}}" type="text" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="tag" class="col-sm-12 col-md-2 col-form-label">Chủ Đề:</label>
                                                                        <div class="col-sm-12 col-md-10">
                                                                            <select name="tag" id="tag-{{$b->Id}}" style="width: 100%;" class="form-control">
                                                                                @foreach ($tag as $t)
                                                                                <option value="{{$t->Id}}">{{$t->Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="post_content" class="col-sm-12 col-md-2 col-form-label">Nội dung:<i class="text-danger">*</i></label>
                                                                        <div class="col-sm-12 col-md-10">
                                                                            <textarea name="post_content" id="post_content_{{$b->Id}}" cols="10" rows="10" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-12 col-md-2 col-form-label" for="is_public">Public bài viết</label>
                                                                        <div class="col-sm-12 col-md-10 d-flex justify-content-start align-items-center">
                                                                            <input type="checkbox" id="is_public_{{$b->Id}}" name="is_public" value="1"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row justify-content-center ">
                                                                        <input type="submit" name="btn_submit" value="Cập nhật bài viết" class="form-control btn_submit" style="width: 30%; background-color: #1b00ff; color: white;">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="javascript:;" class="remove_"   style="color: grey;">
                                                    <span class="material-icons-outlined">
                                                    delete
                                                    </span>
                                                </a>
                                                <div class="modal-confirm">
                                                    <div class="model-box">
                                                        <div class="box-wrapper">
                                                            <h3 class="box-header">
                                                                <span id="close1"  class="close close-remove"><i class="fas fa-times"></i></span>
                                                            </h3>
                                                            <div class="box-body mb-2">
                                                                <p class="font-20" style="font-weight: 600;">Bạn có đồng ý xóa hay không?</p>
                                                            </div>
                                                            <div class="box-footer">
                                                                <div class="btn-wrapper">
                                                                    <!-- truyền id của mỗi blog dô đây -->
                                                                    <button type="button" class="acept-btn form-control" onclick="remove({{$b->Id}})">Đồng ý</button>
                                                                    <button type="button" class="close-btn form-control">Hủy bỏ</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$blog->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var a = document.querySelectorAll('.update_')
    var e = document.querySelectorAll('.modal-update')
    var c = document.querySelectorAll('.close-update')

    var b = document.querySelectorAll('.remove_')
    var d = document.querySelectorAll('.modal-confirm')
    var f = document.querySelectorAll('.close-remove')
    var g = document.querySelectorAll('.close-btn')

    for(let i = 0 ; i <a.length ; i++){

        $(a[i]).on('click' , function(){
            $(e[i]).fadeIn()
        })
        $(c[i]).on('click' , function(){
            $(e[i]).fadeOut()
        })
        $(b[i]).on('click' , function(){
            $(d[i]).fadeIn()
        })
        $(f[i]).on('click' , function(){
            $(d[i]).fadeOut()
        })
        $(g[i]).on('click' , function(){
            $(d[i]).fadeOut()
        })
    }
</script>

<script>
    function edit(id) {
        var a = @json($blog).data;
        console.log(a);
        a.forEach(element => {
            if(element.Id==id) {
                $(`#title-${id}`).val(element.Title);
                $(`#tag-${id}`).val(element.TagId);
                if(element.Active==1) {
                    $(`#is_public_${id}`).prop('checked', true);
                }
                else {
                    $(`#is_public_${id}`).prop('checked', false);
                }
                ClassicEditor
                .create( document.querySelector('#post_content_'+element.Id), {
                    ckfinder: {
                        uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    },
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'ckfinder', 'imageUpload', 'blockQuote', 'insertTable', '|',  'undo', 'redo' ]
                } )
                .then( editor => {
                    console.log( editor );
                    editor.setData(element.Content);
                } )
                .catch( error => {
                    console.error( error );
                } );
            }
        });
    }
</script>

<script>
function remove(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/blog/delete/'+id,
        data: {
            "id": id,
            "_token": "{{ csrf_token() }}",
        },
        success: function(data) {
            $(`#row-${id}`).css('display', 'none');
            $('.alert-dismissible').css('display', '');
            $('.alert-dismissible').fadeTo(2000, 500).slideUp(500, function() {
                $(".alert-dismissible").slideUp(500);
            });
            console.log(data);
        },
    });
}
</script>

<style>
.modal-confirm,.modal-update{
    z-index: 100;
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    padding-top: 150px;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}
.model-box{
    margin: auto;
    background-color: #fff;
    position: relative;
    padding: 15px;
    outline: 0;
    width: 600px;
    border-radius: 20px;
}
.box-footer{
    text-align: right;
}
.btn-wrapper{
    display: inline-block;
}
.btn-wrapper button{
    width: auto;
    display: inline;
}
.acept-btn{
	background-color: #4972dc;
	color: white;
}
</style>

@endsection

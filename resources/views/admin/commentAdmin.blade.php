@extends('admin.layoutAdmin')
@section('contentAdmin')

<style>
.modal-confirm,.modal-confirm-update{
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
.ck-editor__editable {
    min-height: 300px;
    max-height: 300px;
}
</style>

<div class="alert alert-success alert-dismissible fade show position-fixed" style="left:1100px; top:80px; z-index: 2;display: none;" role="alert">
    Xóa thành công!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Basic Tables</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
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
            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Basic Table</h4>
                        <p>Add class <code>.table</code></p>
                    </div>
                    <div class="pull-right">
                        <form action="" class="d-flex">
                            <input type="text" id="searchinput" placeholder="Nhập từ khóa" class="form-control" onkeyup="search()">
                        </form>
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
                @elseif (session('status')=='CommentSuccess')
                <div class="alert alert-success">
                    Bình luận thành công !!!
                </div>
                @elseif (session('status')=='Updated')
                <div class="alert alert-success">
                    Cập nhật bình luận thành công !!!
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Content</th>
                            <th scope="col">Blog</th>
                            <th scope="col">User</th>
                            <th scope="col">Created Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="all">
                        @foreach ($comment as $c)
                        <tr id="row-{{$c->Id}}">
                            <td scope="row">{{$c->Id}}</td>
                            <td>@php echo html_entity_decode($c->Content) @endphp</td>
                            <td>{{$c->Blog->Title}}</td>
                            <td>{{$c->User->nickname}}</td>
                            <td>{{$c->Created_date}}</td>
                            <td>
                                <a href="javascript:;" type="button" class="fix" onclick="edit({{$c->Id}})">
                                    <span class="material-icons-outlined">
                                    build
                                    </span>
                                </a>
                                <div class="modal-confirm-update">
                                    <div class="model-box">
                                        <div class="box-wrapper">
                                            <h3 class="box-header">
                                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <form method='post' action='{{route('commentUpdateAdone', ['commentId'=>$c->Id])}}'>
                                                {{ csrf_field() }}
                                            <div class="box-body mb-2">
                                                <div class="form-group">
                                                    <label for="user2" class="font-20" style="font-weight: 600;">Người Đăng:</label>
                                                    <input type="text" value="Admin" id="user2-{{$c->Id}}" disabled class="form-control">
                                                </div>
                                                    <div class="form-group">
                                                    <label for="tag-select2" class="font-20" style="font-weight: 600;">Chủ đề:</label>
                                                        <select name="tag" id="tag-select2-{{$c->Id}}" class="form-control">
                                                            @foreach ($blog as $b)
                                                            <option value="{{$b->Id}}">{{$b->Title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="post_content" class="font-20" style="font-weight: 600;">Nội dung:<i class="text-danger">*</i></label>
                                                    <textarea class="form-control" id="post_content_{{$c->Id}}" name="post_content" placeholder="Nhập Nội Dung"></textarea>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <div class="btn-wrapper">
                                                    <!-- truyền id của mỗi blog dô đây -->
                                                    <button type="submit" class="acept-btn form-control">Đồng ý</button>
                                                    <button type="submit" class="close-btne form-control">Hủy bỏ</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:;" class="garbage">
                                    <span class="material-icons-outlined">
                                    delete
                                    </span>
                                </a>
                                <div class="modal-confirm">
                                    <div class="model-box">
                                        <div class="box-wrapper">
                                            <h3 class="box-header">
                                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <div class="box-body mb-2">
                                                <p class="font-20" style="font-weight: 600;">Bạn có đồng ý xóa hay không?</p>
                                            </div>
                                            <div class="box-footer">
                                                <div class="btn-wrapper">
                                                    <!-- truyền id của mỗi blog dô đây -->
                                                    <button type="button" class="acept-btn form-control" onclick="remove({{$c->Id}})">Đồng ý</button>
                                                    <button type="button" class="close-btn form-control">Hủy bỏ</button>
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
                <div class="pull-right">
                    {{$comment->links()}}
                </div>
                <input type="button" class="btn btn-primary mt-2 garbage" value="ADD COMMENT" />
                <div class="modal-confirm">
                    <div class="model-box">
                        <form method="post" action="{{route('commentInsertAdone')}}">
                            {{ csrf_field() }}
                        <div class="box-wrapper">
                            <h3 class="box-header">
                                <!-- truyền id của mỗi blog dô đây -->
                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                            </h3>
                            <div class="box-body mb-2">
                                <div class="form-group">
                                    <label for="user2" class="font-20" style="font-weight: 600;">Người Đăng</label>
                                    <input type="text" value="Admin" id="user2" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="blog" class="font-20" style="font-weight: 600;">Chủ đề:</label>
                                    <select name="blog" id="tag-select" class="form-control">
                                        @foreach ($blog as $b)
                                        <option value="{{$b->Id}}">{{$b->Title}}</option></option>
                                        @endforeach
                                    </select>
                                    <label for="content" class="font-20" style="font-weight: 600;">Nội dung:<i class="text-danger">*</i></label>
                                    <textarea placeholder="Nhập Bình Luận" name="content" id="content" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="btn-wrapper">
                                    <button type="submit" class="acept-btn form-control">Đồng ý</button>
                                    <button type="button" class="close-btn form-control">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>

<script>
    function search() {
        var input, tbody, tr;
        input = document.getElementById('searchinput').value.toUpperCase();
        tbody = document.getElementById('all');
        tr = tbody.getElementsByTagName('tr');
        for (i=0; i < tr.length; i++)
        {
            a = tr[i].getElementsByTagName('td')[1];
            b = tr[i].getElementsByTagName('td')[2];
            value = a.textContent || a.innerText;
            value1 = b.textContent || b.innerText;

            if(value1.toUpperCase().indexOf(input) > -1)
            {
                tr[i].style.display = "";
            }
            else if (value.toUpperCase().indexOf(input) > -1)
            {
                tr[i].style.display = "";
            }
            else
            {
                tr[i].style.display = "none";
            }
        }
    }

    function remove(id) {
        $.ajax({
            type: 'GET',
            url: '/admin/comment/delete/'+id,
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

<script>
    var a = document.querySelectorAll('.garbage')
    var b = document.querySelectorAll('.modal-confirm')
    var c = document.querySelectorAll('.modal-confirm .close')
    var d = document.querySelectorAll('.modal-confirm .close-btn')
    var e = document.querySelectorAll('.modal-confirm-update')
    var f = document.querySelectorAll('.fix')
    var g = document.querySelectorAll('.modal-confirm-update .close-btn')
    var x = document.querySelectorAll('.modal-confirm-update .close')

    for(let i = 0 ; i <a.length ; i++){

        $(a[i]).on('click' , function(){
            $(b[i]).fadeIn()
        })
        $(c[i]).on('click' , function(){
            $(b[i]).fadeOut()
        })
        $(d[i]).on('click' , function(){
            $(b[i]).fadeOut()
        })
        $(f[i]).on('click' , function(){
            $(e[i]).fadeIn()
        })
        $(g[i]).on('click' , function(){
            $(e[i]).fadeOut()
        })
        $(x[i]).on('click' , function(){
            $(e[i]).fadeOut()
        })
    }
</script>

<script>
    function edit(id) {
        var a = @json($comment).data;
        a.forEach(element => {
            if(element.Id==id) {
                $(`#tag-select2-${id}`).val(element.BlogId);
                $(`#user2-${id}`).val(element.user.nickname);
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
    ClassicEditor
        .create( document.querySelector( '#content' ), {
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

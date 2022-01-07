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
                @elseif (session('status')=='Success')
                    <div class="alert alert-success">
                        Thêm tiêu đề thành công !!!
                    </div>
                @elseif (session('status')=='Updated')
                <div class="alert alert-success">
                    Cập nhật tiêu đề thành công !!!
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="all">
                        @foreach ($tag as $t)
                        <tr id="row-{{$t->Id}}">
                            <td scope="row">{{$t->Id}}</td>
                            <td>{{$t->Name}}</td>
                            <td>{{$t->Created_date}}</td>
                            <td>
                                <a href="javascript:;" type="button" class="fix" onclick="edit({{$t->Id}})">
                                    <span class="material-icons-outlined">
                                    build
                                    </span>
                                </a>
                                <div class="modal-confirm-update">
                                    <div class="model-box">
                                        <form method="post" action="{{route('tagUpdateAdone', ['tagId'=>$t->Id])}}">
                                            {{ csrf_field() }}
                                        <div class="box-wrapper">
                                            <h3 class="box-header">
                                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <div class="box-body mb-2">
                                                <label for="tag-input1" class="font-20" style="font-weight: 600;">Tên Tag</label>
                                                <input type="text" class="form-control" id="tag-input1-{{$t->Id}}" name="tag" placeholder="Nhập Tag Muốn Thêm">														</div>
                                            <div class="box-footer">
                                                <div class="btn-wrapper">
                                                    <!-- truyền id của mỗi blog dô đây -->
                                                    <button type="submit" class="acept-btn form-control">Đồng ý</button>
                                                    <button type="button" class="close-btn form-control">Hủy bỏ</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
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
                                                <!-- truyền id của mỗi blog dô đây -->
                                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <div class="box-body mb-2">
                                                <p class="font-20" style="font-weight: 600;">Bạn có đồng ý xóa hay không?</p>
                                            </div>
                                            <div class="box-footer">
                                                <div class="btn-wrapper">
                                                    <button type="submit" class="acept-btn form-control" onclick="remove({{$t->Id}})">Đồng ý</button>
                                                    <button type="submit" class="close-btn form-control">Hủy bỏ</button>
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
                    {{$tag->links()}}
                </div>
                <input type="button" class="btn btn-primary mt-2 garbage" value="ADD TAG" />
                <div class="modal-confirm">
                    <div class="model-box">
                        <form method="post" action="{{route('tagInsertAdone')}}">
                            {{ csrf_field() }}
                        <div class="box-wrapper">
                            <h3 class="box-header">
                                <!-- truyền id của mỗi blog dô đây -->
                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                            </h3>
                            <div class="box-body mb-2">
                                <label for="tag-input" class="font-20" style="font-weight: 600;">Tên Tag</label>
                                <input type="text" class="form-control" id="tag-input" name="tag" placeholder="Nhập Tag Muốn Thêm">
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
            value = a.textContent || a.innerText;


            if(value.toUpperCase().indexOf(input) > -1)
            {
                tr[i].style.display = "";
            }
            else
            {
                tr[i].style.display = "none";
            }
        }
    }

    function edit(id) {
        var tag = @json($tag).data;
        tag.forEach(element => {
            if(element.Id==id) {
                $('#tag-input1-'+id).val(element.Name);
                console.log(element);
            }
        });
    }

    function remove(id) {
        $.ajax({
            type: 'GET',
            url: '/admin/tag/delete/'+id,
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
    var h = document.querySelectorAll('.modal-confirm .acept-btn')

    console.log(f)
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
        $(h[i]).on('click' , function(){
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

@endsection

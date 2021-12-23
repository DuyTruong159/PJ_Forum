@extends('admin.layoutAdmin')
@section('contentAdmin')

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
                @if (session('status')=='Success')
                <div class="alert alert-success">
                    Thêm bài viết thành công !!!
                </div>
                @elseif (session('status')=='Updated')
                <div class="alert alert-success">
                    Cập nhật bài viết thành công !!!
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Active</th>
                            <th scope="col">Tag</th>
                            <th scope="col">User</th>
                            <th scope="col">Manager</th>
                        </tr>
                    </thead>
                    <tbody id="all">
                        @foreach ($blog as $b)
                        <tr>
                            <td scope="row">{{$b->Id}}</td>
                            <td>{{$b->Title}}</td>
                            <td>{{$b->Content}}</td>
                            <td>@php echo $b->Active==1 ? '<i class="fa fa-check-circle-o" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-ban" style="color: red" aria-hidden="true"></i>' @endphp</td>
                            <td>{{$b->Tag->Name}}</td>
                            <td></td>
                            <td>
                                <a href="{{route('blogUpdateA', ['blogId'=>$b->Id])}}" type="button">
                                    <span class="material-icons-outlined">
                                    build
                                    </span>
                                </a>
                                <a href="javascript:;" class="garbage">
                                    <span class="material-icons-outlined">
                                    delete
                                    </span>
                                </a>
                                <div class="modal-confirm">
                                    <div class="model-box">
                                        <div class="box-wrapper">
                                            <h3 class="box-header">
                                                <span id="close1"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <div class="box-body mb-2">
                                                <p class="font-20" style="font-weight: 600;">Bạn có đồng ý xóa hay không?</p>
                                            </div>
                                            <div class="box-footer">
                                                <div class="btn-wrapper">
                                                    <!-- truyền id của mỗi blog dô đây -->
                                                    <button type="submit" class="acept-btn form-control">Đồng ý</button>
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
                    {{$blog->links()}}
                </div>
                <a href="/admin/blog-post" class="btn btn-primary">ADD BLOG</a>
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
</script>

<script>
    var a = document.querySelectorAll('.garbage')
    var b = document.querySelectorAll('.modal-confirm')
    var c = document.querySelectorAll('.close')
    var d = document.querySelectorAll('.close-btn')

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
    }
</script>

@endsection

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
    padding-top: 120px;
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

<div class="main-container" style="width: 2000px">
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
                            <input type="text" placeholder="Nhập từ khóa" id="searchinput" class="form-control" onkeyup="search()">
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
                @elseif (session('status')=='Unsuccess')
                <div class="alert alert-danger">
                    <ul>
                        <li>Password không trùng khớp!!</li>
                    </ul>
                </div>
                @elseif (session('status')=='Success')
                <div class="alert alert-success">
                    <ul>
                        <li>Thêm user thành công!!</li>
                    </ul>
                </div>
                @elseif (session('status')=='Updated')
                <div class="alert alert-success">
                    <ul>
                        <li>Cập nhật user thành công!!</li>
                    </ul>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="all">
                        @foreach ($user as $u)
                        <tr id="row-{{$u->Id}}">
                            <td scope="row">{{$u->Id}}</td>
                            <td>{{$u->nickname}}</td>
                            <td>{{$u->username}}</td>
                            <td>{{$u->password}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <img src="/{{$u->avatar}}" width="100px" height="auto">
                            </td>
                            <td>{{$u->sex}}</td>
                            <td>{{$u->role}}</td>
                            <td>
                                @if (Cookie::get('id')==$u->Id)

                                @elseif(Cookie::get('role')=='Staff' && $u->role=='User' || Cookie::get('role')=='Admin')
                                <a href="javascript:;" type="button" class="fix" onclick="edit({{$u->Id}})">
                                    <span class="material-icons-outlined">
                                    build
                                    </span>
                                </a>
                                <div class="modal-confirm-update">
                                    <div class="model-box">
                                        <form method="post" action="{{route('userUpdateAdone', ['userId'=>$u->Id])}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <div class="box-wrapper">
                                            <h3 class="box-header">
                                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                                            </h3>
                                            <div class="box-body mb-2">
                                                <div class="form-group">
                                                    <label for="nickname" class="font-20" style="font-weight: 600;">Nickname :<i class="text-danger">*</i></label>
                                                    <input type="text" name="nickname" id="nickname-{{$u->Id}}" class="form-control" placeholder="Nickname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="font-20" style="font-weight: 600;">Email :<i class="text-danger">*</i></label>
                                                    <input type="email" name="email" id="email-{{$u->Id}}" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="avatar" class="font-20" style="font-weight: 600;">Avatar :</label>
                                                    <input type="file" name="avatar" id="avatar-{{$u->Id}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sex" class="font-20" style="font-weight: 600;">Sex</label>
                                                    <select name="sex" id="sex-{{$u->Id}}" class="form-control">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="font-20" style="font-weight: 600;">Username :<i class="text-danger">*</i></label>
                                                    <input type="text" name="username" id="username-{{$u->Id}}" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="font-20" style="font-weight: 600;">Password :<i class="text-danger">*</i></label>
                                                    <input type="text" name="password" id="password-{{$u->Id}}" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="role" class="font-20" style="font-weight: 600;">Role</label>
                                                    <select name="role" id="role-{{$u->Id}}" class="form-control">
                                                        <option value="User">User</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>

                                            </div>
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
                                                    <button type="button" class="acept-btn form-control" onclick="remove({{$u->Id}})">Đồng ý</button>
                                                    <button type="button" class="close-btn form-control">Hủy bỏ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{$user->links()}}
                </div>
                @if (Cookie::get('role')!='Staff')
                <input type="button" class="btn btn-primary mt-2 garbage" value="ADD USER" />
                <div class="modal-confirm">
                    <div class="model-box">
                        <form action="{{route('userInsertAdone')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="box-wrapper">
                            <h3 class="box-header">
                                <!-- truyền id của mỗi blog dô đây -->
                                <span id="close2"  class="close"><i class="fas fa-times"></i></span>
                            </h3>
                            <div class="box-body mb-2">
                                <div class="form-group">
                                    <label for="nickname" class="font-20" style="font-weight: 600;">Nickname :<i class="text-danger">*</i></label>
                                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-20" style="font-weight: 600;">Email :<i class="text-danger">*</i></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="avatar" class="font-20" style="font-weight: 600;">Avatar :</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sex" class="font-20" style="font-weight: 600;">Sex</label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-20" style="font-weight: 600;">Username :<i class="text-danger">*</i></label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="font-20" style="font-weight: 600;">Password :<i class="text-danger">*</i></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="confirm" class="font-20" style="font-weight: 600;">Confirm Password :<i class="text-danger">*</i></label>
                                    <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <label for="role" class="font-20" style="font-weight: 600;">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="User">User</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Admin">Admin</option>
                                    </select>
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
                @endif
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>

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
    function search() {
        var input, tbody, tr;
        input = document.getElementById('searchinput').value.toUpperCase();
        tbody = document.getElementById('all');
        tr = tbody.getElementsByTagName('tr');
        for (i=0; i < tr.length; i++)
        {
            a = tr[i].getElementsByTagName('td')[2];
            value = a.textContent || a.innerText;

            if (value.toUpperCase().indexOf(input) > -1)
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
            url: '/admin/user/delete/'+id,
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
    function edit(id) {
        var a = @json($user).data;
        a.forEach(element => {
            if(element.Id==id) {
                $(`#nickname-${id}`).val(element.nickname);
                $(`#email-${id}`).val(element.email);
                $(`#sex-${id}`).val(element.sex);
                $(`#role-${id}`).val(element.role);
                $(`#username-${id}`).val(element.username);
                $(`#password-${id}`).val(element.password_confirm);
                $(`#role-${id}`).val(element.role);

                console.log(element);
            }
        });
    }
</script>

@endsection

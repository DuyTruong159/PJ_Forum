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
                        <tr>
                            <td scope="row">{{$c->Id}}</td>
                            <td>@php echo html_entity_decode($c->Content) @endphp</td>
                            <td>{{$c->Blog->Title}}</td>
                            <td></td>
                            <td>{{$c->Created_date}}</td>
                            <td>
                                <a href="add" type="button">
                                    <span class="material-icons-outlined">
                                    build
                                    </span>
                                </a>
                                <a href="delete">
                                    <span class="material-icons-outlined">
                                    delete
                                    </span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{$comment->links()}}
                </div>
                <a href="add-blog" class="btn btn-primary">ADD BLOG</a>
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
</script>

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORUM</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <link href="/assert/css/style.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="/ckfinder/ckfinder.js"></script>

    <script src="/assert/js/function.js"></script>
</head>
<body class="grey lighten-4">

    <header class="header-top" id="header-top">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo-wrapper">
                    <a href="/"><span>Chao mung</span></a>
                </div>
                <div class="loginarea">
                    <form class="form-login" action="index.php" method="GET">
                        <label for="username">Login:</label>
                        <div class="">
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="save-password">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember</label>
                        </div>
                        <div class="">
                            <button type="submit" name="submit" role="button" class="btn-login form-control">
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-4">
                    <div class="row">
                        <div class="col-md-5">
                        <a href="">
                            <img src="../images/logo.jpg" alt="">
                        </a>
                        </div>
                        <div class="col-md-7">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="/">Trang chủ</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('blogPost')}}">Post</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tiêu đề
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="dropdown-inner">
                                                <div class="dropdown-content row">
                                                    @foreach ($tagHeader as $t)
                                                    <div class="col-md-3">
                                                        <a href="">{{$t->Name}}</a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/contact">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/register">Register</a>
                                    </li>
                                </ul>
                                </div>
                            </nav>
                            <div class="under-navbar">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="welcome_banner py-3 row">
                        <div class="col-md-9">
                            <div class="header_ mb-3">
                                <span class="material-icons-outlined">
                                forum
                                </span>
                                <span>Chào mừng bạn đến với ITVNN FORUM - Diễn đàn công nghệ thông tin.</span>
                            </div>
                            <div class="body_">
                                <div class="body_inner">
                                    Nếu đây là lần đầu tiên bạn tham gia diễn đàn, xin mời bạn xem phần <a href="/">Hỏi/Ðáp</a> để biết cách dùng diễn đàn. Để có thể tham gia thảo luận bạn phải đăng ký làm thành viên, <a href="">click vào đây để đăng ký.</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form class="form_search">
                                <div class="d-inline-flex header_ pb-3">
                                    <span class="material-icons-outlined ">
                                    desktop_windows
                                    </span>
                                    <span>Search Forums</span>
                                </div>
                                <div class="search_field">
                                    <input type="text" name="search" id="search">
                                    <button type="submit">
                                        <span class="material-icons-outlined">
                                          search
                                        </span>
                                    </button>
                                </div>
                                <a href="/search.php" class="d-block text-right">Kiếm Chi Tiết</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="">
        <div class="container">
            <div class="footer_content">
                <div class="header_">
                    <a href="">Liên Lạc</a>
                    <a href="/forum/contact.php">Góp ý</a>
                </div>
                <div class="">
                    <span>Múi giờ GMT. Hiện tại là 01:04 PM. Powered by vBulletin® Version 4.2.5
                    Copyright © 2021 vBulletin Solutions, Inc. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    <div class="to_top">
        <button onclick="topFunction()">
            <span class="material-icons-outlined">
            arrow_upward
            </span>
        </button>
    </div>

</body>
</html>

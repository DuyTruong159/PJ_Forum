@extends('layout')
@section('content')

<div class="register_">
    <div class="container">
        <form action="{{route('registerdone')}}" method="post" class="form-register" enctype="multipart/form-data">
            <div class="header_">
                <span>Register</span>
            </div>
            <div class="title_">
                <span>Thông tin bắt buộc</span>
            </div>
            {{ csrf_field() }}
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
            @endif
            <div class="body_">
                <div class="form-group d-inline-flex">
                    <label class="label_" for="nickname">Biệt Danh:<i class="text-danger">*</i></label>
                    <input type="text" name="nickname" id="nickname" class="form-control" value="{{old('nickname')}}">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="email">Email:<i class="text-danger">*</i></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="sex">Sex:</label>
                    <select name="sex" id="sex" class="select_sex" onchange="">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group d-inline-flex">
                    <label for="username">Username:<i class="text-danger">*</i></label>
                    <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="avatar">Avatar:</label>
                    <input type="file" name="avatar" id="avatar" class="" value="{{old('avatar')}}">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="password">Password:<i class="text-danger">*</i></label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Confirm Password:<i class="text-danger">*</i></label>
                    <input type="password" name="confirm" id="confirm" class="form-control">
                </div>
            </div>
            <div class="form-group btn_">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

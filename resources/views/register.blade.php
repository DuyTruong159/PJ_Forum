@extends('layout')
@section('content')

<div class="register_">
    <div class="container">
        <form action="" method="get" class="form-register">
            <div class="header_">
                <span>Register</span>
            </div>
            <div class="title_">
                <span>Thông tin bắt buộc</span>
            </div>
            <div class="body_">
                <div class="form-group d-inline-flex">
                    <label class="label_" for="">Biệt Danh:</label>
                    <input type="text" name="nickname" id="nickname" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Username:</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Confirm Password:</label>
                    <input type="password" name="confirm" id="confirm" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Avatar:</label>
                    <input type="file" name="avatar" id="avatar" class="">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group d-inline-flex">
                    <label for="">Sex:</label>
                    <select name="sex" id="sex" class="select_sex" onchange="">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Other</option>
                    </select>
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

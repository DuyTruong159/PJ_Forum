@extends('layout')
@section('content')

<div class="body_contact py-3">
    <div class="container">
        <div class="section_info mb-3">
            <div class="ele_">
                <span class="material-icons-outlined">
                location_on
                </span>
                <h5>OUR MAIN OFFICE</h5>
                <p>SoHo 94 Broadway St New York, NY 1001</p>
            </div>
            <div class="ele_">
                <span class="material-icons-outlined">
                phone
                </span>
                <h5>OUR MAIN OFFICE</h5>
                <p>SoHo 94 Broadway St New York, NY 1001</p>
            </div>
            <div class="ele_">
                <span class="material-icons-outlined">
                location_on
                </span>
                <h5>OUR MAIN OFFICE</h5>
                <p>SoHo 94 Broadway St New York, NY 1001</p>
            </div>
            <div class="ele_">
                <span class="material-icons-outlined">
                email
                </span>
                <h5>OUR MAIN OFFICE</h5>
                <p>SoHo 94 Broadway St New York, NY 1001</p>
            </div>
        </div>
        <div class="section_email row py-5">
            <div class="col-md-6">
                <h3 class="">Hãy để lại ý kiến cho chúng tôi</h3>
                <p>Etiam sit amet convallis erat – class aptent taciti sociosqu ad litora torquent per conubia! Maecenas gravida lacus.
                    Lorem etiam sit amet convallis erat.</p>
                <ul class="list_icon">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <form action="{{route('contactmail')}}" method="post" class="form-contact">
                    {{ csrf_field() }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            Gửi Mail thành công
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="mb-2">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message" class="mb-2">Message</label>
                        <textarea type="text" name="message" id="message" placeholder="Enter your message" style="height: 200px" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="form-control btn_submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

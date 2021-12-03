@extends('layout')
@section('content')

<div class="post_detail">
    <div class="container py-3 mb-3">
        <div class="page_number">
            <div class="">
                <span>Kết quả từ 1 tới 10 trên 23</span>
            </div>
            <div class="page_">
                <span class="number_"><a href="/" class="selected">1</a></span>
                <span class="number_"><a href="/">2</a></span>
                <span class="number_"><a href="/">3</a></span>
                <span class="number_ symbol_">
                    <a href="/">
                        <span class="material-icons-outlined">
                        chevron_right
                        </span>
                    </a>
                    </span>
                <span class="number_ symbol_">
                    <a href="/">
                        <span class="material-icons-outlined">
                        last_page
                        </span>
                    </a>
                </span>
            </div>

        </div>
        <div class="title_post">
            <span>Đề tài:<a href="javascript:;">{{$blog->Tag->Name}}</a></span>
        </div>
        <div class="created_post">
            <span class="material-icons-outlined">
            article
            </span>
            <span>@php $d=date_create($blog->Created_date); echo date_format($d, 'd/m/Y H:i:s'); @endphp</span>
        </div>
        <div class="ele_cmt">
            <div class="main_post">
                <div class="info_user">
                    <div class="header_">
                        <div class="username">
                            <h3>mt_binh</h3>
                        </div>
                        <div class="ava_">
                            <div class="">
                                <img src="https://itvnn.net/customavatars/avatar99_25.gif" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="body_">
                        <div class="nick_name">
                            <span>Sát thủ vô tình</span>
                        </div>
                        <div class="body_inner">
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Họ Tên</span>
                                </div>
                                <div class="right_body">
                                    <span>Mai Thanh Bình</span>
                                </div>
                            </div>

                            <div class="form_group">
                                <div class="left_body">
                                    <span>Tham gia ngày</span>
                                </div>
                                <div class="right_body">
                                    <span>Sep 2009</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Tuổi</span>
                                </div>
                                <div class="right_body">
                                    <span>99</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>giới tính </span>
                                </div>
                                <div class="right_body">
                                    <span>A</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Họ Tên</span>
                                </div>
                                <div class="right_body">
                                    <span>Mai Thanh Bình</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Họ Tên</span>
                                </div>
                                <div class="right_body">
                                    <span>Mai Thanh Bình</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Họ Tên</span>
                                </div>
                                <div class="right_body">
                                    <span>Mai Thanh Bình</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content_post">
                    <div class="header_">
                        <span class="material-icons-outlined">
                        description
                        </span>
                        <span class="title_">{{$blog->Title}}</span>
                        <!-- <span>
                            <a href="">
                                <span class="material-icons-outlined">
                                thumb_up
                                </span>Thích
                            </a>
                            <a href="">Chia sẻ</a>
                        </span> -->
                    </div>
                    <div class="body_">
                        <p>@php echo html_entity_decode($blog->Content) @endphp</p>
                    </div>
                </div>
            </div>
            <div class="src_reply">
                <div class="src_reply_wrapper">
                    <span class="material-icons-outlined mr-2">
                    textsms
                    </span>
                    <span class="src_cmt">Phúc Đáp</span>
                </div>
            </div>
            <div class="content_cmt">
                <div class="">
                    <form method="post" action="">
                        <textarea rows="5" name="cmt" class="form-control" placeholder="Viết câu trả lời của bạn..."  ></textarea>
                        <div class="form-group p-2">
                            <button type="submit" class="btn btn-primary" >Send</button>
                            <button type="button" class="btn_cancel btn btn-primary" >Huy bỏ</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="list_cmt">
            <div class="heading_">
                <div class="heading_wrapper">
                    <span class="">Tất cả bình luận:</span>
                </div>
            </div>
            <div class="ele_cmt">
                <div class="created_post">
                    <span class="material-icons-outlined">
                    article
                    </span>
                    <span>14-09-2009, 04:10 PM</span>
                </div>
                <div class="main_post">
                    <div class="info_user">
                        <div class="header_">
                            <div class="username">
                                <h3>mt_binh</h3>
                            </div>
                            <div class="ava_">
                                <div class="">
                                    <img src="https://itvnn.net/customavatars/avatar99_25.gif" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="body_">
                            <div class="nick_name">
                                <span>Sát thủ vô tình</span>
                            </div>
                            <div class="body_inner">
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tham gia ngày</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Sep 2009</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tuổi</span>
                                    </div>
                                    <div class="right_body">
                                        <span>99</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>giới tính </span>
                                    </div>
                                    <div class="right_body">
                                        <span>A</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_post">
                        <div class="header_">
                            <span class="material-icons-outlined">
                            description
                            </span>
                            <span class="title_">Ra mắt chức năng Phạt thẻ đối với thành viên vi phạm</span>
                            <!-- <span>
                                <a href="">
                                    <span class="material-icons-outlined">
                                    thumb_up
                                    </span>Thích
                                </a>
                                <a href="">Chia sẻ</a>
                            </span> -->
                        </div>
                        <div class="body_">
                            <p>Để đảm bảo tính công bằng, cũng như xử phạt vi phạm diễn đàn được dễ dàng. Nay diễn đàn ra mắt chức phạt thẻ đối với những lỗi vi phạm.
                    Khi phạt thẻ diễn đàn sẽ tự PM cho thành viên lý do và link bài viết vi phạm, khi đủ Points sẽ tự động Ban nick như sau:
                    P/s: Các điều khoản trên có thể còn thiếu, các bạn nào thấy thiếu thì cho ý kiến.</p>
                        </div>
                    </div>

                </div>
                <div class="src_reply">
                    <div class="src_reply_wrapper">
                        <span class="material-icons-outlined mr-2">
                        textsms
                        </span>
                        <span class="src_cmt">Phúc Đáp</span>
                    </div>
                </div>
                <div class="content_cmt">
                    <div class="">
                        <form method="post" action="">
                            <textarea rows="5" name="cmt" class="form-control" placeholder="Viết câu trả lời của bạn..."  ></textarea>
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-primary" >Send</button>
                                <button type="button" class="btn_cancel btn btn-primary" >Huy bỏ</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="ele_cmt">
                <div class="created_post">
                    <span class="material-icons-outlined">
                    article
                    </span>
                    <span>14-09-2009, 04:10 PM</span>
                </div>
                <div class="main_post">
                    <div class="info_user">
                        <div class="header_">
                            <div class="username">
                                <h3>mt_binh</h3>
                            </div>
                            <div class="ava_">
                                <div class="">
                                    <img src="https://itvnn.net/customavatars/avatar99_25.gif" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="body_">
                            <div class="nick_name">
                                <span>Sát thủ vô tình</span>
                            </div>
                            <div class="body_inner">
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tham gia ngày</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Sep 2009</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tuổi</span>
                                    </div>
                                    <div class="right_body">
                                        <span>99</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>giới tính </span>
                                    </div>
                                    <div class="right_body">
                                        <span>A</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_post">
                        <div class="header_">
                            <span class="material-icons-outlined">
                            description
                            </span>
                            <span class="title_">Ra mắt chức năng Phạt thẻ đối với thành viên vi phạm</span>
                            <!-- <span>
                                <a href="">
                                    <span class="material-icons-outlined">
                                    thumb_up
                                    </span>Thích
                                </a>
                                <a href="">Chia sẻ</a>
                            </span> -->
                        </div>
                        <div class="body_">
                            <p>Để đảm bảo tính công bằng, cũng như xử phạt vi phạm diễn đàn được dễ dàng. Nay diễn đàn ra mắt chức phạt thẻ đối với những lỗi vi phạm.
                    Khi phạt thẻ diễn đàn sẽ tự PM cho thành viên lý do và link bài viết vi phạm, khi đủ Points sẽ tự động Ban nick như sau:
                    P/s: Các điều khoản trên có thể còn thiếu, các bạn nào thấy thiếu thì cho ý kiến.</p>
                        </div>
                    </div>

                </div>
                <div class="src_reply">
                    <div class="src_reply_wrapper">
                        <span class="material-icons-outlined mr-2">
                        textsms
                        </span>
                        <span class="src_cmt">Phúc Đáp</span>
                    </div>
                </div>
                <div class="content_cmt">
                    <div class="">
                        <form method="post" action="">
                            <textarea rows="5" name="cmt" class="form-control" placeholder="Viết câu trả lời của bạn..."  ></textarea>
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-primary" >Send</button>
                                <button type="button" class="btn_cancel btn btn-primary" >Huy bỏ</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="ele_cmt">
                <div class="created_post">
                    <span class="material-icons-outlined">
                    article
                    </span>
                    <span>14-09-2009, 04:10 PM</span>
                </div>
                <div class="main_post">
                    <div class="info_user">
                        <div class="header_">
                            <div class="username">
                                <h3>mt_binh</h3>
                            </div>
                            <div class="ava_">
                                <div class="">
                                    <img src="https://itvnn.net/customavatars/avatar99_25.gif" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="body_">
                            <div class="nick_name">
                                <span>Sát thủ vô tình</span>
                            </div>
                            <div class="body_inner">
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tham gia ngày</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Sep 2009</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tuổi</span>
                                    </div>
                                    <div class="right_body">
                                        <span>99</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>giới tính </span>
                                    </div>
                                    <div class="right_body">
                                        <span>A</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>Mai Thanh Bình</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_post">
                        <div class="header_">
                            <span class="material-icons-outlined">
                            description
                            </span>
                            <span class="title_">Ra mắt chức năng Phạt thẻ đối với thành viên vi phạm</span>
                            <!-- <span>
                                <a href="">
                                    <span class="material-icons-outlined">
                                    thumb_up
                                    </span>Thích
                                </a>
                                <a href="">Chia sẻ</a>
                            </span> -->
                        </div>
                        <div class="body_">
                            <p>Để đảm bảo tính công bằng, cũng như xử phạt vi phạm diễn đàn được dễ dàng. Nay diễn đàn ra mắt chức phạt thẻ đối với những lỗi vi phạm.
                    Khi phạt thẻ diễn đàn sẽ tự PM cho thành viên lý do và link bài viết vi phạm, khi đủ Points sẽ tự động Ban nick như sau:
                    P/s: Các điều khoản trên có thể còn thiếu, các bạn nào thấy thiếu thì cho ý kiến.</p>
                        </div>
                    </div>

                </div>
                <div class="src_reply">
                    <div class="src_reply_wrapper">
                        <span class="material-icons-outlined mr-2">
                        textsms
                        </span>
                        <span class="src_cmt">Phúc Đáp</span>
                    </div>
                </div>
                <div class="content_cmt">
                    <div class="">
                        <form method="post" action="">
                            <textarea rows="5" name="cmt" class="form-control" placeholder="Viết câu trả lời của bạn..."  ></textarea>
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-primary" >Send</button>
                                <button type="button" class="btn_cancel btn btn-primary">Huy bỏ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

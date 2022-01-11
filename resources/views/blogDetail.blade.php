@extends('layout')
@section('content')

@if (session('status')=='CommentSuccess')
<div class="alert alert-success alert-dismissible fade show position-fixed" style="left:1150px; top:30px;" role="alert">
    Bình luận thành công!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif ($errors->any())
<div class="alert alert-warning alert-dismissible fade show position-fixed" style="left:1100px; top:30px;" role="alert">
    Bình luận không thành công!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                            <h3>{{$blog->User->username}}</h3>
                        </div>
                        <div class="ava_">
                            <div class="">
                                <img src="/{{$blog->User->avatar}}" width="200" height="150" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="body_">
                        <div class="nick_name">
                            <span>{{$blog->User->nickname}}</span>
                        </div>
                        <div class="body_inner">
                            <div class="form_group">
                                <div class="left_body">
                                    <span>Họ Tên</span>
                                </div>
                                <div class="right_body">
                                    <span>{{$blog->User->nickname}}</span>
                                </div>
                            </div>

                            <div class="form_group">
                                <div class="left_body">
                                    <span>Tham gia ngày</span>
                                </div>
                                <div class="right_body">
                                    <span>@php $d=date_create($blog->User->created_date); echo date_format($d, 'd/m/Y'); @endphp</span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="left_body">
                                    <span>giới tính </span>
                                </div>
                                <div class="right_body">
                                    <span>{{$blog->User->sex}}</span>
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
                    <form method="post" action="{{route('commentsuccess', ['blogId'=>$blog->Id])}}">
                        {{ csrf_field() }}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <textarea rows="5" name="cmt" id="post_content" class="form-control" placeholder="Viết câu trả lời của bạn..."  ></textarea>
                        <div class="form-group p-2">
                            <button type="submit" class="btn btn-primary" >Send</button>
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
            @foreach ($blog->Comment->sortByDesc('Created_date') as $c)
            @if ($c->BlogId==$blog->Id)
            <div class="ele_cmt">
                <div class="created_post">
                    <span class="material-icons-outlined">
                    article
                    </span>
                    <span>@php $d=date_create($c->Created_date); echo date_format($d, 'd/m/Y H:i:s'); @endphp</span>
                </div>
                <div class="main_post">
                    <div class="info_user">
                        <div class="header_">
                            <div class="username">
                                <h3>{{$c->User->username}}</h3>
                            </div>
                            <div class="ava_">
                                <div class="">
                                    <img src="/{{$c->User->avatar}}" width="200" height="150" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="body_">
                            <div class="nick_name">
                                <span>{{$c->User->nickname}}</span>
                            </div>
                            <div class="body_inner">
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Họ Tên</span>
                                    </div>
                                    <div class="right_body">
                                        <span>{{$c->User->username}}</span>
                                    </div>
                                </div>

                                <div class="form_group">
                                    <div class="left_body">
                                        <span>Tham gia ngày</span>
                                    </div>
                                    <div class="right_body">
                                        <span>@php $d=date_create($c->User->created_date); echo date_format($d, 'd/m/Y'); @endphp</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <div class="left_body">
                                        <span>giới tính </span>
                                    </div>
                                    <div class="right_body">
                                        <span>{{$c->User->sex}}</span>
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
                            <p>@php echo html_entity_decode($c->Content) @endphp</p>
                        </div>
                    </div>

                </div>

            </div>
            @endif
            @endforeach

        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#post_content' ), {
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

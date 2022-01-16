@extends('layout')
@section('content')

<div class="main_content p-2">
    <div class="container p-3">
        <div class="content_header">
            <div class="chuyenmuc">
                <div class="d-inline-flex">
                    <a href="/index.php"><span class="material-icons-outlined">
                    home
                    </span></a>
                    <span>Chuyên mục</span>
                </div>
                <div class="">

                </div>
            </div>
        </div>
        <div class="static_field tag_field">
            <div class="header_">
                <div class="header_inner">
                    <span>Advanced Forum Statistics
                    </span>
                    <span class="material-icons-outlined">
                    expand_less
                    </span>
                </div>
            </div>
            <div class="body_ ">
                <div class="left border_db p-2">
                    <div class="filter_">
                        <ul>
                            @foreach ($blogcount as $index => $b)
                            <li class="item_">
                                <div class="">
                                    <span class="stt">{{$index+1}}</span>
                                    @foreach ($user as $u)
                                    @if ($u->Id==$b->UserId)
                                    <span>{{$u->nickname}}</span>
                                    @endif
                                    @endforeach

                                </div>
                                <div class="filter_result">
                                    {{$b->countBlog}}
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="right border_db  p-1">
                    <div class="filter_post">
                        <!-- Tab content -->
                        <div id="London" class="tabcontent" style="display: block;">
                            <div class="filter_">
                                <ul class="">
                                    @foreach ($blog as $b)
                                    <li class="">
                                        <div class="">
                                            <img src="https://itvnn.net/images/styles/ShinyBlue/statusicon/post_new.gif" style="padding-right: 5px;" alt="">
                                            <span class="name_post"><a href="{{route('blogDetail', ['blogId'=>$b->Id])}}">{{$b->Title}}</a></span>
                                        </div>
                                        <div class="filter_result">
                                            <span><a href="javascript:;">{{Carbon\Carbon::parse($b->Created_date)->diffForHumans()}}</a></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($tag as $t)
        <div class="tag_field">
            <div class="header_">
                <div class="header_inner">
                    <span>Advanced Forum Statistics
                    </span>
                    <span class="material-icons-outlined">
                    expand_less
                    </span>
                </div>
            </div>
            <div class="body_">
                <div class="header_body">
                    <div class="space"></div>
                    <div class="">
                        <span>{{$t->Name}}</span>
                    </div>
                    <div></div>
                    <div class="">
                        <span>Bài mới gửi</span>
                    </div>
                </div>
                <div class="content_body">
                    <ul>
                        @foreach ($t->Blog as $b)
                        @if($b->Active==1)
                        <li>
                            <div class="icon_">
                                <img src="https://itvnn.net/images/styles/ShinyBlue/statusicon/forum_new-48.png" alt="">
                            </div>
                            <div class="infor_">
                                <div class="info_inner">
                                    <div class="src_list_post">
                                        <a href="{{route('blogDetail', ['blogId'=>$b->Id])}}">{{$b->Title}}</a>
                                        <span class="viewing_">(6 viewing)</span>
                                    </div>
                                    <div class="description_">
                                        <span>Tin tức về CNTT ở Việt Nam và thế giới.</span>
                                    </div>
                                </div>
                                <div class="count_ text-right">
                                    <div class="count_title">
                                        Đề tài: 1,599
                                    </div>
                                    <div class="count_post">
                                        Bài Gửi: 1,599
                                    </div>
                                </div>
                            </div>
                            <div></div>
                            <div class="latest_post">
                                <div class="name_">
                                    <img src="https://itvnn.net/images/icons/icon.gif" alt="">
                                    <a href="" class="" >AMD hợp tác MediaTek...</a>
                                </div>
                                <div class="author_">
                                    <span>by zokoko</span>
                                </div>
                                <div class="created_date">
                                    <span>19-11-2021, 05:34 PM</span>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        <li>
                            <div class="icon_">
                                <img src="https://itvnn.net/images/styles/ShinyBlue/statusicon/forum_new-48.png" alt="">
                            </div>
                            <div class="infor_">
                                <div class="info_inner">
                                    <div class="src_list_post">
                                        <a href="/">Tintuc CNTT</a>
                                        <span class="viewing_">(6 viewing)</span>
                                    </div>
                                    <div class="description_">
                                        <span>Tin tức về CNTT ở Việt Nam và thế giới.</span>
                                    </div>
                                </div>
                                <div class="count_ text-right">
                                    <div class="count_title">
                                        Đề tài: 1,599
                                    </div>
                                    <div class="count_post">
                                        Bài Gửi: 1,599
                                    </div>
                                </div>
                            </div>
                            <div></div>
                            <div class="latest_post">
                                <div class="name_">
                                    <img src="https://itvnn.net/images/icons/icon.gif" alt="">
                                    <a href="" class="" >AMD hợp tác MediaTek...</a>
                                </div>
                                <div class="author_">
                                    <span>by zokoko</span>
                                </div>
                                <div class="created_date">
                                    <span>19-11-2021, 05:34 PM</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

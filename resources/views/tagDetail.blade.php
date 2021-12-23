@extends('layout')
@section('content')

<div class="search">
    <div class="container py-3 mb-3">
        <div class="">
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
                        <span>Chủ Đề</span>
                    </div>
                    <div></div>
                    <div class="">
                        <span>Bài mới gửi</span>
                    </div>
                </div>
                <div class="content_body">
                    <ul>
                        @foreach ($blog as $b)
                        @if ($b->Active==1)
                        <li class="item_">
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
                    </ul>

                </div>
            </div>
            {{$blog->links()}}
        </div>
        </div>
    </div>
</div>

@endsection

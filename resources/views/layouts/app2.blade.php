<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="dark [--scroll-mt:9.875rem] lg:[--scroll-mt:6.3125rem]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('style')
    <style>
        #latest_insight_container {
            /*height: 449px;*/
            /*overflow-y: scroll;*/
        }
.noti_link_href{
    cursor: pointer;
}
        .insight_link {
            color: rgb(13 110 253 / 60%);
        }

        #noti_blink {
            display: none;
        }
        #search_results{
            display: none;
            background: #00000080;
            position: absolute;
            margin-left: 158px;
            margin-top: 20px;
            height: 260%;
            width: 35%;
            border-radius:10px 6px 6px 10px;

            padding: 15px;
            overflow-y: scroll;
            border: 1px solid gray;
        }

        .scroll {
            width: 200px;
            height: 200px;
            background: red;

        }
        .scroll::-webkit-scrollbar {
            width: 12px;
        }

        .scroll::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgb(229, 18, 18);
            border-radius: 10px;
        }

        .scroll::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(248, 2, 2, 0.99);
        }
        .search_result_link a{
            color:#E91E63!important;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md " style="z-index: 99;margin-top: 13px;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="position: relative; ">

                <img src="{{asset('img/people.png')}}" id="logo_header" alt="logo" height="36">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <div class='container-search'>
                        <input type="text" id="searchInput" class="search-input" placeholder="Search..">
                        <div id='submitsearch' style="">
                            <span class="text-white">Search</span>
                        </div>
                    </div>
                    <div id="search_results" class="scroll">

                               <div id="append_search_result_here">

                               </div>

                    </div>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto makecliable">
                    {{--      <li class="nav-item notification_none">
                                      <div>
                                          <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                              <path
                                                  fill="#78777B" d="M10 21H14C14 22.1 13.1 23
                                       12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9
                                        10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12
                                         6S7 8.2 7 11V18H17V11Z"
                                              />
                                          </svg>

                                          <div class="spinner-grow text-danger notification_have" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                          </div>
                                      </div>


                          </li>--}}

                    <li class="nav-item dropdown text-white">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path
                                    fill="#FFF" d="M10 21H14C14 22.1 13.1 23
                                 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9
                                  10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12
                                   6S7 8.2 7 11V18H17V11Z"
                                />
                            </svg>
                            {{--If notification then blink red--}}
                            <div class="spinner-grow text-danger notification_have" id="noti_blink" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </a>

                        <div id="navNotfication" class="dropdown-menu dropdown-menu-end"
                             aria-labelledby="navbarDropdown">

                            {{--  <a class="dropdown-item text-white" href="#">
                                  list notification
                              </a>--}}

                        </div>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white "
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown text-white">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main id="main_"
          class="absolute inset-0 bottom-10 bg-bottom bg-no-repeat bg-slate-50 dark:bg-[#0B1120] index_beams__3fKa4">
        <div
            class="absolute inset-0 bg-grid-slate-900/[0.04] bg-[bottom_1px_center] dark:bg-grid-slate-400/[0.05] dark:bg-bottom dark:border-b dark:border-slate-100/5"
            style="mask-image:linear-gradient(to bottom, transparent, black);-webkit-mask-image:linear-gradient(to bottom, transparent, black)">
        </div>

        <div class="position-relative" style="top: 50%;-ms-transform: translateY(-50%);
  transform: translateY(-50%); ">
            @if (Auth::guest())
                @yield('content')

            @else

                <div class="makecliable">

                    <div class="row">
                        <div class="col-2">
                            @extends('layouts.verticle')
                        </div>
                        <div class="col-8 ">
                            @yield('content')
                        </div>
                        {{--                        left is actually right--}}
                        {{--
                         before was like this problem was that
                                 left (which is right\) bar was misalinging
                                           <div class="col-2 vertical-nav-left" >--}}
                        <div class="col-2 scrollbar_insight">
                            <ul class="left_ul navbar-nav ms-auto ">

                                @if(strpos (Illuminate\Support\Facades\URL::current(),'discussion'))
                                    @if(Illuminate\Support\Facades\URL::current() =="http://127.0.0.1:8000/add_discussion_index")
                                        <li class="nav-item p-2 text-white">
                                            Latest Insights

                                        </li>
                                        <hr/>
                                        @include('latest_insights')
                                    @endif

                                @else
                                    <li class="nav-item p-2 text-white">
                                        Latest Insights
                                    </li>
                                    <hr/>
                                    @include('latest_insights')
                                @endif


                            </ul>
                            <br>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{--        <style>--}}
        {{--            .site-footer--}}
        {{--            {--}}
        {{--                background-color:#26272b;--}}
        {{--                padding:45px 0 20px;--}}
        {{--                font-size:15px;--}}
        {{--                line-height:24px;--}}
        {{--                color:#737373;--}}
        {{--            }--}}
        {{--            .site-footer hr--}}
        {{--            {--}}
        {{--                border-top-color:#bbb;--}}
        {{--                opacity:0.5--}}
        {{--            }--}}
        {{--            .site-footer hr.small--}}
        {{--            {--}}
        {{--                margin:20px 0--}}
        {{--            }--}}
        {{--            .site-footer h6--}}
        {{--            {--}}
        {{--                color:#fff;--}}
        {{--                font-size:16px;--}}
        {{--                text-transform:uppercase;--}}
        {{--                margin-top:5px;--}}
        {{--                letter-spacing:2px--}}
        {{--            }--}}
        {{--            .site-footer a--}}
        {{--            {--}}
        {{--                color:#737373;--}}
        {{--            }--}}
        {{--            .site-footer a:hover--}}
        {{--            {--}}
        {{--                color:#3366cc;--}}
        {{--                text-decoration:none;--}}
        {{--            }--}}
        {{--            .footer-links--}}
        {{--            {--}}
        {{--                padding-left:0;--}}
        {{--                list-style:none--}}
        {{--            }--}}
        {{--            .footer-links li--}}
        {{--            {--}}
        {{--                display:block--}}
        {{--            }--}}
        {{--            .footer-links a--}}
        {{--            {--}}
        {{--                color:#737373--}}
        {{--            }--}}
        {{--            .footer-links a:active,.footer-links a:focus,.footer-links a:hover--}}
        {{--            {--}}
        {{--                color:#3366cc;--}}
        {{--                text-decoration:none;--}}
        {{--            }--}}
        {{--            .footer-links.inline li--}}
        {{--            {--}}
        {{--                display:inline-block--}}
        {{--            }--}}
        {{--            .site-footer .social-icons--}}
        {{--            {--}}
        {{--                text-align:right--}}
        {{--            }--}}
        {{--            .site-footer .social-icons a--}}
        {{--            {--}}
        {{--                width:40px;--}}
        {{--                height:40px;--}}
        {{--                line-height:40px;--}}
        {{--                margin-left:6px;--}}
        {{--                margin-right:0;--}}
        {{--                border-radius:100%;--}}
        {{--                background-color:#33353d--}}
        {{--            }--}}
        {{--            .copyright-text--}}
        {{--            {--}}
        {{--                margin:0--}}
        {{--            }--}}
        {{--            @media (max-width:991px)--}}
        {{--            {--}}
        {{--                .site-footer [class^=col-]--}}
        {{--                {--}}
        {{--                    margin-bottom:30px--}}
        {{--                }--}}
        {{--            }--}}
        {{--            @media (max-width:767px)--}}
        {{--            {--}}
        {{--                .site-footer--}}
        {{--                {--}}
        {{--                    padding-bottom:0--}}
        {{--                }--}}
        {{--                .site-footer .copyright-text,.site-footer .social-icons--}}
        {{--                {--}}
        {{--                    text-align:center--}}
        {{--                }--}}
        {{--            }--}}
        {{--            .social-icons--}}
        {{--            {--}}
        {{--                padding-left:0;--}}
        {{--                margin-bottom:0;--}}
        {{--                list-style:none--}}
        {{--            }--}}
        {{--            .social-icons li--}}
        {{--            {--}}
        {{--                display:inline-block;--}}
        {{--                margin-bottom:4px--}}
        {{--            }--}}
        {{--            .social-icons li.title--}}
        {{--            {--}}
        {{--                margin-right:15px;--}}
        {{--                text-transform:uppercase;--}}
        {{--                color:#96a2b2;--}}
        {{--                font-weight:700;--}}
        {{--                font-size:13px--}}
        {{--            }--}}
        {{--            .social-icons a{--}}
        {{--                background-color:#eceeef;--}}
        {{--                color:#818a91;--}}
        {{--                font-size:16px;--}}
        {{--                display:inline-block;--}}
        {{--                line-height:44px;--}}
        {{--                width:44px;--}}
        {{--                height:44px;--}}
        {{--                text-align:center;--}}
        {{--                margin-right:8px;--}}
        {{--                border-radius:100%;--}}
        {{--                -webkit-transition:all .2s linear;--}}
        {{--                -o-transition:all .2s linear;--}}
        {{--                transition:all .2s linear--}}
        {{--            }--}}
        {{--            .social-icons a:active,.social-icons a:focus,.social-icons a:hover--}}
        {{--            {--}}
        {{--                color:#fff;--}}
        {{--                background-color:#29aafe--}}
        {{--            }--}}
        {{--            .social-icons.size-sm a--}}
        {{--            {--}}
        {{--                line-height:34px;--}}
        {{--                height:34px;--}}
        {{--                width:34px;--}}
        {{--                font-size:14px--}}
        {{--            }--}}
        {{--            .social-icons a.facebook:hover--}}
        {{--            {--}}
        {{--                background-color:#3b5998--}}
        {{--            }--}}
        {{--            .social-icons a.twitter:hover--}}
        {{--            {--}}
        {{--                background-color:#00aced--}}
        {{--            }--}}
        {{--            .social-icons a.linkedin:hover--}}
        {{--            {--}}
        {{--                background-color:#007bb6--}}
        {{--            }--}}
        {{--            .social-icons a.dribbble:hover--}}
        {{--            {--}}
        {{--                background-color:#ea4c89--}}
        {{--            }--}}
        {{--            @media (max-width:767px)--}}
        {{--            {--}}
        {{--                .social-icons li.title--}}
        {{--                {--}}
        {{--                    display:block;--}}
        {{--                    margin-right:0;--}}
        {{--                    font-weight:600--}}
        {{--                }--}}
        {{--            }--}}
        {{--        </style>--}}
        {{--        <!-- Site footer -->--}}
        {{--        <footer class="site-footer">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-sm-12 col-md-6">--}}
        {{--                        <h6>About</h6>--}}
        {{--                        <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>--}}
        {{--                    </div>--}}

        {{--                    <div class="col-xs-6 col-md-3">--}}
        {{--                        <h6>Categories</h6>--}}
        {{--                        <ul class="footer-links">--}}
        {{--                            <li><a href="http://scanfcode.com/category/c-language/">C</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/category/android/">Android</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}

        {{--                    <div class="col-xs-6 col-md-3">--}}
        {{--                        <h6>Quick Links</h6>--}}
        {{--                        <ul class="footer-links">--}}
        {{--                            <li><a href="http://scanfcode.com/about/">About Us</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>--}}
        {{--                            <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <hr>--}}
        {{--            </div>--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-md-8 col-sm-6 col-xs-12">--}}
        {{--                        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by--}}
        {{--                            <a href="#">Scanfcode</a>.--}}
        {{--                        </p>--}}
        {{--                    </div>--}}

        {{--                    <div class="col-md-4 col-sm-6 col-xs-12">--}}
        {{--                        <ul class="social-icons">--}}
        {{--                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>--}}
        {{--                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>--}}
        {{--                            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>--}}
        {{--                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </footer>--}}
    </main>
</div>

<footer class="footer-bottom" style="position: absolute;bottom: 0;width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 text-sm-left text-center">
                <span class="copy-right-text">© 2022 <a href="#">Peoples Forum</a> All Rights Reserved.</span>
            </div>
            <div class="col-md-6 col-sm-6">
                <ul class="terms-privacy d-flex justify-content-sm-end justify-content-center">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- footer-bottom end -->

@yield('script')

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('load_notification')}}",
            method: 'POST',
            data: {},
            success: function (data) {

                console.log(data['notfication_list'].length);
                if (data['notfication_list'].length < 1) {
                    $("#navNotfication").append('' +
                        '' +
                        '   <a class="dropdown-item black" href="#">' +
                        'No New Notification' +
                        '</a>')
                } else {
                    for (let i = 0; i < data['notfication_list'].length; i++) {
                        $("#noti_blink").show();

                        let noti_text = data['notfication_list'][i].split('|')

                        $("#navNotfication").append('' +
                            '' +
                            '   <span class="dropdown-item black noti_link_href" data-href_="' + noti_text[1] + '" data-from_user="' + noti_text[2] + '">' +
                            noti_text[0] +
                            '</span>')
                    }
                }

            }
        });

        $(document).on('click', '.noti_link_href', function (event) {

            let noti_link_href = $(this).data("href_");
            let from_user = $(this).data("from_user");
            // alert(from_user);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('make_noti_read')}}",
                method: 'POST',
                data: {
                    noti_link_href: noti_link_href,
                    from_user: from_user

                },
                success: function (data) {
                    window.location.replace('{{url('/discussion/')}}' + '/' + noti_link_href);
                }
            });
        });
        $("#searchInput").keyup(function(){
            console.log();
            let search_text = $("#searchInput").val()
            if(search_text == '' || search_text== ' '){
                $("#search_results").hide();
                $("#append_search_result_here").html(' ');

            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('search_search')}}",
                    method: 'POST',
                    data: {
                        search_text: search_text

                    },
                    success: function (data) {
                        $("#search_results").show();
                        $("#append_search_result_here").html('' +
                            '<li>'+data+'</li>' +
                            '' )
                    }
                });
            }

        });
    });
</script>

</body>
</html>

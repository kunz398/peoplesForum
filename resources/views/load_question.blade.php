<style>

    .card-body p {
        font-size: 13px
    }

    a {
        color: #E91E63;
        text-decoration: none !important;
        background-color: transparent
    }

    .media img {
        width: 40px;
        height: auto
    }

    .post_content {
        max-width: 550px;
        word-wrap: break-word;
    }

    .custom-bg-blue {
        background-color: #5797cf;
    }

    .blur {
        filter: blur(3px);

    }

    .vote_section {
        position: relative;
        top: -31px;

    }

    .vote_btns {
        cursor: pointer !important;
    }

    .link_to_main_post_page {
        display: block;
        text-align: center;
        cursor: pointer !important;
        margin-top: -67px;
        margin-left: 134px;

        position: relative;
        z-index: 1;
    }

    .link_to_main_post_page:hover {
        text-decoration: underline #000000 !important;
        cursor: pointer;
    }


</style>
@csrf
<div id="vote_alert" class="alert alert-warning text-center p" role="alert" style="display: none">
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
    <strong>Note!</strong> You have already Voted <span id="whatVote"></span>
</div>
@foreach($data as $pp)

    <div class="row mb-5 mt-2" style="border-bottom: 2px solid gray;" >
        <div class="col-md-12">

            <div class="card-footer">

                <div class="media flex-wrap w-100 align-items-center"><img
                        src="{{\App\Http\Controllers\HomeController::get_user_img($pp->posted_by_user_id) }}"
                        class="d-block ui-w-40 rounded-circle" alt="">

                    <div class="vote_section">

                        <svg class="vote_btns float-end" data-vote_type="+" data-voteid="{{$pp->id}}"
                             style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="gray"
                                  d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z"/>
                        </svg>
                        <br/>
                        <p class="float-end text-white" style="margin-right: -16px;"
                           id="vote_num_{{$pp->id}}">{{$pp->vote_num}}</p>
                        <br/>
                        <div>

                            <svg class="vote_btns float-end" data-vote_type="-" data-voteid="{{$pp->id}}"
                                 style="width:24px;height:24px; position: relative; z-index: 1;" viewBox="0 0 24 24">
                                <path fill="gray"
                                      d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/>
                            </svg>
                        </div>

                    </div>

                    <div class="media-body ml-3" style="top: -37px;position: relative;"><a  href="/profile/{{$pp->posted_by_user_id}}"
                                                                                           data-abc="true">{{\App\Http\Controllers\HomeController::get_username($pp->posted_by_user_id) }}</a>
                        <div
                            class="text-muted small">  {{\App\Http\Controllers\HomeController::time_elapsed_string($pp->created_at) }}</div>
                    </div>

                    @if($pp->is_safe ==1)
                        <a  href="{{ url('discussion/' . $pp->id) }}" class="text-center font-monospace text-white link_to_main_post_page  h4"
                           style="text-transform: capitalize;width: 60%;">
                            {{ \Illuminate\Support\Str::words($pp->title, 8, $end = '...') }}
                        </a>
                    @else
                        <a href="{{ url('discussion/' . $pp->id) }}" class="text-center font-monospace text-white link_to_main_post_page blur h4"
                           id="blured_title_{{$pp->id}}" style="text-transform: capitalize;width: 60%;">
                            {{ \Illuminate\Support\Str::words($pp->title, 8, $end = '...') }}
                        </a>
                        <center>
                            <button class="btn btn-outline-warning text-center showcontentblur" id="{{$pp->id}}">Show
                                Content

                                   <span class="blink mdi mdi-alert-outline mdi-24px "></span>

                            </button>
                        </center>

                    @endif


                </div>

            </div>
            {{--     CARD BODY--}}
          {{--  <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3 w-100">
                <div class="px-4 pt-3"> <span
                        class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i
                            class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span
                            class="align-middle">
                            @if(\Illuminate\Support\Str::length($pp->content) < 20)
                                @if($pp->is_safe ==1)
                                    <p class="post_content">  {!! \App\Http\Controllers\HomeController::add_more_words($pp->content) !!}</p>
                                @else
                                    <p class="post_content blur"
                                       id="blured_content_{{$pp->id}}">>  {!! \App\Http\Controllers\HomeController::add_more_words($pp->content) !!}</p>
                                @endif

                            @else
                                @if($pp->is_safe ==1)
                                    <p class="post_content">  {{ \Illuminate\Support\Str::words($pp->content, 20, $end = '...') }}</p>
                                @else
                                    <p class="post_content blur"
                                       id="blured_content_{{$pp->id}}">  {{ \Illuminate\Support\Str::words($pp->content, 20, $end = '...') }}</p>
                                @endif

                            @endif

                        </span> </span></div>--}}
                {{--              CARD BODY END--}}

                {{--CARD FOOTER--}}

                <div class="px-4 pt-3 ">
                    <svg style="width:24px;height:24px; pointer-events: none; float: right" viewBox="0 0 24 24">
                        <path fill="gray"
                              d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7C5,5.89 5.9,5 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.9 12.75,23 12.5,23V23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15Z"
                        />
                    </svg>
                    <span class="text-white float-end">{!! \App\Http\Controllers\HomeController::get_comment_count($pp->id)!!}</span>
                </div>
                <div style="width: 200px;">
                    {!! \App\Http\Controllers\HomeController::split_tags($pp->tags) !!}
                </div>
                {{--                CARD FOOTER END--}}
{{--            </div>--}}
        </div>
    </div>

@endforeach

    <div class="d-flex justify-content-center">

      {!! $data->links() !!}
    </div>


<script type="text/javascript">
    setInterval(function() {
        $('.blink').animate({ opacity: 1 }, 400).animate({ opacity: 0 }, 600);
    }, 800);
</script>
<script>
    $(document).ready(function () {

        $('.showcontentblur').on('click', function () {
            let id = $(this).attr('id');
            //remove css
            $("#blured_title_" + id).removeClass("blur");
            $("#blured_content_" + id).removeClass("blur");
            $("#" + id).css('display', 'none');
        });
        //    vote section
        $('.vote_btns').on('click', function () {
            let data_id = $(this).data("voteid");
            let vote_type = $(this).data("vote_type");
// alert(vote_type);
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('fetch.vote_up') }}",
                method: "POST",
                data: {
                    _token: _token,
                    vote_type: vote_type,
                    data_id: data_id
                },
                success: function (data) {
                    if (data == "+" || data == "-") {
                        spantext = "";
                        if (data == "+") {
                            spantext = "up";
                        } else {
                            spantext = "down";
                        }
                        $("#whatVote").html(spantext)
                        $("#vote_alert").fadeIn('slow');
                        $('#vote_alert').delay(3000).fadeOut('slow');
                    } else {
                        $('#vote_num_' + data_id).html(data);
                    }
                }
            });
        });
        //LINKS


    });
</script>

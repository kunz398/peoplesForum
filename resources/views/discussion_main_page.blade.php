@extends('layouts.app2')
@section('content')
@section('style')

    <style>

        .vote_section {
            position: relative;

            top: 158px;
        }

        .vote_btns {
            cursor: pointer !important;
        }
        .ck-editor__editable {
            min-height: 300px;
        }

        .ck .ck-editor__main {
            height: 300px;
            overflow-y: scroll !important;
        }

        #spanIsInside span {
            color: #fff;
            background-color: #5797cf;
            border-color: #5797cf;
        }

        .asked_modified {
            color: hsl(210, 8%, 45%);
        }

        .ck.ck-editor__main > .ck-editor__editable {
            /*background: transparent !important;*/
            border-radius: 0 !important;
            border: unset;

        }

        #comment_text {
            width: 429px;
            resize: vertical;
            display: none;
        }

        #btn_add_comment {
            display: none;
            z-index: 1;
        }
        #search_results{     background: #00000080!important;}

        .search_result_link{
            color:#E91E63!important;
        }
    </style>
@endsection
<div class="container">
    @if (Auth::guest())
        Log in to add Discussionn
    @else
        @if($status==1)
            {{--    CODE HERE--}}
            @csrf
            <div id="vote_alert" class="alert alert-warning text-center p" role="alert" style="display: none">
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                <strong>Note!</strong> You have already Voted <span id="whatVote"></span>
            </div>
        <div class="row">
            <div class="col-6" >
                <div class="row">
                    <div class="col-12">
                        <h3 style="text-transform: capitalize;"
                            class="font-monospace text-white">{{$discussion_query[0]->title}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2" style="width: 20%;position: absolute;">
                        <div class="row">
                            <div class="col-6">
                                <img
                                    src="{{\App\Http\Controllers\HomeController::get_user_img($discussion_query[0]->posted_by_user_id) }}"
                                    class="rounded-circle" style="width: 25px" alt="">
                            </div>
                            <div class="col-6 ">
                                <a href="/profile/{{$discussion_query[0]->posted_by_user_id}}" class="text-white"
                                   style="margin-left: -110px;">{{\App\Http\Controllers\HomeController::get_username( $discussion_query[0]->posted_by_user_id) }}</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-10" style="margin-left: 181px;width: 309px;float: right;">


                        <small class="asked_modified text-white">Posted:</small>
                        <small class="text-white-50" style="padding-right: 30px;">
                            {{\App\Http\Controllers\HomeController::time_elapsed_string($discussion_query[0]->created_at) }}
                        </small>

                        <small class="asked_modified text-white"> Modified:</small>
                        <small class="text-white-50">
                            {{\App\Http\Controllers\HomeController::time_elapsed_string($discussion_query[0]->updated_at) }}
                        </small>
                    </div>
                </div>



                <div class="row">

                    <div class="col-12" style="margin-top: -36px;">
                        <div class="vote_section">

                            <svg class="vote_btns float-end" data-vote_type="+" data-voteid="{{$discussion_query[0]->id}}"
                                 style="width:24px;height:24px;position: relative;z-index: 99;" viewBox="0 0 24 24">
                                <path fill="gray"
                                      d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z"/>
                            </svg>
                            <br/>
                            <p class="float-end text-white" style="margin-right: -16px;"
                               id="vote_num_{{$discussion_query[0]->id}}">
                                @if($discussion_query[0]->vote_num >9)
                                    <small>
                                        {{$discussion_query[0]->vote_num}}
                                    </small>
                                @else
                                    {{$discussion_query[0]->vote_num}}
                                @endif



                            </p>
                            <br/>
                            <div>

                                <svg class="vote_btns float-end" data-vote_type="-" data-voteid="{{$discussion_query[0]->id}}"
                                     style="width:24px;height:24px; position: relative; z-index: 1;" viewBox="0 0 24 24">
                                    <path fill="gray"
                                          d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/>
                                </svg>
                            </div>

                        </div>
                        <div class="form-group">
                        <textarea class="form-control mt-2" id="editor" aria-describedby="editorhelp"
                                  name="editor">{{$discussion_query[0]->content}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="tag" class="text-white">Tag</label>
                            <div style="width: 200px;" id="spanIsInside">
                                {!! \App\Http\Controllers\HomeController::split_tags($discussion_query[0]->tags) !!}
                            </div>

                        </div>
                    </div>
                </div>
                @if($discussion_query[0]->posted_by_user_id == $logged_in_id)
                    <div class="container">

                        <div id="btn_within" class="float-end">
                            <button class="btn btn-warning" id="edit_page" data-post_id="{{$discussion_query[0]->id}}">Edit
                                Post
                            </button>
                            <button class="btn btn-danger" id="delete_page" data-post_id="{{$discussion_query[0]->id}}">
                                Delete Post
                            </button>
                        </div>

                    </div>
                @endif
                <a href="#" id="add_comment">Add Comment</a>

                <textarea name="" id="comment_text" class="mt-3"
                          placeholder="Use comments to ask for more information or suggest ideas.">

            </textarea>
                <button id="btn_add_comment" class="btn btn-custom-blue">Add Comment</button>
                <span id="btn_follow" class="link-info" style="cursor: pointer"></span>

            </div>
            <div class="col-6" style="position: relative;margin-left: 0;bottom: -97px;">
                <div id="load_comment_here">
                    @include('load_comments')
                </div>
            </div>
        </div>

            {{--    CODE HERE--}}


        @else
            account not activated, please fill in  all details to activate account
            <script type="text/javascript">
                $(document).ready(function () {
                    window.location.href = "/home";
                });
            </script>
        @endif
    @endif
</div>
<link href="{{ asset('css/validation.css') }}" rel="stylesheet">
<script src="{{ asset('js/validation.js') }}" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            loadFollowingOrNo();


            $('html, body').animate({scrollTop:$(document).height()});
            var myEditor;
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    licenseKey: '',
                    toolbar: [],

                })
                .then(editor => {
                    console.log('Editor was initialized', editor);
                    window.editor = editor;
                    editor.isReadOnly = true;
                })
                .catch(err => {
                    console.error(err.stack);
                });
            $(document).on('click', '#edit_page', function (event) {

                let edit_id = $(this).data("post_id");
                window.location.replace("{{ url('edit_discussion/' . $discussion_query[0]->id) }}");
            });
            $(document).on('click', '#delete_page', function (event) {

                Swal.fire({
                    title: 'Do you want to Delete this Post?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{route('delete_discussion_post')}}",
                            method: 'POST',
                            data: {
                                result: {{$discussion_query[0]->id}},
                            },
                            success: function (data) {
                                if (data == 1) {
                                    Swal.fire('Post Deleted!', '', 'success')
                                    setTimeout(
                                        function () {
                                            window.location.href = '/';
                                        }, 3000);

                                }
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire('Post not Deleted', '', 'info')
                    }
                })
            });

            $(document).on('click', '.page-link', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];

                fetch_data_comments(page);

            });
            function fetch_data_comments(page)
            {

                var _token = $("input[name=_token]").val();
                $.ajax({
                    url:"{{ route('pagination.fetch_comment') }}",
                    method:"POST",
                    data:{
                        _token:_token,
                        post_id: {{$discussion_query[0]->id}},
                        page:page
                    },
                    success:function(data)
                    {
                        $('#load_comment_here').html(data);
                    }
                });
            }
            $("#add_comment").click(function (e) {

                $("#comment_text").show();
                $("#btn_add_comment").show();
                $("#add_comment").hide();

            });


            $("#btn_add_comment").click(function (e) {
                let comment_txt = $("#comment_text").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('add_comment')}}",
                    method: 'POST',
                    data: {
                        'post_id':'{{$discussion_query[0]->id}}',
                        'comment_txt':comment_txt,
                        'posted_by':{{$discussion_query[0]->posted_by_user_id}}
                    },
                    success: function (data) {
                        if(data ==1){
                            $("#comment_text").val(" ");
                            $.ajax({
                                url:"{{ route('load_data_auto_comment') }}",
                                method:"GET",
                                data:{
                                    'posted_by':'{{$discussion_query[0]->posted_by_user_id}}',
                                    'post_id':'{{$discussion_query[0]->id}}'
                                },
                                success:function(data)
                                {
                                    $('#load_comment_here').html(data);
                                }
                            });

                        }

                    }
                });
            });

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


            $( "#btn_follow").click(function(e) {

            let follow_click_text = $(this).text()

            if(follow_click_text == "Following"){
                $(this).text('Follow Discussion')
                follow_click_text = 'Follow Discussion';
            }else{
                $(this).text('Following')
                follow_click_text = 'Following';
            }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('follow_a_page')}}",
                    method: 'POST',
                    data: {
                        follow_click_text:follow_click_text,
                        post_id:{{$discussion_query[0]->id}}
                    },
                    success: function (data) {
                        $(this).text(data)
                    }
                });
            });
            function loadFollowingOrNo(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('load_follow')}}",
                    method: 'POST',
                    data: {

                        post_id:{{$discussion_query[0]->id}}
                    },
                    success: function (data) {
                        $("#btn_follow").text(data)
                    }
                });
            }
        });


    </script>


@endsection

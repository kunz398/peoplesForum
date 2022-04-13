@extends('layouts.app2')
@section('content')
@section('style')
    <style>
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

    </style>
@endsection
<div class="container">
    @if (Auth::guest())
        Log in to add Discussionn
    @else
        @if($status==1)
            {{--    CODE HERE--}}

            <div class="row">
                <div class="col-12">
                    <h3 style="text-transform: capitalize;"
                        class="font-monospace text-white">{{$discussion_query[0]->title}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="row">
                        <div class="col-6">
                            <img
                                src="{{\App\Http\Controllers\HomeController::get_user_img($discussion_query[0]->posted_by_user_id) }}"
                                class="d-block ui-w-40 rounded-circle pb-2" style="width: 25px" alt="">
                        </div>
                        <div class="col-6" style="margin-left:-26px; display: block">
                            <a href="#" class="text-white"
                               style="margin-left: 0px; display: inline-block;width: 142px;margin-top: -33px;">{{\App\Http\Controllers\HomeController::get_username( $discussion_query[0]->posted_by_user_id) }}</a>
                        </div>
                    </div>


                </div>
                <div class="col-10" style="margin-left: 331px;width: 349px;float: right;">


                    <small class="asked_modified text-white">Posted:</small>
                    <small style="padding-right: 30px;" class="text-white-50">
                        {{\App\Http\Controllers\HomeController::time_elapsed_string($discussion_query[0]->created_at) }}
                    </small>

                    <small class="asked_modified text-white"> Modified:</small>
                    <small class="text-white-50">
                        {{\App\Http\Controllers\HomeController::time_elapsed_string($discussion_query[0]->updated_at) }}
                    </small>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
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
                        <br />
                        <small id="taghelp" class="form-text text-muted">Add up to 4 tags to describe what your discussion is about.</small>
                        <select class="js-example-basic-single form-control w-75" id="tag" name="tag" aria-describedby="taghelp"  multiple="multiple">
                            @foreach($tagslist as $tag)
                                <option value="{{$tag}}" selected>{{$tag}}</option>
                            @endforeach
                                @foreach($atags_list as $tag)
                                    <option value="{{$tag}}">{{$tag}}</option>
                                @endforeach


                        </select>

                        <br />
                        <small id="tagmsg" class="form-text"></small>
                    </div>

                </div>

            </div>
            @if($discussion_query[0]->posted_by_user_id == $logged_in_id)
                <button class="btn btn-custom-blue float-end" id="sub_discussino" style="margin-top: -36px;z-index: 99;
                 position: relative">Edit your discussion</button>
            @endif


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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<link href="{{ asset('css/validation.css') }}" rel="stylesheet">
<script src="{{ asset('js/validation.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('.js-example-basic-single').select2({
                maximumSelectionLength: 4,
                placeholder: 'Choose a tag',
                allowClear: true
            });

        });
     $(document).ready(function () {




            var myEditor;
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( 'Editor was initialized', editor );
                    myEditor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
            $(document).on('click', '#sub_discussino', function (event) {

                let title = $("#title").val();
                let tags = $("#tag").val();
                let editor = myEditor.getData();
                tags = tags. toString();
                let isvalid = []; // make an array
                isvalid.push(validationForm("title","titlemsg","required|"));
                isvalid.push(validationForm("tag","tagmsg","required|"));


                if (jQuery.inArray("false", isvalid) != -1) {
                    // if false is found in the array //do nothing
                    if(editor ==""){
                        $('.ck .ck-editor__main').css({"border": "1px solid #dc3545"});
                        $("#editormsg").html("Body is missing.");
                    }
                } else {
                    if(editor ==""){
                        $('.ck .ck-editor__main').css({"border": "1px solid #dc3545"});
                        $("#editormsg").html("Body is missing.");
                    }else{
                        let pageURL = $(location).attr("href");
                        var n = pageURL.lastIndexOf('/');
                        var result = pageURL.substring(n + 1);

                        $.ajaxSetup({

                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{route('edit_discussion_post')}}",
                            method: 'POST',
                            data:{
                                tags:tags,
                                result:result,
                                editor:editor
                            },
                            success: function(data){
                            if(data ==1){
                                window.location.href = "/discussion/"+result;
                            }
                            }
                        });
                    }
                }
            });
        });

    </script>

@endsection

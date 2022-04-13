@extends('layouts.app2')
@section('content')
@section('style')
    <style>
        .ck-editor__editable {
            min-height: 300px;
            /*overflow-y: scroll!important;*/

        }
        .ck .ck-editor__main{
            height: 300px;
            overflow-y: scroll!important;
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
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title" class="text-white">Title</label>
                        <br />
                        <small id="titlehelp" class="form-text text-muted">Be specific and imagine you’re discussing a topic with another person.</small>
                        <input type="text" class="form-control mb-2" id="title" aria-describedby="titlehelp" placeholder="Should the Government remove the 20c per liter charge on Fuels?">
                        <small id="titlemsg" class="form-text"></small>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="editor" class="text-white">Body</label>
                        <br />
                        <small id="editorhelp" class="form-text text-muted">Include all the information someone would need to have a meaningful discussion.</small>
                        <textarea class="form-control mt-2" id="editor" aria-describedby="editorhelp"  name="editor"></textarea>
                        <small id="editormsg" class="form-text inbalid-feedback"></small>
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
                            @foreach($tags_list as $tag)
                                <option value="{{$tag->tag}}">{{$tag->tag}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-custom-blue float-end" id="sub_discussino">Submit your discussion</button>
                        <br />
                        <small id="tagmsg" class="form-text"></small>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<link href="{{ asset('css/validation.css') }}" rel="stylesheet">
<script src="{{ asset('js/validation.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
@endsection

@section('script')

    <script>
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
                         $.ajaxSetup({

                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });
                         $.ajax({
                             url: "{{route('post_discussion')}}",
                             method: 'POST',
                             data:{
                                 title:title,
                                 tags:tags,
                                 editor:editor
                             },
                             success: function(data){
                                 window.location.replace('{{url('/discussion/')}}'+'/'+data);
                             }
                         });
                     }
                 }
                 });
        });


    </script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2({
                maximumSelectionLength: 4,
                placeholder: 'Choose a tag',
                allowClear: true
            });

        });
    </script>
@endsection

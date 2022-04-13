@extends('layouts.app2')
@section('content')
@section('style')
    <style>
        #add_dis_btn{
            margin-left: 23px;
        }
    </style>
@endsection
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @else
        {{-- {{ __('You are logged in!') }} </div> </div>--}}
        @if($status==0):
        <script type="text/javascript">
            $(document).ready(function () {
                window.location.href = "/home";
            });
        </script>
        @else
            <button class="btn btn-custom-blue" id="add_dis_btn">Add Discussion</button>
            <div class="float-end pb-3" >
                <div class="row" >
                    <div class="col-6">
                        <button id="btn_latest" class="btn-outline-dark">
                            Latest
                        </button>

                    </div>

                    <div class="col-6">
                        <button id="btn_top" class="btn-outline-dark">
                            Top
                        </button>
                    </div>
                </div>
            </div>

            <div class="container scrollbar" id="style-1">
                @csrf
                <div id="load_Questions_here">
                    @include('load_question')
                </div>
            </div>

        @endif
    @endif
</div>


@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.page-link', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                var _token = $("input[name=_token]").val();
                $.ajax({
                    url: "{{ route('pagination.fetch') }}",
                    method: "POST",
                    data: {_token: _token, page: page},
                    success: function (data) {
                        $('#load_Questions_here').html(data);
                        // $('#table_data').html(data);
                    }
                });
            }

            $(document).on('click', '#add_dis_btn', function (event) {
                 window.location.replace("/add_discussion_index");
            });
        });
    </script>
@endsection

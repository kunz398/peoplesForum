@extends('layouts.app')
adad
@section('content')

@section('style')
    <link href="{{ asset('css/validation.css') }}" rel="stylesheet">
    <style>
    </style>
@endsection

<div class="container">
    <div class="row justify-content-center" style="margin-top: 10%">
        <div class="col-md-8">
            <h3 class="text-center text-white" style="font-weight: bold;">{{ __('Dashboard') }}</h3>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if($status==0):
            <div class="container">
                <!--Step 1-->
                <div id="step_1">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-control-label px-1 text-white"
                                   style="font-weight: bold; font-size: large;    "
                                   for="occupation">{{trans_choice('text.occupation',1)}}</label>

                            <select class="js-example-basic-single form-control" id="occupation" name="occupation" >
                            @foreach($occupation_list as $oclst)
                              <option  value="{{$oclst->occupation}}" >{{$oclst->occupation}}</option>
                                @endforeach
                            </select>
                            <span id="occupationMsg"></span>
                        </div>
                    </div>
                </div>

                <style>
                    ::-webkit-search-cancel-button,
                    ::-webkit-clear-button {
                        -webkit-appearance: none;
                        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg fill="%23000" fill-opacity=".54" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z"/%3E%3Cpath d="M0 0h24v24H0z" fill="none"/%3E%3C/svg%3E');
                        color: rgba(0, 0, 0, 0.54);
                        cursor: pointer;
                        height: 1.5rem;
                        margin-right: 0;
                        width: 1.5rem;
                    }
                    ::-webkit-calendar-picker-indicator {
                        color: rgba(0, 0, 0, 0);
                        opacity: 1;
                        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg fill="%23000" fill-opacity=".54" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/%3E%3Cpath d="M0 0h24v24H0z" fill="none"/%3E%3C/svg%3E');
                        width: 14px;
                        height: 18px;
                        cursor: pointer;
                        border-radius: 50%;
                        margin-left: .5rem;
                    }
                    ::-webkit-calendar-picker-indicator:hover {
                        -webkit-box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.04);
                        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.04);
                    }
                </style>
                <!--Step 2-->
                <div id="step_2" >
                    <div class="row">
                        <div class="col-12">
                            <label class="form-control-label text-white"
                                   style="font-weight: bold; font-size: large;"
                                   for="dob">{{trans_choice('text.dob',1)}}</label>
                            <input type="date" id="dob" name="dob" class="form-control"
                                   placeholder="{{trans_choice('text.dob',1)}}" autocomplete="off"
                                   style="z-index: 99; position: relative"
                            >
                            <span id="dobMsg"></span>
                        </div>
                    </div>
                </div>

                <div class="row" style="z-index: 99; position: relative">
                    <div class="col-12 p-2">
                        <button type="button" id="previousStep" class="btn btn-secondary d-inline-flex align-items-center">
                            <span class="mdi mdi-arrow-left-bold-circle-outline mdi-24px "></span>
                            Previous Step
                        </button>
                        <button type="button" id="nextStep" data-step="1" class="btn btn-success float-end align-items-center">
                            Next Step
                            <span class="mdi mdi-arrow-right-bold-circle-outline mdi-24px"></span>
                        </button>
                        <button type="button" id="finshStep" class="btn btn-custom-blue float-end align-items-center">
                            Finish
                            <span class="mdi mdi-check-circle-outline mdi-24px"></span>
                        </button>
                    </div>
                </div>
            </div>



            <script src="{{ asset('js/nextFormWithvalid.js') }}" defer></script>
            <script src="{{ asset('js/validation.js') }}" defer></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    let max = 2;
                    let validationJson = '{"validationJson":[' +
                        '{"id":"occupation","msg":"occupationMsg","valdationType":"required|min:2|alpha","step":"1" },' +
                        '{"id":"dob","msg":"dobMsg","valdationType":"required|min:2","step":"2" }' +
                        ']}';
                    formSteps(max, validationJson);

                    $('#finshStep').on('click', function (e) {

                        $("#finshStep").attr("disabled", true);
                        e.preventDefault();
                        let occupation = $("#occupation").val();
                        let dob = $("#dob").val();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        /* Ajaxs*/
                        $.ajax({
                            url: "{{route('post_user_detail')}}",
                            method: 'POST',
                            data: {
                                occupation: occupation,
                                dob: dob
                            },
                            success: function (data) {
                                window.location.href = "/";
                            }
                        });
                    });
                });
            </script>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                    $(document).on('click', '#dob', function (event) {

                        $("#dob").trigger('click');
                            alert("1");
                     });

                });
            </script>
            @else
                <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

                <script>
                    $(document).ready(function() {

                        window.location.href = "index";

                    });
                </script>

            @endif

        </div>
    </div>
</div>


@endsection

@section('script')


@endsection


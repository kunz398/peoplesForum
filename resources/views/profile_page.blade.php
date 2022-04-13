@extends('layouts.app2')
@section('content')
@section('style')
    <style>

        .box {
            animation: rotateY-anim 2s linear infinite;
            width: 50px;
            height: 50px;

            margin: 20px;
        }

        @keyframes rotateY-anim {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }
    </style>
@endsection
<div class="container">
    @if (Auth::guest())

    @else
        @if($status==1)
            {{--    CODE HERE--}}
            <link href="{{ asset('css/cards.css') }}" rel="stylesheet">


            <div class="row">
                <div class="col-4">
                    <div class="mt-4 -mb-3 index_beams__3fKa4">
                        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"
                             style="padding: 10px;">
                            <div style="background-position:10px 10px"
                                 class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
                            </div>
                            <table>
                                <thead>
                                <tr>
                                    <td rowspan="3">
                                        <img src="{{\App\Http\Controllers\HomeController::get_user_img(4) }}"
                                             class="rounded-circle pb-2" style="width: 80px; " alt="">
                                    </td>
                                    <td class="px-2">
                                        <small class="text-white">Name: {{$name}}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">
                                        <small class="text-white">Member Since: {{$member_since}}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">
                                        <small class="text-white">Occupation: {{$occupation}}</small>
                                    </td>
                                </tr>
                                </thead>
                            </table>
                            <div
                                class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-7" style="width: 377px;">

                            <div class="mt-4 -mb-3 h-">
                                <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
                                    <div style="background-position:10px 10px"
                                         class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
                                    </div>
                                    <table>
                                        <thead>
                                        <tr>


                                            <td rowspan="3">
                                                <div class="box">
                                                    <span style="color:{{$rank_color}}" class="mdi mdi-seal-variant mdi-36px"></span>

                                                </div>
                                            </td>
                                            <td class="px-2">
                                                <small class="text-white">{{$rank_badge}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2">
                                                <small class="text-white">Rank: {{$rank_value}}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2">

                                            </td>
                                        </tr>
                                        </thead>
                                    </table>
                                    <div style="height: 17px;">

                                    </div>
                                    <div
                                        class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-6  ">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4" id="">
                    <div class="mt-4 -mb-3">
                        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"
                             style="padding: 10px;">
                            <div style="background-position:10px 10px"
                                 class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
                            </div>
                            <h4 class="text-white">Reach</h4>
                            <p class="text-white">
                                <small style="vertical-align: middle;"

                                      class=" text-white mdi mdi-chevron-double-up mdi-36px"></small> {{$total_votes}} Up-votes
                            </p>

                            <p class="text-white">
                                <small style="vertical-align: middle;"
                                      class="text-white mdi mdi-comment-multiple-outline mdi-24px"></small> {{$comments_made}} Comments
                            </p>
                            <div
                                class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
                        </div>
                    </div>


                </div>
                <div class="col-6" style="width: 38%;">

                    <div class="mt-4 -mb-3">
                        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
                            <div style="background-position:10px 10px"
                                 class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
                            </div>
                            <div>
                                <canvas id="myChart" style="position: relative;z-index: 99;"></canvas>
                            </div>

                            <div
                                class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="width: 38%;">

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

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"
        integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('script')

    <script>
        $(document).ready(function () {
            const labels = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec',
            ];

            const data = {
                labels: labels,
                datasets: [
                    {
                    label: 'Votes',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: {{json_encode($vote_per_month)}},
                 },
                    {
                        label: 'Comments',
                        backgroundColor: 'rgb(34,110,138)',
                        borderColor: 'rgb(34,110,138)',
                        data: {{json_encode($comments_per_month)}},
                    }

                ]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0
                        }
                    },
                    responsive: true,
                    plugins: {
                        tooltip: true,
                        legend: {
                            position: 'top',
                        },


                }}
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        });


    </script>


@endsection

<style>
    .tip {
        width: 0px;
        height: 0px;
        position: absolute;
        background: transparent;
        border: 10px solid #ccc;
    }


    .tip-left {
        top: 10px;
        left: -25px;
        border-top-color: transparent;
        border-left-color: transparent;
        border-bottom-color: transparent;
    }


    .dialogbox .body {
        position: relative;
        max-width: 650px;
        height: auto;
        margin: 20px 10px;
        padding: 5px;
        background-color: #DADADA;
        border-radius: 3px;
        border: 5px solid #ccc;
    }

    .body .message {
        min-height: 30px;
        border-radius: 3px;
        font-family: Arial;
        font-size: 14px;
        line-height: 1.5;
        color: #797979;
    }

    .created_comment {
        position: absolute;
        right: 0;
        bottom: 0;
        color: #1a1e21;
        padding-right: 5px;
    }
</style>

@foreach($data as $row)
    <div class="row">
        <div class="col-1">
            <a href="/profile/{{$row->user_id}}"> <img style="width: 50px;margin-top: 21px;" data-toggle="tooltip"
                                                       data-placement="top"
                                                       title="{{\App\Http\Controllers\HomeController::get_username( $row->user_id) }}"
                                                       src="{{\App\Http\Controllers\HomeController::get_user_img($row->user_id) }}"
                                                       class="rounded-circle" alt=""></a>
        </div>
        <div class="col-11">
            <div class="dialogbox ">
                <div class="body">

                    <div class="message">
                        <span> {{ $row->comment_text }}</span>
                        @if(strlen($row->comment_text)>116)
                            <span class="created_comment" style="display: contents">
                       {{\App\Http\Controllers\HomeController::time_elapsed_string($row->created_at) }}
                   </span>
                        @else
                            <span class="created_comment">
                       {{\App\Http\Controllers\HomeController::time_elapsed_string($row->created_at) }}
                   </span>
                        @endif
                        @if($row->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                            <small class="deleteme text-danger" style="cursor: pointer" data-comment_id="{{$row->id}}">delete</small>
                        @endif

                    </div>
                    <span class="tip tip-left "></span>
                </div>
            </div>
        </div>
    </div>


@endforeach
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).on('click', '.deleteme', function (event) {


            Swal.fire({
                title: 'Do you want to Delete this Comment?',
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
                    let res = $(this).data('comment_id');
                    // alert(res);
                    $.ajax({
                        url: "{{route('delete_comment')}}",
                        method: 'POST',
                        data: {
                            result: res,
                        },
                        success: function (data) {
                            if (data == 1) {
                                Swal.fire('Comment Deleted!', '', 'success')
                                setTimeout(
                                    function () {
                                        window.location.href =  window.location.pathname;
                                    }, 3000);

                            }
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Comment not Deleted', '', 'info')
                }
            })
        });
    });

</script>
<center>
    {!! $data->links() !!}
</center>


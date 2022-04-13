<button id="piango" class="btn btn-outline-dark whichnews">PIANGO</button>

<button id="picisoc" class="mt-1 btn btn-outline-dark whichnews">PICISO</button>
<li class="nav-item p-2" style="font-weight: bolder;">

   <span id="out"></span>
</li>
<script>

    $(document).ready(function () {
    var url_ = "piango"
        loadNews(url_);
    $(document).on('click', '.whichnews', function (event) {
        url_ = $(this).attr('id');
        loadNews(url_);
    });
    function loadNews(){
        if(url_ =="piango"){
            $.ajax({
                url: "{{ route('scrape_pingo') }}",
                method: "get",
                data: {

                },
                success: function (data) {
                    $("#out").html(data)
                    $("#piango").removeClass('btn-outline-dark')
                    $("#piango").addClass('btn-dark')

                    $("#picisoc").addClass('btn-outline-dark')
                    $("#picisoc").removeClass('btn-dark')
                }

            });
        }else if(url_ =="picisoc"){
            $.ajax({
                url: "{{ route('scrape_picisco') }}",
                method: "get",
                data: {

                },
                success: function (data) {
                    $("#out").html(data)
                    $("#picisoc").removeClass('btn-outline-dark')
                    $("#picisoc").addClass('btn-dark')

                    $("#piango").addClass('btn-outline-dark')
                    $("#piango").removeClass('btn-dark')
                }

            });
        }

    }


    });
</script>

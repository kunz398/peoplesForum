$(document).ready(function () {
    $("#searchInput").focus(function () {

        $("#searchInput").css({
            "display": "inline",
            "width": "40%",
            "border": "1px solid #40585d",
            "opacity": "1",
            "padding": "8px 20px 8px 20px",
            "background-image": "none",
            "box-shadow": "0 0 1px black"
        });
        $("#submitsearch").css("display", "inline");

        $("#searchInput").prop("placeholder", "");

    });
});

$(document).ready(function () {
    let pathname = window.location.pathname; // Returns path only (/path/example.html)


    $('.vertical-nav li').each(function () {
        let anchor = $(this).children('a');
        let paramString =  window.location.pathname;


        if ($(anchor).attr('href') == pathname) {
            $(this).addClass('hereiam');
        }
        if (paramString == '/index'){
            $("#vhomep").addClass('hereiam');
        }

    });


});

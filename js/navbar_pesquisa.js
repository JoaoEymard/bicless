
$('#input-navbar-pesquisa-cliente').click(function () {
    $.ajax({
        url: './include/getClientes.php',

        success: function($r){
            $r = JSON.parse($r);
            $('.list_navbar_cliente .list-group').html('');
            for (var i = 0; i < $r.length; i++) {
                $('.list_navbar_cliente .list-group').append("<a href='cliente.php?c=" + $r[i].id + "' class='list-group-item'>" + $r[i].nome + "</a>");
            }
        }
    });
    $('.list_navbar_cliente').css('margin-left', '-15px');
    $(window).bind('scroll', function(){
        $(window).scrollTop(0);
    });
});

$('#input-navbar-pesquisa-cliente').blur(function () {
    $('.list_navbar_cliente').css('margin-left', '-315px');
    $(window).unbind('scroll');
});

function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("input-navbar-pesquisa-cliente");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ul-list-navbar-cliente");
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; i++) {
        if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

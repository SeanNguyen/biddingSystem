
$('.table-hover tr').click(function() {
    var code = $(this).data("code");
    var nextMin = $(this).data("next-min");
    var ajaxurl='ajax.php';
    data =  {'action': "add_new_module", 'bid': nextMin, 'code': code};
    $.post(ajaxurl, data, function (response) {
//        alert(response);
    });
});
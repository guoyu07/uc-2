
$('.site-seminars form').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            var btn = $('a.btn[data-seminar=' + data.attributes.seminar_id + '][data-type-id=' + data.attributes.orders_type_id + ']');
            var btnform = btn.next().find('form');
            var btnformpanel = btn.next().find('.panel-body');

            var success_text = data.attributes.orders_type_id == 1 ? 'Заявка на семинар была успешно отправлена!' : 'Вопрос по семинару был успешно отправлен!';

            btnform.remove();
            btn.remove();
            btnformpanel.html('<div class="form-sent"><span class="glyphicon glyphicon-ok"></span> ' + success_text + '</div>');
        },
        error: function () {
            console.log("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});

$('.site-seminars .one-form-show').click(function(){
    if($(this).hasClass('order')) {
        $(this).parent().find('.panel-form.order').toggle();
    }

    if($(this).hasClass('question')) {
        $(this).parent().find('.panel-form.question').toggle();
    }
});
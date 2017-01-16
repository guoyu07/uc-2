// Seminars установка типа даты
var setDateType = function ()
{
    var checked = $('[name="Seminars[dates_type_id]"]:checked');
    $('.dateTypes').hide();
    $('.dateTypes.item-id-' + checked.val()).show();
}

setDateType();

$('[name="Seminars[dates_type_id]"]').click(function(){ setDateType(); })
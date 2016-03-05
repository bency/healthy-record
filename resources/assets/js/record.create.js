$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var showResult = function (ret) {
    console.log(ret);
}

var validate = function (type) {
    var availableTypes = ['piss', 'pupu', 'food', 'water'];
    if (-1 == availableTypes.indexOf(type)) {
        return false;
    }
    return true;
}
var updateProfile = function () {
    var type = $(this).data('type');
    var data = {};
    data.type = type;
    if ("piss" == type || "water" == type) {
        data.value = $('#' + type).val();
    } else if ('food' == type) {
        data.value = parseInt($('#before-eat').val()) - parseInt($('#after-eat').val());
    }
    if (!validate(data.type)) {
        return false;
    }
    $.post('/record', {type: data}).done(showResult);
}
$(document).on('click', "button", updateProfile);

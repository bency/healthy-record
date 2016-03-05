$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var showResult = function (ret) {
    var text = "你今天" + ret.type_name + "已經" + ret.sum + ret.unit + "了";
    swal(text);
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
    if ('food' == type) {
        data.value = parseInt($('#before-eat').val()) - parseInt($('#after-eat').val());
    } else {
        data.value = parseInt($('#' + type).val());
    }
    if (isNaN(data.value) || 1 > data.value) {
        var wrongWarning = {
             title: "忘記填數量啦！",
             type: "warning",
             confirmButtonClass: "btn-danger",
             confirmButtonText: "好的",
             closeOnConfirm: true
        };
        return swal(wrongWarning,function (){
            $('#' + data.type).focus();
        });
    }
    if (!validate(data.type)) {
        return false;
    }
    $.post('/record', data).done(showResult);
}
$(document).on('click', "button[data-function='submit']", updateProfile);

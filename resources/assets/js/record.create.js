$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var showResult = function (ret) {
    var text = "你今天" + ret.type_name + "已經" + ret.sum + ret.unit + "了";
    var data = {
        title: "新增成功",
        text: text,
        type: "success",
        showCancelButton: true,
        cancelButtonClass: "btn-warning",
        cancelButtonText: "繼續新增",
        confirmButtonClass: "btn-primary",
        confirmButtonText: "查看今日列表",
    };
    swal(data, function () {
        location.href = "/record";
    });
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
    data.time = $('#record-time').val();
    data.type = type;
    var date = new Date(data.time);
    if (isNaN(date.getTime())) {
        var wrongWarning = {
             title: "時間設定錯誤！",
             type: "warning",
             confirmButtonClass: "btn-danger",
             confirmButtonText: "確定",
             closeOnConfirm: true
        };
        return swal(wrongWarning,function (){
            $('#' + data.type).focus();
        });
    }
    if ('food' == type) {
        data.value = parseInt($('#before-eat').val()) - parseInt($('#after-eat').val());
        $('#before-eat').val('');
        $('#after-eat').val('');
    } else if ('pupu' == type) {
        data.value = parseInt($('#' + type).val());
    } else {
        data.value = parseInt($('#' + type).val());
        $('#' + type).val('');
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

var updateRecord = function () {
    var id = $(this).data('id');
    $.post('/record/modify', {id: id}).done(function(ret) {
        if (ret.error) {
            return swal({
                 title: "錯誤",
                 text: ret.message,
                 type: "error",
                 confirmButtonClass: "btn-danger",
                 closeOnConfirm: true
            });
        }
        $('#modify-' + id).html('<i class="glyphicon  glyphicon-ok"></i>');
        $('#modify-' + id).parent().attr('class', 'info');
    });
}
if ($.fn.datetimepicker) {
    $('#record-time').datetimepicker({
        toolbarPlacement: "top",
        format: "YYYY-MM-DD HH:mm"
    });
}
$(document).on('click', "button[data-function='submit']", updateProfile);
$(document).on('click', "button[data-function='modify']", updateRecord);

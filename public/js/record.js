$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var validate = function (type) {
    var availableTypes = ['piss', 'pupu', 'food', 'water'];
    if (-1 == availableTypes.indexOf(type)) {
        return false;
    }
}
var getData = function () {
    var data = $(this).data('type');
    if (!validate(data)) {
        return false;
    }
}
$(document).on('click', "button", getData);

//# sourceMappingURL=record.js.map

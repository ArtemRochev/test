$().ready(function () {
    $('#save-client').on('beforeSubmit', function () {
        var thisObj = $(this);
        $.ajax({
            method: 'POST',
            url:    '/site/save-client',
            data:   thisObj.serialize()
        }).done(function (response) {
            console.log(response);
            toastr.success('Клиент добавлен');
        }).error(function () {
            toastr.error('Ошибка');
        });

        return false;
    }).on('submit', function(e){
        e.preventDefault();
    });
});
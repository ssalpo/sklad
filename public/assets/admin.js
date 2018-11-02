$(function () {
    // удаление элементов при клике на кнопку
    $(document).on('click', '.itemDestroyEl', function () {
        var url = $(this).data('url'),
            form = $('.ItemDestroyForm'),
            message = $(this).data('message') || 'Вы уверены что хотите удалить?',
            canDelete = confirm(message);


            console.log(url && form.length && canDelete);

        if (url && form.length && canDelete) {
            form.attr('action', url);
            form.submit();
        }

    });
});
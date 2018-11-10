$(function () {
    // удаление элементов при клике на кнопку
    $(document).on('click', '.itemDestroyEl', function () {
        var url = $(this).data('url'),
            form = $('.ItemDestroyForm'),
            message = $(this).data('message') || 'Вы уверены что хотите удалить?',
            canDelete = confirm(message);

        if (url && form.length && canDelete) {
            form.attr('action', url);
            form.submit();
        }

    });

    var priceInput = $('.price-input');

    if (priceInput.length) {
        var priceNum = priceInput.maskMoney({thousands: '', decimal: '.', allowZero: true});

    }

    $('.email-input').inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            '*': {
                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                casing: "lower"
            }
        }
    });

    $(".number-input").inputmask({ "mask": "9", "repeat": 10, "greedy": false });


});
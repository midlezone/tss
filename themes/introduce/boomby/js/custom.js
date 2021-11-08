$(document).ready(function () {

    function confirmDelete(msg) {
        if (window.confirm(msg)) {
            return true;
        }
        return false;
    }


    $('#p_value_format').keyup(function (event) {
        if (event.which >= 37 && event.which <= 40) {
            event.preventDefault();
        }
        var $this = $(this);
        var num = $this.val().replace(/,/gi, "").split("").reverse().join("");
        var num2 = RemoveRougeChar(num.replace(/(.{3})/g, "$1,").split("").reverse().join(""));
        $this.val(num2);

        $('#p_value').val($('#p_value_format').val().replace(/,/g, ''));

    });

    function RemoveRougeChar(convertString) {
        if (convertString.substring(0, 1) === ",") {
            return convertString.substring(1, convertString.length);
        }
        return convertString;
    }


    // SIDEBAR: class active when click.
    $('li.nav-item a').each(function () {
        if ($(this).attr("href") == window.location.href) {
            $(this).parents('li').removeClass('nav-item').addClass('active');
        }
    });

    // select all and deselect all
    $('.checkall').click(function () {
        $(":checkbox").attr("checked", true);
    });
    // Uncheck All
    $('.uncheckall').click(function () {
        $(":checkbox").attr("checked", false);
    });


    $('#filterdate').click(function () {
        $("form.filterByDate").toggle(500);
    });

    // get action into confirm balance and delivery
    $('.confirmDelivery').click(function () {
        var delivery_action = $(this).attr('delivery-action');
        $('#form_confirm_delivery').attr('action', delivery_action);
    });
    // cancel
    $('.cancelDelivery').click(function () {
        var delivery_action = $(this).attr('delivery-action');
        $('#form_cancel_delivery').attr('action', delivery_action);
    });

    // get action balance
    $('.confirmBalance').click(function () {
        var balance_action = $(this).attr('balance-action');
        $('#form_confirm_balance').attr('action', balance_action);
    });


    // custom note for diliver
    $('.note_form_click').on('click', function () {
        $(this).parents().find('form.editableform').css('display', 'none');
        $(this).parents().find('span').css('display', 'block');
        $(this).css('display', 'none');
        $(this).parent().find('form.editableform').css('display', 'block');
    });

    $('.editable-cancel').on('click', function () {
        $(this).parents().find('form.editableform').css('display', 'none');
        $(this).parents().find('span.note_form_click').css('display', 'block');
    });

    // check card
    $('#card_check').click(function () {
        $(".form_card_check").toggle(500);
    });


    $('select.module').change(function () {
        module = $(this).val().toLowerCase();
        $('select.action option').css('display', 'none');
        $('select.action option.' + module).css('display', 'inline');
    });

    $('.print_page').click(function () {
        $('#printCard').css('display', 'block');
        $('#printCard').print({
            globalStyles: true,
            mediaPrint: false
        });
        $('#printCard').css('display', 'none');
    });

    $('.print_invoice').click(function () {
        $('#invoice').css('display', 'block');
        $('#invoice').print({
            globalStyles: true,
            mediaPrint: false
        });
        $('#invoice').css('display', 'none');
    });

    // focus serial input when click card-check button
    $('#card_check').click(function () {
        $('#serial').focus();
    });

    // add new user: if role==vendor -> enable select vendor parent
    $('select.role').change(function () {
        if ($(this).val() == 2) {
            $('select.parent_id').css('display', 'block');
        } else {
            $('select.parent_id').css('display', 'none');
        }
    });

    $("#export_data").click(
        function () {
            $('#confirm_export').modal('hide');
            $('#export_data').click();
        }
    );

    $('.confirm_btn').click(function () {
        var order_action = $(this).attr('order-action');
        $('#form_confirm_order').attr('action', order_action);
    }); 

    $('.cancel_btn').click(function () {
        var order_action = $(this).attr('order-action');
        $('#form_cancel_order').attr('action', order_action);
    });

    $('.issue_btn').click(function () {
        var order_action = $(this).attr('order-action');
        $('#form_issue_order').attr('action', order_action);
    });

    $('.show_btn').click(function () {
        var order_items = JSON.parse($(this).attr('order-items'));
        $('.order_items').html('<table class="table"><thead><tr><th>#</th><th>Loáº¡i tháº»</th><th>Sá»‘ lÆ°á»£ng</th><th>GiÃ¡</th><th>Tá»•ng tiá»n</th></tr></thead><tbody id="add_item"></tbody></table>');
        $.each(order_items, function (index, data) {
            $("#add_item").append("<tr><td>" + (index + 1) + "</td><td>" + data.denomination + "</td><td>" + data.quantity + "</td><td>" + data.price + "</td><td>" + (data.price) * (data.quantity) + "</td></tr>");
        })
    });

    $("button[type=submit]").click(function () {
        var valid = true;
        var form = $(this).parents('form');
        form.find('input, select, textarea').each(function () {
            var input = $(this);
            if (input.attr('required') && !input.val()) {
                alert('Vui lÃ²ng nháº­p cÃ¡c trÆ°á»ng báº¯t buá»™c!');
                valid = false;
                return false;
            }
        });
        if (valid) {
            $(this).attr('disabled', 'disabled');
            form.submit();
        } else {
            return false;
        }
    });
    $('select.submit').change(function () {
        var form = $(this).parents('form');
        form.submit();
    });

    $('button.filter').click(function () {
        $('#filter_days').val($(this).val());
        $('#date_from').val('');
        $('#date_to').val('');

        var form = $(this).parents('form');
        form.submit();
    });
    $('#custom_date_filter').click(function () {
        $('#filter_days').val('');

        var form = $(this).parents('form');
        form.submit();
    });

    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
        format:"dd-mm-yyyy"
    });
});
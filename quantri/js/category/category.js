jQuery(document).ready(function() {

    $("#category ul").treeview();

    $(document).on('click', '.cateaction', function() {
        if ($(this).hasClass('disable'))
            return false;
        $(this).addClass('disable');
        var action = $(this).attr('cateaction');
        var href = $(this).attr('href');
        var catcontent = $(this).closest('.cat_content');
        if (action && href && catcontent.html()) {
            switch (action) {
                case 'movedown':
                    {
                        if (catcontent.next().html()) {
                            $.ajax({
                                type: "POST",
                                dataType: 'JSON',
                                url: href,
                                success: function(data) {
                                    if (data && data.code == 200) {
                                        var tem = catcontent.html();
                                        catcontent.html(catcontent.next().html());
                                        catcontent.next().html(tem);
                                        catcontent.removeClass();
                                        catcontent.addClass('cat_content');
                                        catcontent.next().removeClass();
                                        catcontent.next().addClass('cat_content');
                                        catcontent.parents('.treeview').treeview();
                                    }
                                }
                            });
                        }
                    }
                    break;
                case 'moveup':
                    {
                        if (catcontent.prev().html()) {
                            $.ajax({
                                type: "POST",
                                dataType: 'JSON',
                                url: href,
                                success: function(data) {
                                    if (data && data.code == 200) {
                                        var tem = catcontent.html();
                                        catcontent.html(catcontent.prev().html());
                                        catcontent.prev().html(tem);
                                        catcontent.removeClass();
                                        catcontent.addClass('cat_content');
                                        catcontent.prev().removeClass();
                                        catcontent.prev().addClass('cat_content');
                                        catcontent.parents('.treeview').treeview();
                                    }
                                }
                            });

                        }
                    }
                    break;
                case 'delete':
                    {
                        if (catcontent.find("ul").html()) {
                            alert("C?? c??c danh m???c con trong danh m???c n??y, b???n ph???i di chuy???n c??c danh m???c con ho???c x??a c??c danh m???c con ???? ??i tr?????c.");
                        } else {
                            if (confirm("B???n c?? ch???c ch???n mu???n x??a danh m???c n??y kh??ng?")) {
                                $.ajax({
                                    type: "POST",
                                    dataType: 'JSON',
                                    url: href,
                                    success: function(data) {
                                        if (data && data.code == 200) {
                                            var pa = catcontent.parents('.treeview');
                                            catcontent.remove();
                                            pa.treeview();
                                        }
                                    }
                                });
                            }
                        }
                    }
                    break;
            }
        }
        $(this).removeClass('disable');
        //
        return false;
    });

});

function delcat(obj, cat_id) {
    _obj = $(obj).parent().parent().parent();

    if (_obj.find("ul").html() != null) {
        alert("C?? c??c danh m???c con trong danh m???c n??y, b???n ph???i di chuy???n c??c danh m???c con ho???c x??a c??c danh m???c con ???? ??i tr?????c.");
    } else {
        if (confirm("B???n c?? ch???c ch???n mu???n x??a danh m???c n??y kh??ng?")) {
            $.post("index.php?r=admin/delcat&id=" + cat_id, function(data) {
                if (data != "fail") {

                    parent = _obj.parent();

                    if (data == "root") {
                        _obj.remove();
                        parent.treeview();
                    }
                    else {
                        parent.remove(); // X??a ul
                    }
                }
            });
        }
    }
}
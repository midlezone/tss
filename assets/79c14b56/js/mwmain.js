jQuery(document).ready(function() {
    jQuery('.addmodule-action').on('click', function() {
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
        var url = $(this).attr('href');
        if (!url)
            return false;
        jQuery.ajax({
            type: 'post',
            dataType: 'JSON',
            url: url,
            beforeSend: function() {
                w3ShowLoading(_this, 'right', 0, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    $(document).LoPopUp({
                        title: 'Thêm module',
                        clearBefore: true,
                        clearAfter: true,
                        maxwidth: '800px',
                        minwidth: '800px',
                        maxheight: '550px',
                        top: '200px',
                        contentHtml: res.html
                    });
                    $(".LOpopup").show();
                }
                w3HideLoading();
                _this.removeClass('disable');
            },
            error: function() {
                w3HideLoading();
                _this.removeClass('disable');
            }

        });
        return false;
    });

    jQuery(document).on('click', '#savewidget', function() {
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
    });

    jQuery(document).on('submit', '#widgets-form', function() {
        var _this = jQuery(this);
        var url = jQuery(this).attr('action');
        var method = jQuery(this).attr('method');
        var data = jQuery(this).serialize();
        jQuery.ajax({
            url: url,
            type: method,
            dataType: 'JSON',
            data: data,
            beforeSend: function() {
                w3ShowLoading(_this, 'left', 0, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    if (res.nstep && res.nstep != '') {
                        $(document).LoPopUp({
                            title: 'Cấu hình cho module',
                            clearBefore: true,
                            clearAfter: true,
                            maxwidth: '800px',
                            minwidth: '800px',
                            maxheight: '550px',
                            contentHtml: res.nstep
                        });
                    }

                } else {
                    if (res.errors) {
                        parseJsonErrors(res.errors, _this);
                    }
                }
                w3HideLoading();
                $('#savewidget').removeClass('disable');
            }
            ,
            error: function() {
                w3HideLoading();
                $('#savewidget').removeClass('disable');
            }
        });
        return false;
    });
    //
    jQuery(document).on('click', '#savewidgetconfig', function() {
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
    });
    //
    jQuery(document).on('submit', '#widget-config-form', function() {
        var _this = jQuery(this);
        var url = jQuery(this).attr('action');
        var method = jQuery(this).attr('method');
        var data = jQuery(this).serialize();
        jQuery.ajax({
            url: url,
            type: method,
            dataType: 'JSON',
            data: data,
            beforeSend: function() {
                w3ShowLoading(_this, 'left', 0, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    window.location.href = window.location.href;
                } else {
                    if (res.errors) {
                        parseJsonErrors(res.errors, _this);
                    }
                }
                w3HideLoading();
                $('#savewidgetconfig').removeClass('disable');
            }
            ,
            error: function() {
                w3HideLoading();
                $('#savewidgetconfig').removeClass('disable');
            }
        });
        return false;
    });
    //
    jQuery(document).on('click', '.mwidgetedit', function() {
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
        var url = jQuery(this).attr('href');
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                w3ShowLoading(_this.closest('.mwhead'), 'right', 0, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    if (res.html && res.html != '') {
                        $(document).LoPopUp({
                            title: 'Cập nhật module',
                            clearBefore: true,
                            clearAfter: true,
                            maxwidth: '800px',
                            minwidth: '800px',
                            maxheight: '550px',
                            contentHtml: res.html
                        });
                        $(".LOpopup").show();
                    }

                }
                w3HideLoading();
                _this.removeClass('disable');
            }
            ,
            error: function() {
                w3HideLoading();
                _this.removeClass('disable');
            }
        });
        return false;
    });
    //
    //
    jQuery(document).on('click', '.mwiddelete', function() {
        if (!confirm('Bạn có chắc chắn muốn xóa module này không?'))
            return false;
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
        var url = jQuery(this).attr('href');
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                w3ShowLoading(_this.closest('.mwhead'), 'right', 0, 0);
            },
            success: function(res) {
                if (res.code == 200) {
                    _this.closest('.mwidget').remove();
                }
                w3HideLoading();
                _this.removeClass('disable');
            }
            ,
            error: function() {
                w3HideLoading();
                _this.removeClass('disable');
            }
        });
        return false;
    });
    //
    //
    jQuery(document).on('click', '.mwidmove', function() {
        var _this = jQuery(this);
        if (_this.hasClass('disable'))
            return false;
        _this.addClass('disable');
        var url = jQuery(this).attr('href');
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                w3ShowLoading(_this.closest('.mwhead'), 'right', 0, 0);
            },
            success: function(res) {
                if (res.code == 200 && res.cm) {
                    window.location.href = window.location.href;
                }
                w3HideLoading();
                _this.removeClass('disable');
            }
            ,
            error: function() {
                w3HideLoading();
                _this.removeClass('disable');
            }
        });
        return false;
    });
    //
});
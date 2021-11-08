<div class="languages clearfix">
    <ul>
        <?php foreach ($languages as $language) { ?>
            <li class="<?php if ($language['active']) echo 'active'; ?>">
                <a href="<?php echo $language['link']; ?>" class="language-action">
                    <?php if ($language['key'] == 'en') { ?>
                        <span class="language-eng"></span>
                        English
                    <?php } else { ?>
                        <span class="language"></span>
                        Tiếng việt
                    <?php } ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.languages .language-action').on('click', function() {
            var thi = jQuery(this);
            if (!thi.hasClass('active') && !thi.parent().hasClass('active')) {
                var url = (thi.attr('href')) ? thi.attr('href') : thi.attr('src');
                if (!url)
                    return false;
                jQuery.ajax({
                    type: 'post',
                    dataType: 'JSON',
                    url: url,
                    beforeSend: function() {
                    },
                    success: function(res) {
                        thi.addClass('active');
                        if (res.code == 200) {
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            } else
                                window.location.href = window.location.href;
                        }
                    },
                    error: function() {
                    }

                });
            }
            return false;
        });
    });
</script>
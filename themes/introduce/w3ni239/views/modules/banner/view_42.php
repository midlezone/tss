<?php if (count($banners)) { ?>
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: red;">
                        <!--<span aria-hidden="true">&times;</span>-->
                        <i class="icon-remove" style="font-size: 20px;"></i>
                    </button>
                    <!--<h4 class="modal-title" id="myModalLabel"></h4>-->
                </div>

                <div class="modal-body">
                    <?php
                    foreach ($banners as $banner) {
                        $height = $banner['banner_height'];
                        $width = $banner['banner_width'];
                        $src = $banner['banner_src'];
                        $link = $banner['banner_link'];
                        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                            ?>
                            <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                                <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> max-width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }
        $('document').ready(function () {
            var has_cookie_popup = getCookie('popup');
//            if (has_cookie_popup) {
//                $('#modal').modal('hide');
//            } else {
                setCookie('popup', 1);
                $('#myModal').modal('show');
//            }
        });
    </script>
<?php } ?>
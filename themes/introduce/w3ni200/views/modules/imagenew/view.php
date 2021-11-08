<?php if (count($images)) { ?>
    <div id="imgInSite">
        <div class="panel panel-default menu-vertical">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <div class="title-main">
                        <a href="<?php echo $link; ?>"><h3><?php echo $widget_title; ?></h3></a>
                    </div>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="ivslider">
                    <?php foreach ($images as $image) { ?>
                        <div data-iview:image="<?php echo ClaHost::getImageHost() . $image['path'] . 's280_280/' . $image['name']; ?>" data-iview:transition="random,zigzag-top,zigzag-bottom,strip-right-fade,strip-left-fade">
                            <a href="<?php echo Yii::app()->createUrl('/media/album/detail',array('id'=>$image['album_id'])); ?>" style="display: block; width: 100%; height: 100%;">&nbsp;</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function() {
        var iid = (jQuery("#imgInSite").length) ? "#imgInSite" : "";
        $(iid + " .ivslider").iView({
            pauseTime: 2500,
            pauseOnHover: true,
            directionNav: true,
            directionNavHide: false,
            directionNavHoverOpacity: 0,
            controlNav: false,
            nextLabel: "next",
            previousLabel: "prev",
            timer: "",
            timerPadding: 3,
            timerColor: "#FEFEFE"
        });
    });
</script>
<div class="col-sm-8">
    <div class="newsinhome">
        <div class="panel panel-default menu-vertical">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <h3><?php echo $widget_title; ?></h3>
                </div>
            <?php } ?>
            <div class="panel-body" style="display: block;">
                <div class="list-group-list">
                    <ul class="pgwSlider">
                        <?php foreach ($news as $ne) { ?>
                            <li>
                                <a href="<?php echo $ne['link']; ?>" title="<?php echo $ne['news_title']; ?>">
                                    <img  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" alt="<?php echo $ne['image_name']; ?>"/>
                                    <span><?php echo $ne['news_title']; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/pgwslider.min.js"></script> 
<script>
    $(document).ready(function () {
        $('.pgwSlider').pgwSlider(
                {
                    transitionEffect: "sliding",
                    intervalDuration: 4000
                }
        );
    });
</script> 

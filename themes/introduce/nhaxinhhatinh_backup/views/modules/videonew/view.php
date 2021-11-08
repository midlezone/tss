<?php if (count($videos)) { ?>
    <div class="album video support-in">
        <div class="panel panel-default categorybox">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading" >
                    <h2>VIDEO</h2>
                </div>
            <?php } ?>
            <div class="panel-body">
                <div class="grid_12">
                    <div id="fullwidth_slider" class="everslider fullwidth-slider es-slides-ready" style="max-width: 100%;">
                        <?php
                        foreach ($videos as $video) {
                            ?>
                            <iframe width="100%" height="134" frameborder="0" src="<?php echo $video['video_embed']; ?>?autohide=1" allowfullscreen="1" allowtransparency="true">
                            </iframe>
                        <?php } ?>
                    </div>
                </div>
                <!--end-panel-body--> 
            </div>
        </div>
    </div>
<?php } ?>

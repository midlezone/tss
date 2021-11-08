<div class="facebook">
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2>
                <a onclick="javascript:void(0)"><?php echo $widget_title ?></a>
            </h2>
        </div>
    <?php } ?>
    <div class="cont">
        <?php
        if ($html) {
            echo $html;
        }
        ?>
    </div>
</div>
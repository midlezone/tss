<?php
if (count($widgets)) {
    foreach ($widgets as $wget) {
        $widget = Widgets::getWidgetInfo($wget);
        if ($widget) {
            // Nếu là widget do người dùng định nghĩa
            if ($widget['widget_type'] == Widgets::WIDGET_TYPE_CUSTOM) {
                ?>
                <div class="widget">
                    <div class="widget-head"><span class="title"><?php echo $widget['widget_name'] ?></span></div>
                    <div class="widget-content">
                        <div class="widget-content-inner">
                            <?php echo $widget['widget_template']; ?>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                // Nếu là widget của hệ thống
            }
        }
    }
}

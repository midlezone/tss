<?php
    if (isset($data) && count($data)) {
?>
<?php if ($show_widget_title) { ?>
<div class="panel panel-default">
    <div class="panel-heading"><h2><a><?php echo $widget_title; ?></a></h2></div>
</div>
<?php } ?>
<div class="site-map-cont">
    <ul>
        <?php foreach ($data as $k => $item) { ?>
        <li><a href="<?php echo $item['menu_link'] ?>" title="<?php echo $item['menu_title'] ?>"><i class="icon-tt"></i> <?php echo $item['menu_title'] ?></a></li>
        <?php } ?>
    </ul>
</div>
<?php } ?>

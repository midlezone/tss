<?php if (isset($data) && count($data)) { ?>

<?php if ($level == 0) { ?>
<div class="panel panel-default categorybox">
    <?php if ($show_widget_title) { ?>
    <div class="panel-heading">
        <h3><?php echo $widget_title; ?></h3>
    </div>
    <?php } ?>
    <div class="panel-body">
<?php } ?>
        <ul class="<?php echo ($level > 0) ? 'menu menu-list' : ''; ?>">
            <?php
            foreach ($data as $cat_id => $category) {
                $c_link = $category['link'];
                ?>
            <li class="<?php echo ($level == 0) ? 'first-menu-left-li' : ''; ?>">
                
                <a title="<?php echo $category['cat_name']; ?>" href="<?php echo $c_link ?>"><?php echo $category['cat_name']; ?></a>
                
                <?php
                $this->render($this->view, array(
                    'data' => $category['children'],
                    'level' => $level + 1,
                ));
                ?>
            </li>
            <?php } ?>
        </ul>
<?php if ($level == 0) { ?>
    </div>
</div>
<?php } ?>

<?php } 
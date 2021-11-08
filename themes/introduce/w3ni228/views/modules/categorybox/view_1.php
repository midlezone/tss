<?php if (isset($data) && count($data)) { ?>
    <?php if ($level == 0) { ?>
        <div class="categories">
            <div class="panel panel-default categorybox">
                <?php if ($show_widget_title) { ?>
                    <div class="panel-heading">
                        <h2><?php echo $widget_title ?></h2>
                    </div>
                <?php } ?>
                <div class="panel-body">
                <?php } ?>
                <ul class="menu <?php echo $level == 0 ? 'menu-list' : ''; ?>">
                    <?php foreach ($data as $cat_id => $category) { ?>
                        <li class="<?php echo (count($category['children']) > 0) ? 'submenu' : ''; ?>"> 
                            <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name']; ?></a>
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
        </div>
    <?php } ?>
<?php } ?>
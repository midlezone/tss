<?php
if (isset($data) && count($data)) {
    ?>
    <?php
    if ($level == 0) {
        ?>
        <div class="top-products">
            <?php if ($show_widget_title) { ?>
                <div class="category-name">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            <?php } ?>
            <div class="category-cont">
            <?php } ?>
            <ul class="menu">
                <li class="<?php echo (ClaSite::getLinkKey() == 'economy/product/') ? 'active' : '' ?>" >
                    <a href="<?php echo '/product'; ?>" title="<?php echo 'home'; ?>">All</a>
                </li>
                <?php
                foreach ($data as $cat_id => $category) {
                    $c_link = $category['link'];
                    ?>
                    <li class="<?php echo ($category['active']) ? 'active' : '' ?>" >
                        <a href="<?php echo $c_link; ?>" title="<?php echo $category['cat_name']; ?>"><?php echo $category['cat_name']; ?></a>
                    </li>
                <?php } ?>
            </ul>        
            <?php if ($level == 0) { ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>
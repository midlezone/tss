<?php if (isset($data) && count($data)) { ?>
    <div class="box-category">
        <h3><?php echo $data['category']->cat_name; ?></h3>
        <?php
        if (isset($data['children_category']) && count($data['children_category'])) {
            $children_category = $data['children_category'];
            ?>
            <ul>
                <?php foreach ($children_category as $category) { ?>
                    <li> 
                        <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a> 
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
<?php } ?>

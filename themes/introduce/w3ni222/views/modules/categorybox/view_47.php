<?php if (isset($data) && count($data)) { ?>
    <div class="featured-services">
        <div id="triangle-down"></div>
        <div class="container">
            <div class="row featurebox ">
                <div class="col-sm-12 featurebox-item featured-services-item">
                    <div class="featured-services-item-body">
                        <div class="duo example">
                            <div class="duo__cell examle__demo">
                                <ul class="grid grid--fluid-5-col js-masonry" data-masonry-options="{ &quot;itemSelector&quot;: &quot;.grid-item&quot;, &quot;columnWidth&quot;: &quot;.grid-sizer&quot;, &quot;percentPosition&quot;: true }">
                                    <div class="grid-sizer">

                                    </div>
                                    <?php $i = 0;
                                    foreach ($data as $cat_id => $category) {
                                        $i++;
                                        if ($i == 7) {
                                            break;
                                        };
                                        ?>
                                        <li class="grid-item">
                                            <a href="<?php echo $category['link'] ?>" title="<?php echo $category['cat_name'] ?>"><?php echo $category['cat_name'] ?></a>
                                                <?php
                                                if ($category['children'] && count($category['children']) > 0) {
                                                    ?>
                                                <ul class="clearfix">
                                            <?php foreach ($category['children'] as $c_cat) { ?>
                                                        <li><a href="<?php echo $c_cat['link'] ?>" title="<?php echo $c_cat['cat_name'] ?>"><?php echo $c_cat['cat_name'] ?></a></li>
            <?php } ?>
                                                </ul>
        <?php } ?>
                                        </li>
    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


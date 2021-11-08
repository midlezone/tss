<?php if ($show_widget_title) { ?>
    <div class="title">
        <h2>
            <a onclick="javascript:void(0)">
                <?php echo $widget_title ?>
            </a>
        </h2>
    </div>
<?php } ?>
<?php if (isset($data) && count($data)) { ?>
    <div class="cont clearfix">
        <div class="duo example">
            <div class="duo__cell examle__demo">
                <ul class="grid grid--fluid-5-col js-masonry" data-masonry-options="{ &quot;itemSelector&quot;: &quot;.grid-item&quot;, &quot;columnWidth&quot;: &quot;.grid-sizer&quot;, &quot;percentPosition&quot;: true }">
                    <div class="grid-sizer">
                    </div>
                    <?php foreach ($data as $menu_id => $menu) { ?>
                        <li class="grid-item">
                            <a <?php echo $menu['target']; ?> href="<?php echo $menu['menu_link'] ?>" title="<?php echo $menu['menu_title'] ?>"><?php echo $menu['menu_title'] ?></a>
                            <ul class="clearfix">
                                <?php 
                                if (count($menu['items']) > 0) { 
                                    foreach($menu['items'] as $sub_menu) {
                                    ?>
                                    <li>
                                        <a <?php echo $sub_menu['target']; ?> href="<?php echo $sub_menu['menu_link']; ?>" title="<?php echo $sub_menu['menu_title']; ?>">
                                            <?php echo $sub_menu['menu_title']; ?>
                                        </a>
                                    </li>
                                <?php } } ?>
                            </ul> 
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>

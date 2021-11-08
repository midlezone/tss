<?php
if (isset($data) && count($data)) {
    ?>
    <div class="default-custom-box feature-product">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <a href="/khoa-hoc">
                        <span><?php echo $widget_title ?>
                        </span>
                    </a>
                </h2>
                <div class="category-detail-btn">
                    <a href="/khoa-hoc">
                        <i>Xem tất cả</i>
                        <i class="category-detail-i"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
        <?php if (count($data)) { ?>
            <div class="product-cont">
                <div class="list grid">
                    <?php
                    foreach ($data as $menu_id => $menu) {
                        $m_link = $menu['menu_link'];
                        ?>
                        <div class="list-item">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href='<?php echo $m_link; ?>' title="<?php echo $menu['menu_title']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $menu['icon_path'] . $menu['icon_name']; ?>" alt="<?php echo $menu['menu_title']; ?>"/>
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <h3 class="cont-tittle">
                                            <a href='<?php echo $m_link; ?>' title="<?php echo $menu['menu_title']; ?>">
                                                <?php echo $menu['menu_title']; ?>
                                            </a>
                                        </h3>   
                                        <ul class="list-group">
                                            <?php if (count($menu['items'])) { ?>
                                                <?php foreach ($menu['items'] as $course) { ?>
                                                    <li class="list-group-item   ">
                                                        <a href='<?php echo $course['menu_link']; ?>' title="<?php echo $course['menu_title']; ?>">
                                                            <?php echo $course['menu_title']; ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                        <a href="<?php echo $m_link; ?>?>" title="<?php echo $menu['menu_title'] ?>" class="detail-btn">
                                            <span>Xem chi tiết</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>



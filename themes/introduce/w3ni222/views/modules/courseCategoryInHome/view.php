<?php if (isset($data) && count($data)) {
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
                    <?php foreach ($data as $data_cate) { ?>
                        <div class="list-item">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $data_cate['link'] ?>" title="<?php echo $data_cate['cat_name'] ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $data_cate['image_path'] . 's200_200/' . $data_cate['image_name'] ?>" alt="<?php echo $data_cate['cat_name'] ?>">
                                        </a>
                                    </div>
                                    <div class="list-content-body">
                                        <h3 class="cont-tittle">
                                            <a href="<?php echo $data_cate['link'] ?>" title="<?php echo $data_cate['cat_name'] ?>">
                                                <?php echo $data_cate['cat_name'] ?>
                                            </a>
                                        </h3>    
                                        <ul class="list-group">
                                            <?php if (count($data_cate['course'])) { ?>
                                                <?php
                                                foreach ($data_cate['course'] as $course) {
                                                    if ($course['ishot']) {
                                                        ?>
                                                        <li class="list-group-item   ">
                                                            <a href="<?php echo $course['link'] ?>" title="<?php echo $course['name'] ?>">
                                                                <?php echo $course['name'] ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            <?php } ?>
                                        </ul>
                                        <a href="<?php echo $data_cate['link'] ?>" title="<?php echo $data_cate['cat_name'] ?>" class="detail-btn">
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




<div class="default-custom-box feature-product">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2>
                    <a onclick="javascript:void(0)">
                        <span><?php echo $widget_title ?>
                        </span>
                    </a>
                </h2>
                <div class="category-detail-btn">
                    <a onclick="javascript:void(0)">
                        <i>Xem tất cả</i>
                        <i class="category-detail-i"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php if (count($courses)) { ?>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($courses as $course) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $course['link'] ?>" title="<?php echo $course['name'] ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $course['image_path'] . 's180_180/' . $course['image_name'] ?>" alt="<?php echo $course['name'] ?>">
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <h3 class="cont-tittle">
                                        <a href="<?php echo $course['link'] ?>" title="<?php echo $course['name'] ?>">
                                            <?php echo $course['name'] ?>
                                        </a>
                                    </h3>
                                    <p class="cont-detail">
                                        <?php echo $course['sort_description'] ?>
                                    </p>
                                    <a href="<?php echo $course['link'] ?>" title="<?php echo $course['name'] ?>" class="detail-btn">
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
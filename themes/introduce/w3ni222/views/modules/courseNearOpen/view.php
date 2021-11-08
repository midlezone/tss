<div class="default-custom-box class-schedule">
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2>
                <a  href="/lich-khai-giang-pde,948">
                    <span><?php echo $widget_title ?>
                    </span>
                </a>
            </h2>
            <div class="category-detail-btn">
                <a href="/lich-khai-giang-pde,948">
                    <i>Xem tất cả</i>
                    <i class="category-detail-i"></i>
                </a>
            </div>
        </div>
    <?php } ?>
    <?php if (count($courses)) { ?>
        <div class="product-cont detail-schedule">
            <div class="table-warper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Khóa học</th>
                            <th>Khai giảng</th>
                            <th>Lịch học</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course) { ?>

                            <tr>
                                <td class="class-name">
                                    <a href="<?php echo $course['link'] ?>">
                                        <?php echo $course['name'] ?><span> (<?php echo ($course['number_lession']) . ' Buổi' ?>)</span>
                                    </a>
                                </td>
                                <td><?php echo date('d/m/ Y', $course['course_open']); ?></td>
                                <td><?php echo $course['school_schedule']; ?></td>
                                <td>
                                    <a class="red regis-btn" href="<?php echo $course['link'] ?>">
                                        <span>
                                            <?php echo 'Đăng kí' ?>
                                        </span>
                                    </a>
                                    <?php // echo number_format(round($course['price'], 0), 0, '.', '.') . 'đ'; ?>
                                </td>
                                <!--<td><?php // echo 'Chi tiết..'      ?></td>-->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
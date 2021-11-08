<?php if (isset($data) && count($data)) { ?>
    <div class="default-custom-box class-schedule">
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
            <div class="product-cont detail-schedule">
                <?php foreach ($data as $data_cate) { ?>
                    <div class="table-warper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $data_cate['cat_name'] ?></th>
                                    <th>Khai giảng</th>
                                    <th>Lịch học</th>
                                    <th>Học phí</th>
                                    <th>Số học viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($data_cate['course'])) { ?>
                                    <?php foreach ($data_cate['course'] as $course) { ?>

                                        <tr>
                                            <td class="class-name">
                                                <a href="<?php echo $course['link'] ?>">
                                                    <?php echo $course['name'] ?><br><span><?php echo $course['time_for_study'] ?></span>
                                                </a>
                                            </td>
                                            <td><?php echo date('d - m - Y', $course['course_open']); ?></td>
                                            <td><?php echo $course['school_schedule']; ?></td>
                                            <td class="red"><?php echo number_format(round($course['price'], 0), 0, '.', '.') . 'đ'; ?></td>
                                            <td><?php echo $course['number_of_students'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>




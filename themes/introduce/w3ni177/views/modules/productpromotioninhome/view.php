<?php
foreach ($promotionInHome as $promotion) {
    $date = new DateTime();
    $utime = $date->format('U');
    $date->setTimestamp($promotion['enddate']);
    $time_end = $date->format('j F Y H:i:s');
    if ($promotion['enddate'] > $utime) {
        ?>
        <div class="panel panel-default clearfix">
            <div class="panel-heading" style="float: left;border-width: 0 0 1px 0">
                <h2>
                    <a href="<?php echo $promotion['link'] ?>" title="<?php echo $promotion['name'] ?>"><?php echo $promotion['name'] ?></a>
                </h2>
            </div>
            <?php ?>
            <div class="time" id="countdown">
                <span class="hours"></span>:<span class="minutes"></span>:<span class="seconds"></span>
            </div>
        </div>
        <?php if (isset($data[$promotion['promotion_id']]['products'])) { ?>
            <div class="product-all">
                <div class="list grid">
                    <?php foreach ($data[$promotion['promotion_id']]['products'] as $product) { ?>
                        <div class="list-item">
                            <div class="list-content clearfix">
                                <div class="list-content-box">
                                    <?php
                                    $discount = 0;
                                    if ($product['price_market'] && $product['price_market'] > 0 && $product['price'] && $product['price'] > 0) {
                                        $discount = ClaProduct::getDiscount($product['price_market'], $product['price']);
                                    }
                                    if ($discount > 0) {
                                        ?>
                                        <span class="icon-km">-<?php echo $discount; ?>%</span>
                                    <?php } ?>
                                    <div class="hover-sp">
                                        <?php Yii::app()->controller->renderPartial('//partial/add_to_cart', array('pid' => $product['id'])); ?>
                                        <a href="<?php echo $product['link'] ?>" title="Xem chi tiết" class="a-btn-2 black">
                                            <span class="a-btn-2-text">xem chi tiết</span> 
                                        </a>
                                        <a href="<?php echo $product['link'] ?>" class="bg-sp"></a>
                                    </div>
                                    <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                        <div class="list-content-img">
                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's150_150/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="list-content-body">
                                        <h3 class="list-content-title">
                                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                        </h3>
                                        <div class="product-price-all clearfix">
                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                <div class="product-price">
                                                    <?php echo Yii::t('product', 'price'); ?>:
                                                    <?php echo $product['price_text']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
        ?>

        <script>
            (function (e) {
                e.fn.countdown = function (t, n) {
                    function i() {
                        eventDate = Date.parse(r.date) / 1e3;
                        currentDate = Math.floor(e.now() / 1e3);
                        if (eventDate <= currentDate) {
                            n.call(this);
                            clearInterval(interval)
                        }
                        seconds = eventDate - currentDate;

                        hours = Math.floor(seconds / 3600);
                        seconds -= hours * 60 * 60;
                        minutes = Math.floor(seconds / 60);
                        seconds -= minutes * 60;
                        hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
                        minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
                        seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
                        if (r["format"] == "on") {
                            hours = String(hours).length >= 2 ? hours : "0" + hours;
                            minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
                            seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
                        }
                        if (!isNaN(eventDate)) {
                            thisEl.find(".hours").text(hours);
                            thisEl.find(".minutes").text(minutes);
                            thisEl.find(".seconds").text(seconds)
                        } else {
                            alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
                            clearInterval(interval)
                        }
                    }
                    var thisEl = e(this);
                    var r = {
                        date: null,
                        format: null
                    };
                    t && e.extend(r, t);
                    i();
                    interval = setInterval(i, 1e3)
                }
            })(jQuery);
            $(document).ready(function () {
                function e() {
                    var e = new Date;
                    e.setDate(e.getDate() + 60);
                    dd = e.getDate();
                    mm = e.getMonth() + 1;
                    y = e.getFullYear();
                    futureFormattedDate = mm + "/" + dd + "/" + y;
                    return futureFormattedDate;
                }
                $("#countdown").countdown({
                    date: "<?php echo $time_end ?>",
                    format: "on"
                });
            });
        </script>

        <?php
    }
}
?>


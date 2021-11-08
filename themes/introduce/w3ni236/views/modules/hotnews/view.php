<?php if (count($hotnews)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="list-news">
            <div class="title">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php } ?>
        <div class="vticker">
            <ul>
                <?php foreach ($hotnews as $news) { ?>
                    <li>
                        <div class="box-img">
                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's250_250/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>" />
                            </a>
                        </div>
                        <div class="box-info">
                            <div class="title-news">
                                <h4>
                                    <a href="<?php echo $news['link'] ?>" title="<?php echo $news['news_title']; ?>">
                                        <?php echo $news['news_title']; ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="more-news">
                                <p><?php echo $news['news_sortdesc']; ?></p>
                            </div>
                        </div>


                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script type="text/javascript" src="<?= $themUrl ?>/js/jquery.easing.min.js"></script> 
    <script type="text/javascript" src="<?= $themUrl ?>/js/jquery.easy-ticker.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function () {
            var a = 4;
            if ($(window).width() < 1140) {
                var a = 3;
            }
            if ($(window).width() < 768) {
                var a = 4;
            }

            var dd = $('.vticker').easyTicker({
                direction: 'up',
                easing: 'easeInOutBack',
                speed: 'slow',
                interval: 4000,
                height: 'auto',
                visible: a,
                mousePause: 0,
                controls: {
                    up: '.up',
                    down: '.down',
                    toggle: '.toggle',
                    stopText: 'Stop !!!'
                }
            }).data('easyTicker');

            cc = 1;
            $('.aa').click(function () {
                $('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
                cc++;
            });

            $('.vis').click(function () {
                dd.options['visible'] = 3;

            });

            $('.visall').click(function () {
                dd.stop();
                dd.options['visible'] = 0;
                dd.start();
            });

        });
    </script>
    <?php if ($show_widget_title) { ?>
    </div>
<?php } ?>

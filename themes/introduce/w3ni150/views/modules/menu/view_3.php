<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first && $show_widget_title) { ?>
        <div class="panel panel-default menu-horizontal">
            <div class="panel-heading">
                <h3><?php echo $widget_title; ?></h3>
            </div>
            <div class="panel-body">
            <?php } ?>
            <?php if ($first) { ?>
                <div id="cssmenu"> 
                    <!--                    <div id="menu-line" style="width: 116px; left: 117.15625px;"></div>
                                        <div id="menu-button">Kim cương ngọc lan</div>-->
                    <ul>
                    <?php } else { ?>
                        <ul class="div-menu">
                        <?php } ?>
                        <?php
                        $i = 0;
                        foreach ($data as $menu_id => $menu) {
                            $i++;
                            $m_link = $menu['menu_link'];
                            ?>
                            <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>" >
                                <a href="<?php echo $m_link; ?>" <?php echo $menu['target']; ?> title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                                <?php if ($menu['items']) { ?>
                                <?php } ?>
                                <?php
                                $this->render($this->view, array(
                                    'data' => $menu['items'],
                                    'options' => array('parent' => $menu),
                                    'first' => false,
                                    'level' => $level + 1,
                                ));
                                ?>
                            </li>
                        <?php } ?>
                        <?php if ($level == 1 && $options['parent']['background_path'] && $options['parent']['background_name']) { ?>
                            <li class="background-menu-con">
                                <img src="<?php echo ClaHost::getImageHost() . $options['parent']['background_path'] . $options['parent']['background_name']; ?>" />
                            </li>
                        <?php } ?>
                    </ul>        
                <?php } ?>
                <?php if ($first) { ?>
            </div>
            <script type="text/javascript">
                (function ($) {

                    $.fn.menumaker = function (options) {

                        var cssmenu = $(this), settings = $.extend({
                            title: "Menu",
                            format: "dropdown",
                            sticky: false
                        }, options);

                        return this.each(function () {
                            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
                            $(this).find("#menu-button").on('click', function () {
                                $(this).toggleClass('menu-opened');
                                var mainmenu = $(this).next('ul');
                                if (mainmenu.hasClass('open')) {
                                    mainmenu.hide().removeClass('open');
                                }
                                else {
                                    mainmenu.show().addClass('open');
                                    if (settings.format === "dropdown") {
                                        mainmenu.find('ul').show();
                                    }
                                }
                            });

                            cssmenu.find('li ul').parent().addClass('has-sub');

                            multiTg = function () {
                                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                                cssmenu.find('.submenu-button').on('click', function () {
                                    $(this).toggleClass('submenu-opened');
                                    if ($(this).siblings('ul').hasClass('open')) {
                                        $(this).siblings('ul').removeClass('open').hide();
                                    }
                                    else {
                                        $(this).siblings('ul').addClass('open').show();
                                    }
                                });
                            };

                            if (settings.format === 'multitoggle')
                                multiTg();
                            else
                                cssmenu.addClass('dropdown');

                            if (settings.sticky === true)
                                cssmenu.css('position', 'fixed');

                            resizeFix = function () {
                                if ($(window).width() > 768) {
                                    cssmenu.find('ul').show();
                                }

                                if ($(window).width() <= 768) {
                                    cssmenu.find('ul').hide().removeClass('open');
                                }
                            };
                            resizeFix();
                            return $(window).on('resize', resizeFix);

                        });
                    };
                })(jQuery);

                (function ($) {
                    $(document).ready(function () {

                        $(document).ready(function () {
                            $("#cssmenu").menumaker({
                                title: "Menu",
                                format: "multitoggle"
                            });
                            var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

                            $("#cssmenu > ul > li").each(function () {
                                if ($(this).hasClass('active')) {
                                    activeElement = $(this);
                                    foundActive = true;
                                }
                            });

                            if (foundActive === false) {
                                activeElement = $("#cssmenu > ul > li").first();
                            }

                            defaultWidth = lineWidth = activeElement.width();

                            defaultPosition = linePosition = activeElement.position().left;

                            menuLine.css("width", lineWidth);
                            menuLine.css("left", linePosition);

                            $("#cssmenu > ul > li").hover(function () {
                                activeElement = $(this);
                                lineWidth = activeElement.width();
                                linePosition = activeElement.position().left;
                                menuLine.css("width", lineWidth);
                                menuLine.css("left", linePosition);
                            },
                                    function () {
                                        menuLine.css("left", defaultPosition);
                                        menuLine.css("width", defaultWidth);
                                    });

                        });


                    });
                })(jQuery);
            </script>
            <script>
                var container_first = jQuery('.container:first');
                var container_width_diamond = parseInt(container_first.outerWidth());
                if (container_width_diamond > 767) {
                    var sbmenu = 700;
                    jQuery(document).on('mouseover', '#cssmenu > ul > li', function () {
                        var thi = jQuery(this);
                        var _thiOfset = thi.offset();
                        if (_thiOfset.left + sbmenu > container_width_diamond + container_first.offset().left) {
                            thi.find('ul:first').css({'left': (container_width_diamond + container_first.offset().left - _thiOfset.left - sbmenu) + 'px'});
                        }
                    });
                }
            </script>
        <?php } ?>
        <?php if ($first && $show_widget_title) { ?>
        </div>
    </div>
<?php } ?>
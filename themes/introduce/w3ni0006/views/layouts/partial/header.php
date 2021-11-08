<div class="header" id="header">
    <div class="bg-top-logo">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div><!--end-box-LOGO-->
            <div class="box-language">
                <div class="language">
                    <style type="text/css">
                        <!--
                        a.gflag {vertical-align:middle;font-size:32px;padding:1px 0;background-repeat:no-repeat;background-image:url('<?php echo Yii::app()->baseUrl; ?>/images/flag/24.png');}
                        a.gflag img {border:0;}
                        a.gflag:hover {background-image:url('<?php echo Yii::app()->baseUrl; ?>/images/flag/24a.png');}
                        #goog-gt-tt {display:none !important;}
                        .goog-te-banner-frame {display:none !important;}
                        .goog-te-menu-value:hover {text-decoration:none !important;}
                        body {top:0 !important;}
                        #google_translate_element2 {display:none!important;}
                        -->
                    </style>
                    <div id="google_translate_element2"></div>
                    <script type="text/javascript">
                        function googleTranslateElementInit2() {
                            new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false}, 'google_translate_element2');
                        }
                    </script><script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
                    <script>
                        /* <![CDATA[ */
                        eval(function(p, a, c, k, e, r) {
                            e = function(c) {
                                return(c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                            };
                            if (!''.replace(/^/, String)) {
                                while (c--)
                                    r[e(c)] = k[c] || e(c);
                                k = [function(e) {
                                        return r[e]
                                    }];
                                e = function() {
                                    return'\\w+'
                                };
                                c = 1
                            }
                            ;
                            while (c--)
                                if (k[c])
                                    p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                            return p
                        }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
                        /* ]]> */</script>
                     <div class="vi">
                        <div class="icon-language"></div>
                        <a title="vi" class="language-item active" href="#" onclick="jQuery('.language-item').removeClass('active'); jQuery(this).addClass('active'); doGTranslate('vi|vi');
                    return false;">Vietnam</a>
                    </div>
                    <div class="eng">
                        <div class="icon-language"></div>
                        <a class="language-item" title="en" href="#" onclick="jQuery('.language-item').removeClass('active'); jQuery(this).addClass('active'); doGTranslate('vi|en');
                    return false;">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--end-bg-top-->

    <div class="bg-menu">
        <div class="container">
            <div class="menu-top clearfix">
                <div class="box-menu">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>    
                <div class="timkiem">
                    <div class="search-form">
                        <form method="get" action="<?php echo Yii::app()->createUrl('search/search/search') ?>" class="searchform">
                            <?php
                            $searchtext = 'Tìm kiếm...';
                            $skey = ClaSite::SEARCH_KEYWORD;
                            $keyword = Yii::app()->request->getParam($skey);
                            if (!$keyword)
                                $keyword = '';
                            ?>
                            <div class="clearfix">
                                <input type="text" value="<?php echo $keyword; ?>" name="<?php echo $skey; ?>" placeholder="<?php echo $searchtext; ?>" class="svalue box-search">
                                <input type="submit" class="btnsearch" value="">
                            </div>
                            <script>
                                jQuery(document).ready(function() {
                                    jQuery(document).on('submit', '.searchform', function() {
                                        var sv = jQuery(this).find('.svalue').val();
                                        if (sv == '' || sv.length < 2) {
                                            alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
                                            return false;
                                        }
                                    });
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
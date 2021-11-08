<div class="header">
    <div class="bg-box-top">
        <div class="box-top ">
            <div class="container clearfix">
           
				<div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
                <div class="header-r">
                    <div class="right-bg-top">        
						<div class="language">
							<ul>
								<li id="language"><a class="gflag nturl" href="#" onclick="doGTranslate('vi|en');
												return false;" style="background-position:-0px -0px;" title="English"><img alt="English" height="18" src="images/flag/blank.png" width="32" /></a><a class="gflag nturl" href="#" onclick="doGTranslate('vi|vi');
														return false;" style="background-position:-200px -400px;" title="Vietnamese"><img alt="Vietnamese" height="18" src="images/flag/blank.png" width="32" /></a>
													<a class="gflag nturl" href="#" onclick="doGTranslate('vi|lo');
												return false;" style="line-height: 20.8px; background-position: 0px -500px;" title="thái Lan">
												<img alt="Laos" height="18" src="images/flag/blank.png" width="32" /></a>
								<style type="text/css"><!--
											a.gflag {vertical-align:middle;font-size:18px;padding:1px 0;background-repeat:no-repeat;background-image:url('images/flag/24.png');}
											a.gflag img {border:0;}
											a.gflag:hover {background-image:url('images/flag/24a.png');}
											#goog-gt-tt {display:none !important;}
											.goog-te-banner-frame {display:none !important;}
											.goog-te-menu-value:hover {text-decoration:none !important;}
											body {top:0 !important;}
											#google_translate_element2 {display:none!important;}
											-->
								</style>
								<div id="google_translate_element2">&nbsp;</div>
								<script type="text/javascript">
											function googleTranslateElementInit2() {
												new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false}, 'google_translate_element2');
											}
										</script><script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script> <script>
											/* <![CDATA[ */
							eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
							/* ]]> */</script></li>
							</ul>
							</div>


                        <div class="box-phone clearfix">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
                            ?>
                        </div><!--end-phone--> 
                    </div>
                    <div class="box-right clearfix">
                        
						<p><img alt="" src="/data/media/1007//images/hotline5.png" style="width: 700px; height: 89px;margin-top: 8px;"></p>
                    </div>
                </div>
            </div>      
            <div class="box-menu">
                <div class="container">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
                <!--end-container--> 
            </div><!--end-box-menu--> 
        </div><!--end-container-->                                                                                                                        
    </div>    <!--end-box-top-->
    <!--end-bg-box-top-->
	<div id="holderCMS">
		<div class="banner-top">
			<?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
			?>
		</div>
	</div>
</div>
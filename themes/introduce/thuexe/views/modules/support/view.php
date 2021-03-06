<?php
if ($data && count($data)) {
    ?>
    <div class="social clearfix">
        <?php
        $i = 0;
        foreach ($data as $support) {
            $i++;
            if ($i > $limit)
                break;
            Yii::app()->controller->renderPartial('//modules/support/type_' . $support['type'], array('data' => $support));
        }
        ?>
    </div>
	
				<!-- BEGIN .topbar-right -->
				<div class="topbar-right clearfix">		
				<div class="language">
					<ul>
					<li id="language">
									<a class="gflag nturl" href="#" onclick="doGTranslate('vi|vi');
											return false;" style="background-position:-200px -400px;" title="Vietnamese">
											<img alt="Vietnamese" height="18" src="images/flag/blank.png" width="32"></a>
									<a class="gflag nturl" href="#" onclick="doGTranslate('vi|en');return false;" 
											style="background-position:-0px -0px;" title="English">
										<img alt="English" height="18" src="images/flag/blank.png" width="32">
									</a>
									<a class="gflag nturl" href="#" onclick="doGTranslate('vi|zh-CN');return false;" 
											style="background-position:-300px -0px;" title="Chinese">
										<img alt="English" height="18" src="images/flag/blank.png" width="32">
									</a>
									
									
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
					<div id="google_translate_element2">&nbsp;<div class="skiptranslate goog-te-gadget" dir="ltr">
					<div id=":0.targetLanguage"><select class="goog-te-combo"><option value="">Ch???n Ng??n ng???</option><option value="eo">Qu???c t??? ng???</option>
					<option value="ar">Ti???ng ??? R???p</option><option value="sq">Ti???ng Albania</option>
					<option value="am">Ti???ng Amharic</option><option value="en">Ti???ng Anh</option>
					<option value="hy">Ti???ng Armenia</option><option value="az">Ti???ng Azerbaijan</option>
					<option value="pl">Ti???ng Ba Lan</option><option value="fa">Ti???ng Ba T??</option>
					<option value="xh">Ti????ng Bantu</option><option value="eu">Ti???ng Basque</option>
					<option value="be">Ti???ng Belarus</option><option value="bn">Ti???ng Bengal</option>
					<option value="bs">Ti???ng Bosnia</option><option value="pt">Ti???ng B??? ????o Nha</option>
					<option value="bg">Ti???ng Bulgaria</option><option value="ca">Ti???ng Catalan</option>
					<option value="ceb">Ti???ng Cebuano</option><option value="ny">Ti???ng Chichewa</option>
					<option value="co">Ti???ng Corsi</option><option value="ht">Ti???ng Creole ??? Haiti</option>
					<option value="hr">Ti???ng Croatia</option><option value="iw">Ti???ng Do Th??i</option>
					<option value="da">Ti???ng ??an M???ch</option><option value="de">Ti???ng ?????c</option>
					<option value="et">Ti???ng Estonia</option><option value="tl">Ti???ng Filipino</option>
					<option value="fy">Ti???ng Frisia</option><option value="gd">Ti???ng Gael Scotland</option>
					<option value="gl">Ti???ng Galicia</option><option value="ka">Ti????ng George</option>
					<option value="gu">Ti???ng Gujarat</option><option value="nl">Ti???ng H?? Lan</option>
					<option value="af">Ti???ng H?? Lan (Nam Phi)</option><option value="ko">Ti???ng H??n</option>
					<option value="ha">Ti???ng Hausa</option><option value="haw">Ti???ng Hawaii</option>
					<option value="hi">Ti???ng Hindi</option><option value="hmn">Ti???ng Hmong</option>
					<option value="hu">Ti???ng Hungary</option><option value="el">Ti???ng Hy L???p</option>
					<option value="is">Ti???ng Iceland</option><option value="ig">Ti???ng Igbo</option>
					<option value="id">Ti???ng Indonesia</option><option value="ga">Ti???ng Ireland</option>
					<option value="jw">Ti???ng Java</option><option value="kn">Ti???ng Kannada</option>
					<option value="kk">Ti???ng Kazakh</option><option value="km">Ti???ng Khmer</option>
					<option value="ku">Ti???ng Kurd</option><option value="ky">Ti???ng Kyrgyz</option>
					<option value="lo">Ti???ng L??o</option><option value="la">Ti???ng Latinh</option>
					<option value="lv">Ti???ng Latvia</option><option value="lt">Ti???ng Litva</option>
					<option value="lb">Ti???ng Luxembourg</option><option value="ms">Ti???ng M?? Lai</option>
					<option value="mk">Ti???ng Macedonia</option><option value="mg">Ti???ng Malagasy</option>
					<option value="ml">Ti???ng Malayalam</option><option value="mt">Ti???ng Malta</option>
					<option value="mi">Ti???ng Maori</option><option value="mr">Ti???ng Marathi</option>
					<option value="mn">Ti???ng M??ng C???</option><option value="my">Ti???ng Myanmar</option>
					<option value="no">Ti???ng Na Uy</option><option value="ne">Ti???ng Nepal</option>
					<option value="ru">Ti???ng Nga</option><option value="ja">Ti???ng Nh???t</option>
					<option value="ps">Ti???ng Pashto</option><option value="fr">Ti???ng Ph??p</option>
					<option value="fi">Ti???ng Ph???n Lan</option><option value="pa">Ti???ng Punjab</option>
					<option value="ro">Ti???ng Rumani</option><option value="sm">Ti???ng Samoa</option>
					<option value="cs">Ti???ng S??c</option><option value="sr">Ti???ng Serbia</option>
					<option value="st">Ti???ng Sesotho</option><option value="sn">Ti???ng Shona</option>
					<option value="sd">Ti???ng Sindhi</option><option value="si">Ti???ng Sinhala</option>
					<option value="sk">Ti???ng Slovak</option><option value="sl">Ti???ng Slovenia</option>
					<option value="so">Ti???ng Somali</option><option value="su">Ti???ng Sunda</option>
					<option value="sw">Ti???ng Swahili</option><option value="tg">Ti???ng Tajik</option>
					<option value="ta">Ti???ng Tamil</option><option value="es">Ti???ng T??y Ban Nha</option>
					<option value="te">Ti???ng Telugu</option><option value="th">Ti???ng Th??i</option>
					<option value="tr">Ti???ng Th??? Nh?? K???</option><option value="sv">Ti???ng Th???y ??i???n</option>
					<option value="zh-CN">Ti???ng Trung (Gia??n Th????)</option>
					<option value="zh-TW">Ti???ng Trung (Ph???n th???)</option>
					<option value="uk">Ti???ng Ukraina</option><option value="ur">Ti???ng Urdu</option><option value="uz">Ti???ng Uzbek</option><option value="cy">Ti???ng X??? Wales</option><option value="it">Ti???ng ??</option><option value="yi">Ti???ng Yiddish</option><option value="yo">Ti???ng Yoruba</option><option value="zu">Ti???ng Zulu</option></select></div>???????c h??? tr??? b???i <span style="white-space:nowrap"><a class="goog-logo-link" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px">D???ch</a></span></div></div>
					<script type="text/javascript">
						function googleTranslateElementInit2() {
							new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false}, 'google_translate_element2');
						}
						</script>
						<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
						<script>
									/* <![CDATA[ */
					eval(function(p,a,c,k,e,r){e=function(c){
						return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};
						if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);
						k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};
						while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
					/* ]]> */</script></li>
					</ul>
				</div>						
				<!-- END .topbar-right -->
				</div>			
			<!-- END #topbar-right -->
		
<?php } ?>

<div id="footer" class="footer">
    <div class="container clearfix">

        <div class="row">
			
            <div class="footer-nd col-sm-9 footercontent">
				<div class="company">
					<p>XE HÀ TĨNH</p>
				</div>
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
				<div class="col-sm-4 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
				</div>
            </div>
			
            <div class="footer-nd col-sm-3">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>
    </div>
</div>
<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );
var ga = document.createElement('script'); ga.type = 'text/javascript';ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=b2afde9c558f88608a26e673e1355714&data=eyJzc29faWQiOjQxNTE3OTMsImhhc2giOiIzZWVlYmQwZWYzZWJjMjg1MDhjYjNhMjVkN2RmNTUyYyJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>	
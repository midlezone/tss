<div class="footer" class="clearfix">
    <div class="bottom-footer clearfix">
        <div class="container">
            <div class="col-sm-4 box-footer">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
            </div>
            <div class="col-sm-4 bantin">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1));
                ?>
            </div>
            <div class="col-sm-4 facebook">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK2));
                ?>
            </div>
        </div>

    </div>
    <div class="footer-f clearfix">
        <div class="container">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
            ?>
        </div>
    </div>
</div>
<div class="bar-fixed-bottom device-pc-show">
	<div class="tag-red">
		<span>Hotline</span>
		<span class="tag-arrow-right"></span>
	</div>
	<div class="hotline-content">
		<ul>
			<li>
				<span class="red-dark">Văn phòng:</span>
				<span class="text-df">0396.567.888</span>
			</li>
			<li>
				<span class="red-dark">Đặt Tour:</span>
				<span class="text-df">Mr. Trình: 0934.289.777</span>
            </li>
            <li> 
                <span class="text-df">Mr. Doãn: 0934.888.168</span>
			</li>
			
			<li>			
				
			</li>
		</ul>
	</div>

	<!--Translate-->
	<div id="google_translate_element"></div>
	<div class="clear"></div>
</div>


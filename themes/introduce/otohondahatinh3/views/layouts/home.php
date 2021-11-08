<?php $this->beginContent('//layouts/main'); ?>
<?php echo $content; ?>
<div class="home-hotline">
	<div class="container">
		<span class="left2">Hotline kinh doanh (24/7) 0974.770.735</span>
		<span class="right2">Hotline dịch vụ (24/7) 0915.955.677</span>
	</div>
</div>
<div class="general">
    <div class="container">
        <div class="row">
            <div class="home-new">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                ?>
				 <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                ?>
            </div>
            
        </div>
    </div>
</div>


<?php
$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK3));
?>
<div id="support">
				<div class="container">
					<div class="heading">
						<h2>Thông tin hỗ trợ</h2>
						<h3>Gọi để được tư vấn về sản phẩm, dịch vụ:</h3>
					</div>
					<ul class="list">
						<li class="item">
							<img src="/themes/introduce/otohondahatinh/css/img/support-icon-1.png">
							<h4>0974.770.735</h4>
						</li>
						<li class="item">
							<img src="/themes/introduce/otohondahatinh/css/img/support-icon-2.png">
							<h4>0915.955.677</h4>
						</li>
						<li class="item">
							<img src="/themes/introduce/otohondahatinh/css/img/support-icon-3.png">
							<h4>thuyluc91.ht@gmail.com</h4>
						</li>
					</ul>
					<p class="time">Showroom mở cửa từ Thứ Hai đến Chủ Nhật - Từ 8h Đến 19h</p>
					<ul class="list-icon">
						<li><a href="http://www.facebook.com/hondaotovinh.99"><img src="/themes/introduce/otohondahatinh/css/img/i-f.png" alt="icon facebook"></a></li>
						<li><a href="mailto:thuykd@gmail.com"><img src="/themes/introduce/otohondahatinh/css/img/i-m.png" alt="icon email"></a></li>
						<li><a href="/lien-he"><img src="/themes/introduce/otohondahatinh/css/img/i-l.png" alt="icon địa điểm"></a></li>
					</ul>
				</div>
</div>

<?php $this->endContent(); ?>
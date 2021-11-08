<div class="welcome well animated fadeOutDown"  data-sb="fadeInDown" data-sb-hide="fadeOutDown">
    <div class="container">
       <div class="layout-content layout1-content clearfix">
		<div class="content-m">
			<div class="introduce-index-content clearfix">
				<div class="row">
					<div class="col-intro col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="box-image">
							<a title=" <?php echo $data['title'] ?>" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
								<img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . 's500_0/' . $data['image_name']; ?>" alt="Về chúng tôi">
							</a>
						</div>
					</div>
					<div class="col-intro col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="title-m">
							<h2>
								<a title="<?php echo $data['title'] ?>" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
									<?php echo $data['title'] ?></a>
							</h2>
						</div>
						<div class="description"><?php echo nl2br($data['sortdesc']); ?></div>
						<div class="view-all">
							<a title="<?php echo $data['title'] ?>" href="<?php echo Yii::app()->createUrl('/site/site/introduce'); ?>">
								<?php echo Yii::t('common', 'detail'); ?></a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
    </div>
</div>


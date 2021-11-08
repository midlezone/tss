<?php if (isset($data) && count($data)) { ?>

    <div class="post">
        <div class="container">
            <div class="row">
			
                <?php foreach ($data as $cat) { ?>
                    <div class="col-xs-4 well animated fadeOutDown sb-effect-displayed fadeInDown" data-sb="fadeInDown" data-sb-hide="fadeOutDown" style="opacity: 1;">
                        <div class="box-all-nd">
                            <div class="box-nd">
                                <div class="nd-nd clearfix">
                                    
									<?php if ($cat['cat_id'] == '5029'): ?>
										<div class="img-box-nd1">
											<div class="img-box">
												<a class="bg-lv"></a>
													<a href="<?php echo $cat['link'] ?>" class="xemnhanh"></a>
													<a class="each notranslate" href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">e
												</a>
												<div id="earth"></div>


                                        </div>
                                    </div>
									<?php else: ?>
										<?php echo Yii::app()->baseUrl ?>
										<div class="img-box-nd">
											<div class="img-box">
												<a class="bg-lv"></a>

													<?php if ($cat['cat_id'] == '5027'): ?>
														<a  target="_blank" href="http://gianghang.jujube.com.vn/" class="xemnhanh1"></a>
													<?php else: ?>
														<a href="<?php echo $cat['link'] ?>" class="xemnhanh"></a>

													<?php endif; ?>
													<a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">
													<img src="<?php echo ClaHost::getImageHost() . $cat['image_path'] . 's250_250/' . $cat['image_name'] ?>">
													</a>
											</div>
										</div>
									<?php endif; ?>
                                    <div class="header-panel">
									<?php if ($cat['cat_id'] == '5027'): ?>
                                        <a target="_blank" href="http://gianghang.jujube.com.vn/">
                                            <h3><?php echo $cat['cat_name']; ?></h3>
                                        </a> 
									<?php else: ?>
										<a href="<?php echo $cat['link'] ?>" >
                                            <h3><?php echo $cat['cat_name']; ?></h3>
                                        </a> 
									<?php endif; ?>

                                    </div>
                                    <p><?php ?></p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}
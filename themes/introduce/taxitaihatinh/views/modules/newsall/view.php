
<div class="layout layout4 news-video clearfix">
            <div class="container">
                <div class="layout-content layout4-content clearfix">
                    <div class="title-m">
                        <h2>
                            <a href="javascript:void(0)" title="#">Tin tức</a>
                        </h2>
                    </div>
                    <div class="content-m">
                        <div class="news-video-content clearfix">
                            <div class="row">
							<?php foreach ($news as $ne) { ?>
                                <div class="col-xs-4">																
								<div class="box-col-new">
									<div class="row">
											<div class="col-box-col-new">
												<div class="col-new-content">
													<div class="box-img">
														
														  <a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>">
															<img class="img-zoom"  src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name'] ?>" alt="" style="opacity: 1;"></a>
													</div>
													<div class="box-info">
														<h3>
															<a href="<?php echo Yii::app()->createUrl('news/news/detail', array('id' => $ne['news_id'], 'alias' => $ne['alias'])) ?>"><?php echo $ne['news_title'] ?></a>
														</h3>
														<div class="date">
															<img src="/themes/introduce/koji/css/img/icon_calender.png" alt="calender" title="calender">
															<span><?php echo date('d-m-Y H:i:s',$ne['publicdate']) ?></span>
														</div>
														<div class="description">
															 <?php echo $ne['news_sortdesc'] ?>... </div>
													</div>
												</div>
											</div>
													  
									</div>
								</div>
                                </div>
							<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
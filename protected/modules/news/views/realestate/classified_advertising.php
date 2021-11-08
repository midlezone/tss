
<div class="clearfix layout layout-2">
    <div id="leftCol">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
    </div>
    <div id="contentCol">
        <div class="banner-top">
          <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        </div>
        <div id="centerCol">
            <div class="centerContent sa">
					 <?php
						$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
						?>
						<div class="wrep">
							<div id="pageTitle2">
									<div id="title" style="padding-top: 5px; text-transform: uppercase;">Sàn Nam Phát</div>
							</div>
							<table border="0" cellpadding="2" cellspacing="1" width="588">
								<tbody>
								
											  <tr>
												<td  align="left" valign="top" width="100%">
												<!--  list can giao dich -->
												 <table bgcolor="#afd0ef" width="100%" border="0" cellpadding="0" cellspacing="1" height="90">
													<tbody>
													  <?php foreach ($realestates as $realestate) { ?>
															<tr height="20">
																  <td rowspan="2" align="center" valign="middle" bgcolor="#f7fbfc" width="90"><a href="" target="_blank"><img src="<?php echo ClaHost::getImageHost() . $realestate['image_path'] . 's200_200/' . $realestate['image_name'] ?>" width="90" height="90" alt="<?php echo $realestate['name'] ?>" border="0"></a>
																  </td>
																	<td colspan="2" bgcolor="#f7fbfc" class="title_news_home" style="padding-left:1px; padding-top:2px;">
																	<a href="<?php echo $realestate['link'] ?>" target=""><?php echo $realestate['name'] ?></a></td>
															</tr>
															 <tr>
																<td bgcolor="#f7fbfc" width="140">
																	<p align="center" class="text_bold">
																	<span><b>Mã tin</b> : </span><span class="luotxem_yelown"><?php echo $realestate['code'] ?></span><br><br>
																   
																	<span id="price" class="price"><b><?php echo $realestate['price']; ?>
																	<span class="luotxem_yelown">Tỷ  VND</span></b></span></p>
																</td>
																<td bgcolor="#f7fbfc" width="300" align="left" style="padding-left:0px;" class="text_comon">
																	<table width="100%" border="0" cellpadding="0" cellspacing="0" background="">
																			
																			<tbody>
																			<tr>
																				<td height="45" align="left" valign="top"><a href="detail_house.php?id=17057" target="_blank"></a><br><?php echo $realestate['name']?><br>Diện tích: 0 m<sup>2</sup><br>Ngày đăng : <b> 18/08/16</b></td>
																			  </tr>																
																		</tbody>
																	</table>
																</td>
															  </tr>

															  <tr><td colspan="4" height="10" bgcolor="#f7fbfc"></td></tr>
														<?php } ?>
													</tbody>
													
												</table>

												<!--  list can giao dich -->
												</td>
											  </tr>
								
								</tbody>
							</table>
							<div class='product-page'>
								 <?php
									$this->widget('common.extensions.LinkPager.LinkPager', array(
										'itemCount' => $totalitem,
										'pageSize' => $limit,
										'header' => '',
										'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
										'selectedPageCssClass' => 'active',
									));
								?>
							</div>
						</div>
               
            </div>
        </div>
    </div>
</div>
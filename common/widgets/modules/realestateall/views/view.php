<?php if (isset($list_realestate) && count($list_realestate)) { ?>

    <div class="wrep">
		<div id="pageTitle2">
		    <div id="title" style="padding-top: 5px; text-transform: uppercase;">Sàn Nam Phát</div>
		</div>
		<table style="border: 0px solid rgb(197, 213, 231);" border="0" cellpadding="2" cellspacing="1" width="610">
			<tbody>
				<tr>
					<td style="padding-left: 5px;" align="left" valign="top" width="50%">
						<!--  danh sách 2 tin mới nhất -->
						<table bgcolor="#fff" border="0" cellpadding="0" cellspacing="1" width="98%">
							<tbody>
								<tr>
									<td>
									 <?php foreach ($list_realestate as $realestate) { ?>
										<div style="width: 288px; border:1px solid rgb(197, 213, 231); margin: 2px; float:left;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												 <tbody>
													  <tr>
														<td rowspan="2" bgcolor="#f7fbfc" style="padding:5px;">
														 <?php if ($realestate['image_path'] && $realestate['image_name']) { ?>
															<a  class="img_home" href="<?php echo $realestate['link'] ?>" >
															<img src="<?php echo ClaHost::getImageHost() . $realestate['image_path'] . 's200_200/' . $realestate['image_name'] ?>" alt="<?php echo $realestate['name'] ?>" border="0" width="60" height="60">
															</a>
														  <?php } ?>
														</td>
														<td bgcolor="#f7fbfc" style="padding:5px;">
														  <?php if(strlen($realestate['name']) > 60):?>
															<?php  $realestate['name'] = substr($realestate['name'], 0, 60).'...';  ?>
														  <?php endif; ?>
															<a href="<?php echo $realestate['link'] ?>"><?php echo $realestate['name'] ?></a>															
														</td>
													  </tr>
													  <tr>
													<td bgcolor="#f7fbfc" style="padding:5px;"> <label><?php echo Yii::t('realestate', 'area') ?></label>: 
														<?php if ($realestate['area']) { ?>
															<span><?php echo $realestate['area'] ?>m2</span>
														<?php } else { ?>
															<span><?php echo Yii::t('realestate', 'waiting_update') ?></span>
														<?php } ?><br>
														<b><?php echo Yii::t('product', 'price') ?></b>
														<?php if ($realestate['price']) { ?>
															<span><?php echo $realestate['price'] . ' ' . $unit_price[$realestate['unit_price']]; ?></span>
														<?php } else { ?>
															<span><?php echo Yii::t('realestate', 'waiting_update') ?></span>
														<?php } ?>
														</td>
													</tr>
													

												</tbody>
											</table>
										</div>					
					
									<?php } ?>
							
									  </td>
								</tr>

							</tbody>
						</table>
				<!--  danh sách 2 tin mới nhất -->
				</td>
			  </tr>
			</tbody>
	</table>
	<!-- 
    <div class='product-page'>
        // <?php
        // $this->widget('common.extensions.LinkPager.LinkPager', array(
            // 'itemCount' => $totalitem,
            // 'pageSize' => $limit,
            // 'header' => '',
            // 'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
            // 'selectedPageCssClass' => 'active',
        // ));
        // ?>
    </div>
	 -->
    </div>
  

<?php } ?>
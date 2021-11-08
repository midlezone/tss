<div class="search-listnews sa">
    <div class="search-result">
        <p class="textreport" style="text-align:center;font-size:16px;color:red">Có <?php echo $totalitem ?> kết quả tìm kiếm</p>
    </div>
    <div class="list">
        <?php if (count($data)) { ?>
				<div class="wrep">				
					<table border="0" cellpadding="2" cellspacing="1" width="820">
						<tbody>
						
									  <tr>
										<td  align="left" valign="top" width="100%">
										<!--  list can giao dich -->
										 <table bgcolor="#afd0ef" width="100%" border="0" cellpadding="0" cellspacing="1" height="90">
											<tbody>
											  <?php foreach ($data as $realestate) { ?>
													<tr height="20">
														  <td rowspan="2" align="center" valign="middle" bgcolor="" width="90"><a href="" target="_blank"><img src="<?php echo ClaHost::getImageHost() . $realestate['image_path'] . 's200_200/' . $realestate['image_name'] ?>" width="90" height="90" alt="<?php echo $realestate['name'] ?>" border="0"></a>
														  </td>
															<td colspan="2" bgcolor="" class="title_news_home" style="padding-left:1px; padding-top:2px;">
															<a href="<?php echo $realestate['link'] ?>" target=""><?php echo $realestate['name'] ?></a></td>
													</tr>
													 <tr>
														<td bgcolor="" width="140">
															<p align="center" class="text_bold">
															<span><b>Mã tin</b> : </span><span class="luotxem_yelown"><?php echo $realestate['code'] ?></span><br><br>
														   
															<span id="price" class="price"><b><?php echo $realestate['price']; ?>
															<span class="luotxem_yelown">Tỷ  VND</span></b></span></p>
														</td>
														<td bgcolor="" width="300" align="left" style="padding-left:0px;" class="text_comon">
															<table width="100%" border="0" cellpadding="0" cellspacing="0" background="">
																	
																	<tbody>
																	<tr>
																		<td height="45" align="left" valign="top"><a href="detail_house.php?id=17057" target="_blank"></a><br><?php echo $realestate['name']?><br>Diện tích: 0 m<sup>2</sup><br>Ngày đăng : <b> 18/08/16</b></td>
																	  </tr>																
																</tbody>
															</table>
														</td>
													  </tr>

													  <tr><td colspan="4" height="10" bgcolor=""></td></tr>
												<?php } ?>
											</tbody>
											
										</table>

										<!--  list can giao dich -->
										</td>
									  </tr>
						
						</tbody>
					</table>
					<div class="wpager">
						<?php
						$this->widget('common.extensions.LinkPager.LinkPager', array(
							'itemCount' => $totalitem,
							'pageSize' => $limit,
							'header' => '',
							'selectedPageCssClass' => 'active',
						));
						?>
					</div>					
				</div>
        <?php } ?>
    </div>
   
</div>

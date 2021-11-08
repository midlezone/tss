<div class="timkiem">   
		<div id="search_index">
		<div class="menu_ngang_ab_searchbooking" style="">
				<!--mod_searchbooking_simple-->
				<div class="mod_searchbooking_simple after">
					<form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
						<div class="form_search content_1088">
							<div id="search-home" class="search-home-1">
								<!-- Search in homepage -->
								<div class="content">
								<h2 class="section-title"><i class="icon-search4"></i> Bạn muốn đi du lịch ở đâu?</h2>
								<p style="text-align:left;">Rất nhiều tour trong nước và nước ngoài cùng với những ưu đãi hấp dẫn đang chờ đón bạn</p>
								<div class="form-wrap">
									<div class="form-group search-startplace">
										<label for="">Khởi hành từ:</label>
										<select id="danhmuctour" name="<?php echo $keyName; ?>">
														<option value="Hà Tĩnh">-- --Hà Tĩnh</option>
														<option value="Vinh">-- --Vinh</option>
														
										</select>
									</div>
								   <div class="form-group search-input">
										<label for="">Bạn muốn đi du lịch đến:</label>
									<select id="danhmuctour" name="<?php echo $keyName; ?>">
											<option style="font-weight:bold" value="Du lịch trong nước">-- Du lịch trong nước</option>												
													<option value="Đà Nẵng">-- -- Du lịch Đà Nẵng</option>													
													<option value="Hà Nội">-- -- Du lịch Hà Nội</option>
													<option value="Nha Trang">-- -- Du lịch Nha Trang</option>
													<option value="Đà Lạt">-- -- Du lịch Đà Lạt</option>
													<option value="Sài Gòn">-- -- Du lịch Sài Gòn</option>
													<option value="Phú Quốc">-- -- Du lịch Phú Quốc</option>
													<option value="Hải Phòng">-- -- Du lịch Hải Phòng</option>
													<option value="Ninh Bình">-- -- Du lịch Ninh Bình</option>
													<option value="Vinh">-- -- Du lịch Vinh</option>
													<option value="Hà Tĩnh">-- -- Du lịch Hà Tĩnh</option>
													<option value="Quảng Bình">-- -- Du lịch Quảng Bình</option>
													<option value="Nha Trang">-- -- Du lịch Nha Trang</option>												
												<option  style="font-weight:bold" value="Du lịch quốc tế">-- Du lịch quốc tế</option>
													<option value="Thái Lan">-- -- Du lịch Thái Lan</option>
													<option value="Trung Quốc">-- -- Du lịch Trung Quốc</option>
													<option value="Nhật Bản">-- -- Du lịch Nhật Bản</option>
													<option value="Lào">-- -- Du lịch Lào</option>
													<option value="Malaysia">-- -- Du lịch Malaysia</option>
													<option value="Mỹ">-- -- Du lịch Mỹ</option>												
											</select>
									</div>
									
									<button id="submitSearch" type="submit" class="btn btn-submit">Tìm tour</button>
								</div>
							 </div>
						  </div>
						<!-- /Search in homepage -->
						</div>
					</form>
				</div>
			</div>
			<script type="text/javascript">
						jQuery(document).ready(function (){
							$(".menu_menu #seach_in_menu_ngang").click(function() {
								$(".menu_menu .menu_ngang_ab_searchbooking").toggle();
							});
						});
					</script>
					<script>
						jQuery(document).ready(function () {
							var transitionStyle = '';
							var navStyle = '';
							var isTouch = '';
							var transType = '';
							jQuery('.switch_options').each(function () {
								//This object
								var obj = jQuery(this);
								//var enb    = obj.children('.switch_enable'); //cache first element, this is equal to ON
								//var dsb    = obj.children('.switch_disable'); //cache disabled element
								var sw_item = obj.children('.sw_item');
								var sw_all = obj.children('.sw_all');
								var sw_hcm = obj.children('.sw_hcm');
								var sw_hn = obj.children('.sw_hn');
								var input = obj.children('input'); //cache the element where we must set the value
								var input_val = obj.children('input').val(); //cache the element where we must set the value
								/* Check selected */
								if ('Hà Nội - TP HCM' == input_val) {
									sw_all.addClass('selected');
								}
								else if ('TP HCM' == input_val) {
									sw_hcm.addClass('selected');
								}
								else {
									sw_hn.addClass('selected');
								}
								sw_item.on('click', function (i, e) {
									if (!$(this).hasClass('selected')) {
										$(sw_item).removeClass('selected');
										$(this).addClass('selected');
										// $(input).val(1).change();
										switch (true) {
											case ($(this).is('[class*="sw_all"]')):
												input_val = 'Hà Nội - TP HCM';
												break;
											case ($(this).is('[class*="sw_hcm"]')):
												input_val = 'TP HCM';
												break;
											case ($(this).is('[class*="sw_hn"]')):
												input_val = 'Hà Nội';
												break;
										}
										input.val(input_val);
									}
								});
							});
						});
					</script>		
		</div>
</div>

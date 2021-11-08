
		<div class="search-home">
	   <div class="container">
		  <div class="row">
			 <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-xs-12">
				<form method="<?php echo $method; ?>" action="<?php echo $action; ?>"  id="searchForm">
				   <div class="input-group">
					  <input type="text" name="<?php echo $keyName; ?>" autocomplete="off" value="<?php echo $keyWord; ?>" class="search-query form-control" placeholder="Search...">
					  <i class="fa fa-map-marker"></i>
					  <input id="searchDate" type="hidden" name="from_date" placeholder="Khởi hành từ...">
					  <select class="slb" name="q">
                              <option value="">-- Điểm khởi hành --</option>
							  <option value="383">-- Hà Nội--</option>
							  <option value="383">-- Hồ Chí Minh --</option>
							  <option value="383">-- Đà Nẵng --</option>
							  <option value="383">-- Vinh --</option>
                              <option value="383">-- Hà Tĩnh --</option>
                      </select>
					  <span class="input-group-btn">
					  <input type="submit" class="btnFind mr10" value="Tìm Tour">

					  </span>
				   </div>
				</form>
			 </div>
		  </div>
	   </div>
	</div>
	

<div class="boxTourList">
   <div class="row">
      <div class="box-js-top">
         <div class="col5551">
            <form id="findSearch" method="<?php echo $method; ?>" action="<?php echo $action; ?>">
               <div class="findBoxTours" id="box_01">
                  <input type="hidden" name="tour_type_id" value="1"> <input type="hidden" name="hid_s" value="hid_s"> 
                  <h2 class="title"><a href="/du-lich-trong-nuoc" title="Du lịch trong nước">Tìm Kiếm Tour</a></h2>
                  <div class="wrap">
                     <div class="col278 fl">
                        <div class="line">
                           <label class="label1">Điểm khởi hành</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:168px">
                              <option value="">-- Điểm khởi hành --</option>
                              <option value="383">-- Hà Tĩnh --</option>
                           </select>
                        </div>
                        <div class="line">
                           <label class="label1">Thời gian</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:168px">
                              <option value="">-- select --</option>
                              <option value="1-0">Full day</option>
                              <option value="2-1">2 days / 1 night</option>
                              <option value="3-2">3 days / 2 nights</option>
                              <option value="4-3">4 days / 3 nights</option>
                              <option value="5-4">5 days / 4 nights</option>
                           </select>
                        </div>
                        <div class="line">
                           <label class="label1">Giá (VNÐ)</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:168px">
                              <option value="">-- Giá --</option>
                              <option value="9">-- Dưới 3 triệu --</option>
                              <option value="10">-- 3-7 triệu --</option>
                              <option value="11">-- 7-12 triệu --</option>
                              <option value="12">-- 12-15 triệu --</option>
                              <option value="13">-- 15-18 triệu --</option>
                              <option value="14">-- 18-22 triệu --</option>
                              <option value="15">-- 22-32 triệu --</option>
                              <option value="16">-- Trên 32 triệu --</option>
                           </select>
                        </div>
						<div class="line">
                           <label class="label2">Điểm đến</label> 
                           <select class="slb" style="width:162px" name="<?php echo $keyName; ?>">
                              <option value="">-- Lựa chọn --</option>
                              <option value="371">Bạc Liêu</option>
                              <option value="380">Cà Mau</option>
                              <option value="381">Cao Bằng</option>
                              <option value="382">Cần Thơ</option>
                              <option value="383">Đà Nẵng</option>
                              <option value="395">Hải Phòng</option>
                              <option value="400">Khánh Hòa</option>
                              <option value="401">Kiên Giang</option>
                              <option value="404">Lào Cai - Sapa</option>
                              <option value="406">Lâm Đồng</option>
                              <option value="409">Nghệ An</option>
                              <option value="412">Phú Thọ</option>
                              <option value="413">Phú Yên</option>
                              <option value="414">Quảng Bình</option>
                              <option value="415">Quảng Nam</option>
                              <option value="417">Quảng Ninh</option>
                              <option value="420">Sóc Trăng</option>
                              <option value="421">Sơn La</option>
                              <option value="425">Thanh Hóa</option>
                              <option value="426">Thừa Thiên - Huế</option>
                              <option value="392">Hà Nội</option>
                           </select>
                        </div>
                     </div>
                     <div class="col225 fr">                        
                        <div class="line"> <input type="submit" class="btnFind mr10" value="Tìm kiếm"> 
						</div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="clearfix"></div>
        
         </div>
      </div>
   
   </div>
</div>
<div class="boxTourList">
   <div class="row">
      <div class="col-md-6">
         <div class="col555">
            <form id="findSearch" method="<?php echo $method; ?>" action="<?php echo $action; ?>">
               <div class="findBoxTours" id="box_01">
                  <input type="hidden" name="tour_type_id" value="1"> <input type="hidden" name="hid_s" value="hid_s"> 
                  <h2 class="title"><a href="/du-lich-trong-nuoc" title="Du lịch trong nước">Tour trong nước</a></h2>
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
                     </div>
                     <div class="col225 fr">
                        <div class="line">
                           <label class="label2">Điểm đến</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:162px">
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
                        <div class="line"> <label class="label2">Mã tour</label> 
						<input type="text" name="<?php echo $keyName; ?>" autocomplete="off" class="isoCodeText" placeholder="Nhập mã tour"> </div>
                        <div class="line"> <input type="submit" class="btnFind mr10" value="Tìm kiếm"> 
						<a class="linkTailor" href="/lien-he" title="Tour theo yêu cầu">Tour theo yêu cầu</a> </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="clearfix"></div>
        
         </div>
      </div>
      <div class="col-md-6">
         <div class="col555">
            <form id="findSearch" method="<?php echo $method; ?>" action="<?php echo $action; ?>">
               <div class="findBoxTours" id="box_02">
                  <input type="hidden" name="tour_type_id" value="2"> <input type="hidden" name="hid_s" value="hid_s"> 
                  <h2 class="title"><a href="/du-lich-nuoc-ngoai" title="Tour nước ngoài">Tour nước ngoài</a></h2>
                  <div class="wrap">
                     <div class="col278 fl">
                        <div class="line">
                           <label class="label1">Điểm khởi hành</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:168px">
                              <option value="">-- Điểm khởi hành --</option>
                              <option value="409">-- Hà Tĩnh --</option>
                           </select>
                        </div>
                        <div class="line">
                           <label class="label1">Thời gian</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:168px">
                              <option value="">-- select --</option>
                              <option value="3-2">3 days / 2 nights</option>
                              <option value="4-3">4 days / 3 nights</option>
                              <option value="5-4">5 days / 4 nights</option>
                              <option value="6-5">6 days / 5 nights</option>
                              <option value="7-6">7 days / 6 nights</option>
                              <option value="8-7">8 days / 7 nights</option>
                              <option value="9-8">9 days / 8 nights</option>
                              <option value="10-9">10 days / 9 nights</option>
                              <option value="11-10">11 days / 10 nights</option>
                              <option value="12-11">12 days / 11 nights</option>
                              <option value="15-14">15 days / 14 nights</option>
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
                     </div>
                     <div class="col225 fr">
                        <div class="line">
                           <label class="label2">Điểm đến</label> 
                           <select class="slb" name="<?php echo $keyName; ?>" style="width:162px">
                              <option value="">-- select --</option>
                              <option value="3">Campuchia</option>
                              <option value="2">Lào</option>
                              <option value="4">Myanmar</option>
                              <option value="5">Thái lan</option>
                              <option value="12">Indonesia</option>
                              <option value="10">Singapore</option>
                              <option value="9">Malaysia</option>
                              <option value="26">Thụy Sỹ</option>
                              <option value="27">Hà Lan</option>
                              <option value="28">Vương quốc Anh</option>
                              <option value="30">Hoa Kỳ</option>
                              <option value="31">Dubai</option>
                              <option value="33">Trung Quốc</option>
                              <option value="34">Ý</option>
                              <option value="35">Pháp</option>
                              <option value="37">Hàn Quốc</option>
                              <option value="38">Nhật Bản</option>
                              <option value="39">Australia</option>
                              <option value="40">Cộng hòa Liên Bang Đức</option>
                              <option value="41">Vương Quốc Bỉ</option>
                              <option value="43">Tiểu vương quốc Abu Dhabi</option>
                              <option value="44">Nam Phi</option>
                              <option value="46">NewZealand</option>
                              <option value="47">Ấn Độ</option>
                              <option value="49">Đài Loan</option>
                              <option value="51">Triều Tiên</option>
                              <option value="53">Cộng hòa Liên Bang Nga</option>
                              <option value="55">Hồng Kông</option>
                              <option value="60">Vương quốc Bhutan</option>
                              <option value="63">Philippines</option>
                           </select>
                        </div>
                        <div class="line"> <label class="label2">Mã tour</label> <input type="text" name="<?php echo $keyName; ?>" autocomplete="off" class="isoCodeText" placeholder="Nhập mã tour"> </div>
                        <div class="line"> <input type="submit" class="btnFind mr10" value="Tìm kiếm">
						<a class="linkTailor" href="/lien-he" title="Tour theo yêu cầu">Tour theo yêu cầu</a> </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="clearfix"></div>
          
         </div>
      </div>
   </div>
</div>
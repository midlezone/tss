<?php
if (isset($data) && count($data)) {
    ?>
    <?php if ($first) { ?>
        <div id='cssmenu'>
        <?php } ?>
        <ul>
            
            <?php
            foreach ($data as $menu_id => $menu) {
                $m_link = $menu['menu_link'];
                ?>
                <li class="<?php echo ($menu['items']) ? 'has-sub' : ''; ?> <?php echo ($menu['active']) ? 'active' : '' ?>">
                    <a href='<?php echo $m_link ?>' title="<?php echo $menu['menu_title']; ?>"><?php echo $menu['menu_title']; ?></a>
                   <?php if($menu['menu_title'] == "Sản Phẩm"): ?>
						<ul class="sub-nav icon-sprite list-car">
						   <li>
							  <table>
								 <tbody>
									<tr>
									   <td class="td-car">
										  <a href="/honda-jazz-pd,20123" target="_blank">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/69f4d72e676fa3288816b29570e6ed09.png" alt="Jazz vị cuộc sống" target="_blank"></a>
									   </td>
									</tr>
									<tr>
									   <td class="logo-sub">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/3bb7487eb91f6bd77745d92b67e24977.png" alt="">
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="desc-car">Jazz vị cuộc sống</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="sub-price">
											 539.000.000 VNĐ				
										  </p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <div class="gr-btn-caser">
											 <a href="/du-toan-pde,4579" class="btn-dtcp dtcp active hv"><span>Dự toán chi phí</span><i></i></a>
											 <a href="/lien-he" class="btn-dtcp dklt"><span>Đăng ký lái thử</span><i></i></a>
										  </div>
									   </td>
									</tr>
								 </tbody>
							  </table>
						   </li>
						   <li>
							  <table>
								 <tbody>
									<tr>
									   <td class="td-car">
										  <a href="/honda-city-pd,20124" target="_blank">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/a62007c9d9083036a6d58c1c5d97fa5d.png" alt="Tầm cao dẫn bước" target="_blank"></a>
									   </td>
									</tr>
									<tr>
									   <td class="logo-sub">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/efa5f0e2c0495853ed9817c4fbaf7b7a.png" alt="">
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="desc-car">Tầm cao dẫn bước</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="sub-price">
											 Từ 559.000.000 VNĐ
										  </p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <div class="gr-btn-caser">
											 <a href="/du-toan-pde,4579" class="btn-dtcp dtcp active hv"><span>Dự toán chi phí</span><i></i></a>
											 <a href="/lien-he" class="btn-dtcp dklt"><span>Đăng ký lái thử</span><i></i></a>
										  </div>
									   </td>
									</tr>
								 </tbody>
							  </table>
						   </li>
						   <li>
							  <table>
								 <tbody>
									<tr>
									   <td class="td-car">
										  <a href="/xe-honda-civic-pd,20125"><img src="https://hondaoto.com.vn/static/uploads/car_price/4ddfe5cda97f25f43203b6be575855c0.png" alt="Bứt phá kiến tạo xu hướng"></a>
									   </td>
									</tr>
									<tr>
									   <td class="logo-sub">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/d10cf65c0496d06fbecb40918a5f3814.png" alt="">
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="desc-car">Bứt phá kiến tạo xu hướng</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="sub-price">
											 898.000.000 VNĐ
										  </p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <div class="gr-btn-caser">
											 <a href="/du-toan-pde,4579" class="btn-dtcp dtcp active hv"><span>Dự toán chi phí</span><i></i></a>
											 <a href="/lien-he" class="btn-dtcp dklt"><span>Đăng ký lái thử</span><i></i></a>
										  </div>
									   </td>
									</tr>
								 </tbody>
							  </table>
						   </li>
						   <li>
							  <table>
								 <tbody>
									<tr>
									   <td class="td-car">
										  <a href="/xe-honda-accord-pd,20126"><img src="https://hondaoto.com.vn/static/uploads/car_price/ac38ff850cb618308fdafbd2b18e1eda.png" alt="Đam mê hứng khởi"></a>
									   </td>
									</tr>
									<tr>
									   <td class="logo-sub">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/be5b14e26f2030a46571d457b5ea1797.png" alt="">
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="desc-car">Đam mê hứng khởi</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="sub-price">
											 1.198.000.000 VNĐ
										  </p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <div class="gr-btn-caser">
											 <a href="/du-toan?p=7" class="btn-dtcp dtcp hv active"><span>Dự toán chi phí</span><i></i></a>
											 <a href="/lien-he" class="btn-dtcp dklt"><span>Đăng ký lái thử</span><i></i></a>
										  </div>
									   </td>
									</tr>
								 </tbody>
							  </table>
						   </li>
						   <div class="clearAll"></div>
						   <li>
							  <table>
								 <tbody>
									<tr>
									   <td class="td-car">
										  <a href="/xe-honda-cr-v-pd,20127"><img src="https://hondaoto.com.vn/static/uploads/car_price/32963b564832f3ff609480a96621c5d9.png" alt="Uy lực vượt mọi giới hạn"></a>
									   </td>
									</tr>
									<tr>
									   <td class="logo-sub">
										  <img src="https://hondaoto.com.vn/static/uploads/car_price/e5e5f7c74123fa980e97813c460cedf3.png" alt="Uy lực vượt mọi giới hạn">
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="desc-car">Uy lực vượt mọi giới hạn</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <p class="sub-price">958.000.000 VNĐ</p>
									   </td>
									</tr>
									<tr>
									   <td>
										  <div class="gr-btn-caser">
											 <a href="/du-toan?p=5" class="btn-dtcp dtcp hv active"><span>Dự toán chi phí</span><i></i></a>
											 <a href="/lien-he" class="btn-dtcp dklt"><span>Đăng ký lái thử</span><i></i></a>
										  </div>
									   </td>
									</tr>
								 </tbody>
							  </table>
						   </li>
						  
						</ul>
				   <?php endif; ?>
                </li>
            <?php } ?>
        </ul>
        <?php if ($first) { ?>
        </div>
    <?php }
}
?>
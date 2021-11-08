<div class="listnews">
   <div class="list">
      <?php if (count($listnews)) { ?>
      <?php
         foreach ($listnews as $ne) {
             ?>
      <?php if($ne['news_category_id'] == '6424'): ?>
      <div class="list-item" style="    display: block;
         padding: 10px 0;
         border-top: dotted 0px #CCC;
         position: relative;
         float: left;
         width: 100%;
         height: 200px;">
         <div class="list-content">
            <div class="list-content-box">
               <?php if ($ne['image_path'] && $ne['image_name']) { ?>
               <div class="list-content-img" style="border: 0px solid #f7f3f3;
                  float: left;
                  width: 260px;
                  padding: 0px;
                  overflow: hidden;
                  margin: 0 20px 10px 0;">
                  <a href="<?php echo $ne['link']; ?>">
                  <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                  </a>
               </div>
               <?php } ?>
               <?php if($ne['news_category_id'] == '6300' || $ne['news_category_id'] == '6302' || $ne['news_category_id'] == '6301'
                  || $ne['news_category_id'] == '6290' ): ?>
               <div class="list-content-body" >
                  <span class="list-content-title">
                  <a href="<?php echo $ne['link']; ?>">
                  <?php echo $ne['news_title']; ?>
                  </a>
                  </span>
               </div>
               <?php else: ?>
               <div class="list-content-body" style="float: none;   margin: 0; width: auto; max-width: 100%;">
                  <span class="list-content-title">
                  <a href="<?php echo $ne['link']; ?>">
                  <?php echo $ne['news_title']; ?>
                  </a>
                  </span>
                  <div class="list-content-detail">
                     <p>
                        <?php
                           echo $ne['news_sortdesc'];
                           ?>
                     </p>
                  </div>
				  <div class="list-content-detail">
                     <p>
                        <?php
                           echo $ne['news_sortdesc'];
                           ?>
                        <?php if($ne['site_id'] == "931"): ?>
                        <a href="<?php echo $ne['link']; ?>">Chi Tiết</a>
                        <?php endif; ?>
                     </p>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <?php else: ?>
      <div class="list-item">
         <div class="list-content">
            <div class="list-content-box">
               <?php if ($ne['image_path'] && $ne['image_name']) { ?>
               <div class="list-content-img">
                  <a href="<?php echo $ne['link']; ?>">
                  <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's500_500/' . $ne['image_name']; ?>">
                  </a>
               </div>
               <?php } ?>
               <?php if($ne['news_category_id'] == '6300' || $ne['news_category_id'] == '6302' || $ne['news_category_id'] == '6301'
                  || $ne['news_category_id'] == '6290' || $ne['news_category_id'] == '6481'): ?>
               <div class="list-content-body">
                  <span class="list-content-title">
                  <a href="<?php echo $ne['link']; ?>">
                  <?php echo $ne['news_title']; ?>
                  </a>
                  </span>
				  
               </div>
               <?php else: ?>
               <div class="list-content-body">
                  <span class="list-content-title">
                  <a href="<?php echo $ne['link']; ?>">
                  <?php echo $ne['news_title']; ?>
                  </a>
                  </span>
                  <div class="list-content-detail">
                     <p>
                        <?php
                           echo $ne['news_sortdesc'];
                           ?>
                     </p>
                  </div>
				  <div class="redmore">
					 <a href="<?php echo $ne['link']; ?>">Xem Thêm</a>
				  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <?php endif; ?> 
      <?php } ?>
      <?php } ?>
   </div>
</div>


<div class="news nws">
   <div class="container">
      <div class="titile-news">
         <h2>Tin tức</h2>
          <a href="/tin-tuc-nc,6330">Xem Thêm</a>
      </div>
      <div class="list-news">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="news-left">
                  <div class="row">

                     <?php foreach ($news as $ne) { ?>

                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="item">
                               <div class="img-item">
                                  <a href="<?php echo $ne['link'] ?>">
                                  <img src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" class="img-responsive imglazyload" alt="Tại sao nên chọn du học Đài Loan" style="display: block;">
                                  </a>
                               </div>
                               <div class="content">
                                  <a href="<?php echo $ne['link'] ?>" title="Tại sao nên chọn du học Đài Loan">
                                     <h3><?php echo $ne['news_title'] ?></h3>
                                  </a>
                                  <p style="color: #fff;" class="time"><span><?php echo date('d-m-Y',$ne['publicdate']) ?></span></p>
                                  <p style="color: #fff;"><?php $string = $ne['news_sortdesc']; ?>                                 
                                     <?php echo   substr($string,0,190).'...'; ?></p>

                                  

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
</div>
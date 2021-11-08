<?php if ($news) { ?>
    <div class="industrial-product outstanding-project">
        <div class="container">
               <div class="title-standard center">
                    <h2><span>Tin tức &amp; sự kiện</span></h2>
                </div>
            <div class="cont">
                <div id="demo">
                    <div id="owl-demo1" class="owl-carousel">
                        <?php
                        foreach ($news as $ne) {
                            ?>
                            <div class="item-blog-news-index item-show">
                               <div class="blog-news-index-img" style="height: 290px;">
                                  <a href="/luu-y-khi-chon-va-su-dung-khan-tam-nd5746.html"></a>
                                  <img class="lazyOwl" src="<?php echo ClaHost::getImageHost() . $ne['image_path'] . 's450_450/' . $ne['image_name']; ?>" style="display: inline;"  alt="<?php echo $ne['image_name']; ?>"/>
                                  <span class="bg-hover-img"><i class="fa fa-link"></i></span>                                  
                               </div>
                               <div class="blog-news-index-title">
                                  <h2>
                                     <a href="<?php echo $ne['link']; ?>"> <?php echo $ne['news_title']; ?></a>
                                  </h2>
                                  <div class="time-blog">
                                     <span><i class="fa fa-clock-o"></i><?php echo date('d-m-Y',$ne['publicdate']) ?></span>
                                  </div>
                                  <div class="desc">
                                    <?php $string = $ne['news_sortdesc']; ?>                              
                                     <?php echo  substr($string,0,190).'...'; ?>
                                  </div>
                                  <div class="view-more">
                                     <a href="<?php echo $ne['link']; ?>">Đọc tiếp</a>
                                  </div>
                               </div>
                            </div>
                            
                            
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo1");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                ],
                navigation: true,
                autoPlay: true,
            });
        });
    </script>   
    <?php
}
?>
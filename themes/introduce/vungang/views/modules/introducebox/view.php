
<div class="who-we-are">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 info-about-index">
            <div class="title-standard center">
               <h2>
                 <span>  Về chúng tôi  </span>                
               </h2>
            </div>
            <div class="ctn" style="font-family: Roboto;">
               <p><?php echo nl2br($data['sortdesc']); ?></p>              
             
            </div>
         </div>
         <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <div class="img">
				<img src="<?php echo ClaHost::getImageHost() . $data['image_path'] . $data['image_name'] ?>" alt="<?php echo $data['title'] ?>" />
               
            </div>
         </div>
      </div>
   </div>
</div>
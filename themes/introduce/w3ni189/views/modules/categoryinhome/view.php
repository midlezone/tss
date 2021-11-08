<?php if (isset($data) && count($data)) { ?>
    <div class="post">
        <div class="container">
            <div class="row">
			<div class="block-title"><h2>Sản phẩm nổi bật</h2></div>
                <?php foreach ($data as $cat) { ?>
                    <div class="col-xs-4 style="opacity: 1;">
                        <div class="box-all-nd">
                            <div class="box-nd">
                                <div class="nd-nd clearfix">
                                    <div class="img-box-nd">
                                        <div class="img-box">
                                            <a href="<?php echo $cat['link'] ?>" title="<?php echo $cat['cat_name'] ?>">
                                                <img src="<?php echo ClaHost::getImageHost() . $cat['image_path'] . 's500_500/' . $cat['image_name'] ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="header-panel">
                                        <a href="<?php echo $cat['link'] ?>">
                                            <h3><?php echo $cat['cat_name']; ?></h3>
                                        </a> 
                                    </div>
                                    <p><?php ?></p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}
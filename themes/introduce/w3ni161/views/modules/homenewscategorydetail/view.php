<div class="post">
    <div class="container">
        <?php foreach ($cateinhome as $cat) { ?>
        <div class="row">
            <div class="title-categories">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            <a href="<?php echo $cat['link']; ?>" title="<?php echo $cat['cat_name']; ?>"><?php echo $cat['cat_name']; ?></a>
                        </h2>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="categories-cont">
                <div class="row">
                    <?php
                    if (isset($data[$cat['cat_id']]['listnews'])) {
                        $listnews = $data[$cat['cat_id']]['listnews'];
                        if (count($listnews)) {
                            foreach ($listnews as $news) {
                            ?>
                    <div class="col-xs-12 col-sm-6 well animated fadeOutDown sb-effect-displayed fadeInDown">
                        <div class="box-all-nd">
                            <div class="box-nd">
                                <div class="nd-nd clearfix">
                                    <div class="img-box-nd">
                                        <div class="img-box"> 
                                            <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>"> 
                                                <img src="<?php echo ClaHost::getImageHost() . $news['image_path'] . 's220_220/' . $news['image_name']; ?>" alt="<?php echo $news['news_title']; ?>">
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="header-panel"> 
                                        <a href="<?php echo $news['link']; ?>" title="<?php echo $news['news_title']; ?>">
                                            <h3><?php echo $news['news_title']; ?></h3>
                                        </a> </div>
                                    <p class="sort_desc"><?php echo $news['news_sortdesc']; ?></p>
                                </div>
                            </div>
                            <!--end-box-nd--> 
                        </div>
                    </div>
                    <?php }}} ?>
                </div>
            </div>          
        </div>
        <?php } ?>
        <!--end-rows--> 
    </div>
</div>
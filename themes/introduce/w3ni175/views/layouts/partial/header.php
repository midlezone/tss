<div class="header">
    <div class="container">
        <div class="bg-top clearfix ">
            <div class="left-bg-top">
            </div>
            <div class="right-bg-top">
                <div class="login">
                    <ul class="menu">
                       
                    </ul>
                </div>
                <!--end-login--> 
            </div>
        </div>
        <div class="bg-top clearfix ">
            
            <div class="box-right clearfix">
                <div class="box-phone">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
                    ?>
                </div>
                <div class="timkiem">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                    ?>
                </div>
                <!--end-timkiem--> 
            </div>
        </div>
    </div>
    <!--End Header-->

</div>

<div class="box-menu">
    <div class="container">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
        ?>
    </div>
    <!--end-container--> 
</div>  

<div class="banner-top">
    <div class="container">
        <div class="grid_12">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
            ?>
        </div>
    </div>

</div>
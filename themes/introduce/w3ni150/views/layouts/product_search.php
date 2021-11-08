<?php $this->beginContent('//layouts/main'); ?>
        <div class="centerContent">
            <div id="maincontent">
                <div class="clearfix layout layout-3">
                    <div id="leftCol">        
                        <?php $this->widget('webroot.themes.' . ClaSite::getSiteTypeName(Yii::app()->siteinfo) . '.' . Yii::app()->theme->name . '.productfilter.productfilter'); ?>
                    </div><!--end-left-col-->
                    <div class="clearfix" id="contentCol">
                        <div id="rightCol">
                            <div class="box-hover-table-sp-sp" style="">                
                            </div>
                        </div>
                        <div id="centerCol">            
                            <div id="main-products">
                                <?php
                                echo $content;
                                ?>
                            </div>
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                            ?>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->endContent(); ?>
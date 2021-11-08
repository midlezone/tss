<?php $this->beginContent('//layouts/main'); ?>
<div class="clearfix layout layout-2">   
    <div class="container">
        <div id="main-contain">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
            <div class="centerContent">
                <?php
                echo $content;
                ?>
                <div class="center-main-center services-contain">
                    <div class="view-content">
                        <div class="views-row">
                            <div class="views-field views-field-body">        
                                <div class="field-content">
                                    <div class="services">
                                        <div class="shadow-right"></div>
                                            <div class="service-ico1">
                                                <span class="helper"></span>
                                                <img typeof="foaf:Image" src="/images/icon-service/ico5.png" width="21" height="33" alt="">
                                            </div>
                                            <h3>Design Pools</h3>
                                            <p>There is no better way to enjoy the summer sun than with a quality swimming pool from Design Pools.</p>
                                    </div>
                                </div>  
                            </div>  
                        </div>
                        
                        <div class="views-row">
                            <div class="views-field views-field-body">        
                                <div class="field-content">
                                    <div class="services">
                                        <div class="shadow-right"></div>
                                            <div class="service-ico1">
                                                <span class="helper"></span>
                                                <img typeof="foaf:Image" src="/images/icon-service/ico3.png" width="22" height="44" alt="">
                                            </div>
                                            <h3>Worldwide Expansion</h3>
                                            <p>One of the leaders of the worlds pool market.</p>
                                    </div>
                                </div>  
                            </div>  
                        </div>
                        
                        <div class="views-row">
                            <div class="views-field views-field-body">        
                                <div class="field-content">
                                    <div class="services">
                                        <div class="shadow-right"></div>
                                            <div class="service-ico1">
                                                <span class="helper"></span>
                                                <img typeof="foaf:Image" src="/images/icon-service/ico2.png" width="25" height="28" alt="">
                                            </div>
                                            <h3>Security One</h3>
                                            <p>Bropools shares your concern about keeping your personal information confidential.</p>
                                    </div>
                                </div>  
                            </div>  
                        </div>
                    </div>                    
                </div>
                <?php                    
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
                ?>
                <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                ?>
            </div>
        </div>    
    </div>
</div>
<?php $this->endContent(); ?>
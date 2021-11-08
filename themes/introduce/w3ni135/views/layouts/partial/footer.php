
<div id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-l">
                <p>Stay connected with us</p>
            </div>
            <div class="footer-top-r">
                
            </div>
        </div>
    </div>
    <div class="footer-center">
        <div class="container">
            <div class="footer-center-col1">
                <div class="address-box">
                    <div class="title-main">
                        <h3>Spain Office</h3>
                    </div>
                    <div class="address-content">
                        <p>
                            Ronda de Ponent, 117, 08206 Sabadell, Barcelona, Spain<br />
                            Tel: (+34) 93 719 2750<br />
                            Fax: (+34) 93 719 2751<br />
                            Email: sales1@bropools.com<br />
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-center-col2">
                <div class="address-box">
                    <div class="title-main">
                        <h3>Hongkong Branch</h3>
                    </div>
                    <div class="address-content">
                        <p>
                            Flat L026 2/F Tai Shing Ing Bldg 273-279 Un Chau St Cheung Sha Wan HongKong<br />
                            Tel: (+85) 3069 7060 <br />
                            Fax: (+85) 3069 7062<br />
                            Email: sales2@bropools.com<br />
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-center-col3">
                <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK3));
                ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-l">
                <?php
                if (Yii::app()->siteinfo['footercontent']) {
                    echo Yii::app()->siteinfo['footercontent'];
                }
                ?>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
                ?>
            </div>
            <div class="footer-r">
                <ul class="f-contact">
                    <li><i class="fa fa-phone"></i> (+34) 93 719 2750</li>
                    <li><i class="fa fa-email"></i> contact@bropools.com</li>
                </ul>
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER_BLOCK1)); ?>
            </div>                
        </div>
    </div>
</div>
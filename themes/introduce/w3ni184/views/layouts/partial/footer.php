<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM)); ?>
<!--footer-->
<div id="footer">
    <div class="wrap">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FOOTER));
        
        $fkey = ClaSite::getLinkKey();
        $fwidgets = Widgets::getWidgetsFollowPositionKey(Widgets::POS_FOOTER, $fkey);
        if (count($fwidgets)) {
            $this->widget('common.widgets.wget.wget', array(
                'position' => Widgets::POS_FOOTER,
                'widgets' => $fwidgets,
            ));
        }
        ?>
        <div id="siteinfo">
            <ul class="nav">
                <li>
                    <a>
                        <p class="iicon"><i class="icon-address"></i></p>
                        <p class="sitetext">Phòng C4T13 - 335 Cầu giấy<br />Cầu giấy – Hà Nội</p>
                    </a>
                </li>
                <li>
                    <a>
                        <p class="iicon"><i class="icon-message"></i></p>
                        <p class="sitetext"><a href="mailto:<?php echo (ClaWeb::isWeb3nhatDomain()) ? 'support@web3nhat.vn' : 'support@nanoweb.vn';?>" target="_top"><?php echo (ClaWeb::isWeb3nhatDomain()) ? 'support@web3nhat.vn' : 'support@nanoweb.vn';?></a></p>
                    </a>
                </li>
                <li>
                    <a>
                        <p class="iicon"><i class="icon-phone"></i></p>
                        <p class="sitetext">0948.854.888</p>
                    </a>
                </li>
                <li class="last">
                    <a>
                        <p class="iicon"><i class="icon-print"></i></p>
                        <p class="sitetext">04.62.598.127</p>
                    </a>
                </li>
<!--                <li>
                    <a href="#">
                        <p class="iicon"><i class="icon-wrench"></i></p>
                        <p class="sitetext">Support</p>
                    </a>
                </li>
                <li class="last">
                    <a href="#">
                        <p class="iicon"><i class="icon-speech-bubble"></i></p>
                        <p class="sitetext">Blog</p>
                    </a>
                </li>-->
            </ul>
        </div>
        <!--siteinfo-->
        <div class="social">
            <div class="sw3n"><i class="sicon-w3n"></i></div>
            <div class="osocial">
                <div class="row">
                    <a class="so fb" href="https://www.facebook.com/nanoweb.vn"><i class="sicon sicon-fb"></i></a>
                    <a class="so tw" href="#"><i class="sicon sicon-tw"></i></a>
                    <a class="so go" href="#"><i class="sicon sicon-go"></i></a>
                </div>
            </div>
        </div>
        <!--social-->
    </div>
</div>
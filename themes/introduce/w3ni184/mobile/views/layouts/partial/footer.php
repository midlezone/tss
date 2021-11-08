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
            <div class="osocial">
                <div class="row">
                    <a class="so fb" href="https://www.facebook.com/nanoweb.vn"><i class="sicon sicon-fb"></i></a>
                    <a class="so tw" href="#"><i class="sicon sicon-tw"></i></a>
                    <a class="so go" href="#"><i class="sicon sicon-go"></i></a>
                </div>
            </div>
            <p class="sitetext">Phòng C4T13 - 335 Cầu giấy - Q.Cầu giấy – Hà Nội</p>
            <p class="sitetext"><a href="mailto:<?php echo (ClaWeb::isWeb3nhatDomain()) ? 'support@web3nhat.vn' : 'support@nanoweb.vn';?>" target="_top"><?php echo (ClaWeb::isWeb3nhatDomain()) ? 'support@web3nhat.vn' : 'support@nanoweb.vn';?></a></p>
            <p class="sitetext"><a href="tel:0948.854.888">0948.854.888</a></p>
            <p class="sitetext"><a href="tel:04.668.36.337">04.62.598.127</a></p>
        </div>
        <!--siteinfo-->
        <div class="social">
            <div class="sw3n"><i class="sicon-w3n"></i></div>
        </div>
        <!--social-->
    </div>
</div>
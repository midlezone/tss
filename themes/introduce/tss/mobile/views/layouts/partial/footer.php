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
                    <a class="so fb" href="#"><i class="sicon sicon-fb"></i></a>
                    <a class="so tw" href="#"><i class="sicon sicon-tw"></i></a>
                    <a class="so go" href="#"><i class="sicon sicon-go"></i></a>
                </div>
            </div>
            <p class="sitetext">CÔNG TY TNHH GIẢI PHÁP PHẦN MỀM & DỊCH VỤ CÔNG NGHỆ TSS</p>
            <p class="sitetext">Số 73 Đường Phan Đình Phùng - TP Hà Tĩnh</p>
            <p class="sitetext">Tel/ Fax: <a href="tel:0909727288"></a> - Hotline: <a href="tel:0909727288">09.09.72.72.88</a></p>
            <p class="sitetext"><a href="mailto:<?php echo (ClaWeb::isWeb3nhatDomain()) ? 'info@tss-software.com.vn' : 'info@tss-software.com.vn';?>" target="_top"><?php echo (ClaWeb::isWeb3nhatDomain()) ? 'info@tss-software.com.vn' : 'info@tss-software.com.vn';?></a></p>
            
        </div>
       
        <!--social-->
    </div>
</div>
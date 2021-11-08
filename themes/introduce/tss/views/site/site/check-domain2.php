<section id="checkdomains" class="sub-bg-c">
    <div class="container">
        <div class="row">
            <article class="col-md-12 col-sm-12 col-xs-12">
                <div class="text-center">
                    <h2 class="text-danger fw600 fs24">Kiểm tra tên miền</h2>
                    <p class="fs15 mn">Tra cứu thông tin tên miền nhanh chóng và chính xác.</p>
                    <p class="fs15 mb30">Đăng ký tên miền theo các đuôi tên miền phổ biến để bao vây, bảo vệ thương hiệu của bạn.</p>
                </div>

                <div class="row">
                    <!-- Start: List Domain -->
                    <table cellpadding="0" cellspacing="0">
                        <figure class="col-md-5">
                            <input name="domainId" style="resize: vertical;" class="form-control mb15" placeholder="Nhập tên miền cần kiểm tra…" name="keyword">
                            <input type="hidden" id="listExt" name="listExt" value="">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <!-- Start: Show in Desktop -->
                                &nbsp;
                                <div class="col-md-6">
                                    <button class="btn btn-danger fluid-width text-uppercase fs14 fw600 hidden-sm hidden-xs" title="Kiểm tra tên miền" type="submit">
                                        Kiểm tra
                                    </button>
                                </div>
                                <!-- End: Show in Desktop -->
                            </div>
                        </figure>
                    </table>
                        <figure class="col-md-7">
                            <div class="radio-domains">
                                <div class="radio-custom radio-info mb5">
                                    <input type="radio" id="optPB" name="intervaltype" data-target="#schedulePB" checked="" value="1" onclick="checked_ext_default('popular');">
                                    <label for="optPB">Phổ biến</label>
                                </div>
                                <div class="radio-custom radio-info mb5">
                                    <input type="radio" id="optVN" name="intervaltype" data-target="#scheduleVN" value="2" onclick="checked_ext_default('listvn');">
                                    <label for="optVN">Việt Nam</label>
                                </div>
                                <div class="radio-custom radio-info mb5">
                                    <input type="radio" id="optQT" name="intervaltype" data-target="#scheduleQT" value="3" onclick="checked_ext_default('listinternational');">
                                    <label for="optQT">Quốc tế</label>
                                </div>
                                <div class="radio-custom radio-info mb5">
                                    <input type="radio" id="optEP" name="intervaltype" data-target="#scheduleEP" value="4" onclick="checked_ext_default('listnew');">
                                    <label for="optEP">Tên miền mới</label>
                                </div>
                            </div>
                            <div class="tab-content domain-list">
                                <div id="schedulePB" class="tab-pane active">
                                    <div class="list-PB showDomains">
                                        <div class="listDomains">
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".vn" value=".vn" checked="">
                                                <label for=".vn">.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".com.vn" value=".com.vn" checked="">
                                                <label for=".com.vn">.com.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".net.vn" value=".net.vn" checked="">
                                                <label for=".net.vn">.net.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".edu.vn" value=".edu.vn" checked="">
                                                <label for=".edu.vn">.edu.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".com" value=".com" checked="">
                                                <label for=".com">.com</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".net" value=".net" checked="">
                                                <label for=".net">.net</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".org" value=".org" checked="">
                                                <label for=".org">.org</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".org.vn" value=".org.vn">
                                                <label for=".org.vn">.org.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".info" value=".info">
                                                <label for=".info">.info</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".mobi" value=".mobi">
                                                <label for=".mobi">.mobi</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".tv" value=".tv">
                                                <label for=".tv">.tv</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id=".biz" value=".biz" checked="">
                                                <label for=".biz">.biz</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.org" class="ext-item" value=".org">
                                                <label for="listqt.org">.org</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.info" class="ext-item" value=".info">
                                                <label for="listqt.info">info</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.tv" class="ext-item" value=".tv">
                                                <label for="listqt.tv">.tv</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.asia" class="ext-item" value=".asia">
                                                <label for="listqt.asia">.asia</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.xxx" class="ext-item" value=".xxx">
                                                <label for="listqt.xxx">.xxx</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.co" class="ext-item" value=".co">
                                                <label for="listqt.co">.co</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.us" class="ext-item" value=".us">
                                                <label for="listqt.us">.us</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.eu" class="ext-item" value=".eu">
                                                <label for="listqt.eu">.eu</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.me" class="ext-item" value=".me">
                                                <label for="listqt.me">.me</label>
                                            </div>
                                        </div>                                        
                                    </div>

                                </div>
                                <div id="scheduleVN" class="tab-pane">
                                    <div class="list-VN showDomains">
                                        <div class="listDomains">
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id="listvn.vn" value=".vn">
                                                <label for="listvn.vn">.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.com.vn" class="ext-item" value=".com.vn">
                                                <label for="listvn.com.vn">.com.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.net.vn" class="ext-item" value=".net.vn">
                                                <label for="listvn.net.vn">.net.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.biz.vn" class="ext-item" value=".biz.vn">
                                                <label for="listvn.biz.vn">biz.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.edu.vn" class="ext-item" value=".edu.vn">
                                                <label for="listvn.edu.vn">.edu.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.org.vn" class="ext-item" value=".org.vn">
                                                <label for="listvn.org.vn">.org.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.gov.vn" class="ext-item" value=".gov.vn">
                                                <label for="listvn.gov.vn">.gov.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.info.vn" class="ext-item" value=".info.vn">
                                                <label for="listvn.info.vn">.info.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.pro.vn" class="ext-item" value=".pro.vn">
                                                <label for="listvn.pro.vn">.pro.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.health.vn" class="ext-item" value=".health.vn">
                                                <label for="listvn.health.vn">.health.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.int.vn" class="ext-item" value=".int.vn">
                                                <label for="listvn.int.vn">.int.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.ac.vn" class="ext-item" value=".ac.vn">
                                                <label for="listvn.ac.vn">.ac.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.name.vn" class="ext-item" value=".name.vn">
                                                <label for="listvn.name.vn">.name.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hanoi.vn" class="ext-item" value=".hanoi.vn">
                                                <label for="listvn.name.vn">.hanoi.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.danang.vn" class="ext-item" value=".danang.vn">
                                                <label for="listvn.danang.vn">.danang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.cantho.vn" class="ext-item" value=".cantho.vn">
                                                <label for="listvn.cantho.vn">.cantho.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info long-string">
                                                <input type="checkbox" id="listvn.thanhphohochiminh.vn" class="ext-item" value=".thanhphohochiminh.vn">
                                                <label for="listvn.thanhphohochiminh.vn">.thanhphohochiminh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.haiphong.vn" class="ext-item" value=".haiphong.vn">
                                                <label for="listvn.haiphong.vn">.haiphong.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.binhduong.vn" class="ext-item" value=".binhduong.vn">
                                                <label for="listvn.binhduong.vn">.binhduong.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.angiang.vn" class="ext-item" value=".angiang.vn">
                                                <label for="listvn.angiang.vn">.angiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.bacgiang.vn" class="ext-item" value=".bacgiang.vn">
                                                <label for="listvn.bacgiang.vn">.bacgiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.backan.vn" class="ext-item" value=".backan.vn">
                                                <label for="listvn.backan.vn">.backan.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.baclieu.vn" class="ext-item" value=".baclieu.vn">
                                                <label for="listvn.baclieu.vn">.baclieu.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.bacninh.vn" class="ext-item" value=".bacninh.vn">
                                                <label for="listvn.bacninh.vn">.bacninh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info long-string">
                                                <input type="checkbox" id="listvn.baria-vungtau.vn" class="ext-item" value=".baria-vungtau.vn">
                                                <label for="listvn.baria-vungtau.vn">.baria-vungtau.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.bentre.vn" class="ext-item" value=".bentre.vn">
                                                <label for="listvn.bentre.vn">.bentre.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.binhdinh.vn" class="ext-item" value=".binhdinh.vn">
                                                <label for="listvn.binhdinh.vn">.binhdinh.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.binhphuoc.vn" class="ext-item" value=".binhphuoc.vn">
                                                <label for="listvn.binhphuoc.vn">.binhphuoc.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.binhthuan.vn" class="ext-item" value=".binhthuan.vn">
                                                <label for="listvn.binhthuan.vn">.binhthuan.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.camau.vn" class="ext-item" value=".camau.vn">
                                                <label for="listvn.camau.vn">.camau.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.caobang.vn" class="ext-item" value=".caobang.vn">
                                                <label for="listvn.caobang.vn">.caobang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.daklac.vn" class="ext-item" value=".daklac.vn">
                                                <label for="listvn.daklac.vn">.daklac.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.daknong.vn" class="ext-item" value=".daknong.vn">
                                                <label for="listvn.daknong.vn">.daknong.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.dienbien.vn" class="ext-item" value=".dienbien.vn">
                                                <label for="listvn.dienbien.vn">.dienbien.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.dongnai.vn" class="ext-item" value=".dongnai.vn">
                                                <label for="listvn.dongnai.vn">.dongnai.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.dongthap.vn" class="ext-item" value=".dongthap.vn">
                                                <label for="listvn.dongthap.vn">.dongthap.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.gialai.vn" class="ext-item" value=".gialai.vn">
                                                <label for="listvn.gialai.vn">.gialai.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hagiang.vn" class="ext-item" value=".hagiang.vn">
                                                <label for="listvn.hagiang.vn">.hagiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.haiduong.vn" class="ext-item" value=".haiduong.vn">
                                                <label for="listvn.haiduong.vn">.haiduong.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hanam.vn" class="ext-item" value=".hanam.vn">
                                                <label for="listvn.hanam.vn">.hanam.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hatinh.vn" class="ext-item" value=".hatinh.vn">
                                                <label for="listvn.hatinh.vn">.hatinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.haugiang.vn" class="ext-item" value=".haugiang.vn">
                                                <label for="listvn.haugiang.vn">.haugiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hoabinh.vn" class="ext-item" value=".hoabinh.vn">
                                                <label for="listvn.hoabinh.vn">.hoabinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.hungyen.vn" class="ext-item" value=".hungyen.vn">
                                                <label for="listvn.hungyen.vn">.hungyen.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.khanhhoa.vn" class="ext-item" value=".khanhhoa.vn">
                                                <label for="listvn.khanhhoa.vn">.khanhhoa.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.kiengiang.vn" class="ext-item" value=".kiengiang.vn">
                                                <label for="listvn.kiengiang.vn">.kiengiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.kontum.vn" class="ext-item" value=".kontum.vn">
                                                <label for="listvn.kontum.vn">.kontum.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.laichau.vn" class="ext-item" value=".laichau.vn">
                                                <label for="listvn.laichau.vn">.laichau.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.lamdong.vn" class="ext-item" value=".lamdong.vn">
                                                <label for="listvn.lamdong.vn">.lamdong.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.langson.vn" class="ext-item" value=".langson.vn">
                                                <label for="listvn.langson.vn">.langson.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.laocai.vn" class="ext-item" value=".laocai.vn">
                                                <label for="listvn.laocai.vn">.laocai.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.longan.vn" class="ext-item" value=".longan.vn">
                                                <label for="listvn.longan.vn">.longan.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.namdinh.vn" class="ext-item" value=".namdinh.vn">
                                                <label for="listvn.namdinh.vn">.namdinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.nghean.vn" class="ext-item" value=".nghean.vn">
                                                <label for="listvn.nghean.vn">.nghean.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.ninhbinh.vn" class="ext-item" value=".ninhbinh.vn">
                                                <label for="listvn.ninhbinh.vn">.ninhbinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.ninhthuan.vn" class="ext-item" value=".ninhthuan.vn">
                                                <label for="listvn.ninhthuan.vn">.ninhthuan.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.phutho.vn" class="ext-item" value=".phutho.vn">
                                                <label for="listvn.phutho.vn">.phutho.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.phuyen.vn" class="ext-item" value=".phuyen.vn">
                                                <label for="listvn.phuyen.vn">.phuyen.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.quangbinh.vn" class="ext-item" value=".quangbinh.vn">
                                                <label for="listvn.quangbinh.vn">.quangbinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.quangnam.vn" class="ext-item" value=".quangnam.vn">
                                                <label for="listvn.quangnam.vn">.quangnam.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.quangngai.vn" class="ext-item" value=".quangngai.vn">
                                                <label for="listvn.quangngai.vn">.quangngai.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.quangninh.vn" class="ext-item" value=".quangninh.vn">
                                                <label for="listvn.quangninh.vn">.quangninh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.quangtri.vn" class="ext-item" value=".quangtri.vn">
                                                <label for="listvn.quangtri.vn">.quangtri.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.soctrang.vn" class="ext-item" value=".soctrang.vn">
                                                <label for="listvn.soctrang.vn">.soctrang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.sonla.vn" class="ext-item" value=".sonla.vn">
                                                <label for="listvn.sonla.vn">.sonla.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.tayninh.vn" class="ext-item" value=".tayninh.vn">
                                                <label for="listvn.tayninh.vn">.tayninh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.thaibinh.vn" class="ext-item" value=".thaibinh.vn">
                                                <label for="listvn.thaibinh.vn">.thaibinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info long-string">
                                                <input type="checkbox" id="listvn.thainguyen.vn" class="ext-item" value=".thainguyen.vn">
                                                <label for="listvn.thainguyen.vn">.thainguyen.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.thanhhoa.vn" class="ext-item" value=".thanhhoa.vn">
                                                <label for="listvn.thanhhoa.vn">.thanhhoa.vn</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info long-string">
                                                <input type="checkbox" id="listvn.thuathienhue.vn" class="ext-item" value=".thuathienhue.vn">
                                                <label for="listvn.thuathienhue.vn">.thuathienhue.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.tiengiang.vn" class="ext-item" value=".tiengiang.vn">
                                                <label for="listvn.tiengiang.vn">.tiengiang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.travinh.vn" class="ext-item" value=".travinh.vn">
                                                <label for="listvn.travinh.vn">.travinh.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info long-string">
                                                <input type="checkbox" id="listvn.tuyenquang.vn" class="ext-item" value=".tuyenquang.vn">
                                                <label for="listvn.tuyenquang.vn">.tuyenquang.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.vinhlong.vn" class="ext-item" value=".vinhlong.vn">
                                                <label for="listvn.vinhlong.vn">.vinhlong.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.vinhphuc.vn" class="ext-item" value=".vinhphuc.vn">
                                                <label for="listvn.vinhphuc.vn">.vinhphuc.vn</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listvn.yenbai.vn" class="ext-item" value=".yenbai.vn">
                                                <label for="listvn.yenbai.vn">.yenbai.vn</label>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="see-more-domains-vn" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();" style="display: inline-block;">Xem thêm các đuôi tên miền khác</a>
                                    <a id="less-domains-vn" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();">Rút gọn các đuôi tên miền</a>
                                </div>
                                <div id="scheduleQT" class="tab-pane">
                                    <div class="list-QT showDomains">
                                        <div class="listDomains">
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" class="ext-item" id="listqt.com" value=".com">
                                                <label for="listqt.com">.com</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.net" class="ext-item" value=".net">
                                                <label for="listqt.net">.net</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.org" class="ext-item" value=".org">
                                                <label for="listqt.org">.org</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.biz" class="ext-item" value=".biz">
                                                <label for="listqt.biz">.biz</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.info" class="ext-item" value=".info">
                                                <label for="listqt.info">info</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.tv" class="ext-item" value=".tv">
                                                <label for="listqt.tv">.tv</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.mobi" class="ext-item" value=".mobi">
                                                <label for="listqt.mobi">.mobi</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.asia" class="ext-item" value=".asia">
                                                <label for="listqt.asia">.asia</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.xxx" class="ext-item" value=".xxx">
                                                <label for="listqt.xxx">.xxx</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.tel" class="ext-item" value=".tel">
                                                <label for="listqt.tel">.tel</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.co" class="ext-item" value=".co">
                                                <label for="listqt.co">.co</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.us" class="ext-item" value=".us">
                                                <label for="listqt.us">.us</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.eu" class="ext-item" value=".eu">
                                                <label for="listqt.eu">.eu</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.me" class="ext-item" value=".me">
                                                <label for="listqt.me">.me</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.name" class="ext-item" value=".name">
                                                <label for="listqt.name">.name</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.in" class="ext-item" value=".in">
                                                <label for="listqt.in">.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.pw" class="ext-item" value=".pw">
                                                <label for="listqt.pw">.pw</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.cc" class="ext-item" value=".cc">
                                                <label for="listqt.cc">.cc</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.ws" class="ext-item" value=".ws">
                                                <label for="listqt.ws">.ws</label>
                                            </div>
                                            
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.co.uk" class="ext-item" value=".co.uk">
                                                <label for="listqt.co.uk">.co.uk</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.tw" class="ext-item" value=".tw">
                                                <label for="listqt.tw">.tw</label>
                                            </div>
                                            
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.coin" class="ext-item" value=".co.in">
                                                <label for="listqt.coin">.co.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.netin" class="ext-item" value=".net.in">
                                                <label for="listqt.netin">.net.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.orgin" class="ext-item" value=".org.in">
                                                <label for="listqt.orgin">.org.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.firmin" class="ext-item" value=".firm.in">
                                                <label for="listqt.firmin">.firm.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.genin" class="ext-item" value=".gen.in">
                                                <label for="listqt.genin">.gen.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.indin" class="ext-item" value=".ind.in">
                                                <label for="listqt.indin">.ind.in</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.idncom" class="ext-item" value=".idn.com">
                                                <label for="listqt.idncom">.idn.com</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.idnnet" class="ext-item" value=".idn.net">
                                                <label for="listqt.idnnet">.idn.net</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.idnorg" class="ext-item" value=".idn.org">
                                                <label for="listqt.idnorg">.idn.org</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqt.idnbiz" class="ext-item" value=".idn.biz">
                                                <label for="listqt.idnbiz">.idn.biz</label>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="see-more-domains" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();" style="display: inline-block;">Xem thêm các đuôi tên miền khác</a>
                                    <a id="less-domains" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();">Rút gọn các đuôi tên miền</a>
                                </div>
                                <div id="scheduleEP" class="tab-pane">
                                    <div class="list-EP showDomains">
                                        <div class="listDomains">
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtop" class="ext-item" value=".top">
                                                <label for="listqtnewtop">.top</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewonline" class="ext-item" value=".online">
                                                <label for="listqtnewonline">.online</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewwebsite" class="ext-item" value=".website">
                                                <label for="listqtnewwebsite">.website</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsite" class="ext-item" value="site">
                                                <label for="listqtnewsite">.site</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsexy" class="ext-item" value=".sexy">
                                                <label for="listqtnewsexy">.sexy</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewbar" class="ext-item" value=".bar">
                                                <label for="listqtnewbar">.bar</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewclub" class="ext-item" value=".club">
                                                <label for="listqtnewclub">.club</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcoffee" class="ext-item" value=".coffee">
                                                <label for="listqtnewcoffee">.coffee</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewacademy" class="ext-item" value=".academy">
                                                <label for="listqtnewacademy">.academy</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcompany" class="ext-item" value=".company">
                                                <label for="listqtnewcompany">.company</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcenter" class="ext-item" value=".center">
                                                <label for="listqtnewcenter">.center</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcity" class="ext-item" value=".city">
                                                <label for="listqtnewcity">.city</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcomputer" class="ext-item" value=".computer">
                                                <label for="listqtnewcomputer">.computer</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcamera" class="ext-item" value=".camera">
                                                <label for="listqtnewcamera">.camera</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewaudio" class="ext-item" value=".audio">
                                                <label for="listqtnewaudio">.audio</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewxyz" class="ext-item" value=".xyz">
                                                <label for="listqtnewxyz">.xyz</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewbike" class="ext-item" value=".bike">
                                                <label for="listqtnewbike">.bike</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewchurch" class="ext-item" value=".church">
                                                <label for="listqtnewchurch">.church</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtoday" class="ext-item" value=".today">
                                                <label for="listqtnewtoday">.today</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewmarketing" class="ext-item" value=".marketing">
                                                <label for="listqtnewmarketing">.marketing</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewphoto" class="ext-item" value=".photo">
                                                <label for="listqtnewphoto">.photo</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewgallery" class="ext-item" value=".gallery">
                                                <label for="listqtnewgallery">.gallery</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcenter" class="ext-item" value=".center">
                                                <label for="listqtnewcenter">.center</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtneweducation" class="ext-item" value=".education">
                                                <label for="listqtneweducation">.education</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewemail" class="ext-item" value=".email">
                                                <label for="listqtnewemail">.email</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcare" class="ext-item" value=".care">
                                                <label for="listqtnewcare">.care</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdigital" class="ext-item" value=".digital">
                                                <label for="listqtnewdigital">.digital</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcash" class="ext-item" value=".cash">
                                                <label for="listqtnewcash">.cash</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewexpert" class="ext-item" value=".expert">
                                                <label for="listqtnewexpert">.expert</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewrestaurant" class="ext-item" value=".restaurant">
                                                <label for="listqtnewrestaurant">.restaurant</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewuniversity" class="ext-item" value=".university">
                                                <label for="listqtnewuniversity">.university</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewhost" class="ext-item" value=".host">
                                                <label for="listqtnewhost">.host</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewland" class="ext-item" value=".land">
                                                <label for="listqtnewland">.land</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewmedia" class="ext-item" value=".media">
                                                <label for="listqtnewmedia">.media</label>
                                            </div>

                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewagency" class="ext-item" value=".agency">
                                                <label for="listqtnewagency">.agency</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcab" class="ext-item" value=".cab">
                                                <label for="listqtnewcab">.cab</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcamp" class="ext-item" value=".camp">
                                                <label for="listqtnewcamp">.camp</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcapital" class="ext-item" value=".capital">
                                                <label for="listqtnewcapital">.capital</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcards" class="ext-item" value=".cards">
                                                <label for="listqtnewcards">.cards</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcare" class="ext-item" value=".care">
                                                <label for="listqtnewcare">.care</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcareers" class="ext-item" value=".careers">
                                                <label for="listqtnewcareers">.careers</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcash" class="ext-item" value=".cash">
                                                <label for="listqtnewcash">.cash</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcatering" class="ext-item" value=".catering">
                                                <label for="listqtnewcatering">.catering</label>
                                            </div>
                                            <div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcheap" class="ext-item" value=".cheap">
                                                <label for="listqtnewcheap">.cheap</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewchristmas" class="ext-item" value=".christmas">
                                                <label for="listqtnewchristmas">.christmas</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcity" class="ext-item" value=".city">
                                                <label for="listqtnewcity">.city</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcleaning" class="ext-item" value=".cleaning">
                                                <label for="listqtnewcleaning">.cleaning</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewclinic" class="ext-item" value=".clinic">
                                                <label for="listqtnewclinic">.clinic</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewclothing" class="ext-item" value=".clothing">
                                                <label for="listqtnewclothing">.clothing</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcodes" class="ext-item" value=".codes">
                                                <label for="listqtnewcodes">.codes</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcommunity" class="ext-item" value=".community">
                                                <label for="listqtnewcommunity">.community</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcondos" class="ext-item" value=".condos">
                                                <label for="listqtnewcondos">.condos</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewconstruction" class="ext-item" value=".construction">
                                                <label for="listqtnewconstruction">.construction</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcontractors" class="ext-item" value=".contractors">
                                                <label for="listqtnewcontractors">.contractors</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcool" class="ext-item" value=".cool">
                                                <label for="listqtnewcool">.cool</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewcruises" class="ext-item" value=".cruises">
                                                <label for="listqtnewcruises">.cruises</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdating" class="ext-item" value=".dating">
                                                <label for="listqtnewdating">.dating</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdeals" class="ext-item" value=".deals">
                                                <label for="listqtnewdeals">.deals</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdental" class="ext-item" value=".dental">
                                                <label for="listqtnewdental">.dental</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdiamonds" class="ext-item" value=".diamonds">
                                                <label for="listqtnewdiamonds">.diamonds</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdirect" class="ext-item" value=".direct">
                                                <label for="listqtnewdirect">.direct</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdirectory" class="ext-item" value=".directory">
                                                <label for="listqtnewdirectory">.directory</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdigital" class="ext-item" value=".digital">
                                                <label for="listqtnewdigital">.digital</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdiscount" class="ext-item" value=".discount">
                                                <label for="listqtnewdiscount">.discount</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewdomains" class="ext-item" value=".domains">
                                                <label for="listqtnewdomains">.domains</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtneweducation" class="ext-item" value=".education">
                                                <label for="listqtneweducation">.education</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewemail" class="ext-item" value=".email">
                                                <label for="listqtnewemail">.email</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewengineering" class="ext-item" value=".engineering">
                                                <label for="listqtnewengineering">.engineering</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewenterprises" class="ext-item" value=".enterprises">
                                                <label for="listqtnewenterprises">.enterprises</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewequipment" class="ext-item" value=".equipment">
                                                <label for="listqtnewequipment">.equipment</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewestate" class="ext-item" value=".estate">
                                                <label for="listqtnewestate">.estate</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewevents" class="ext-item" value=".events">
                                                <label for="listqtnewevents">.events</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewexchange" class="ext-item" value=".exchange">
                                                <label for="listqtnewexchange">.exchange</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewexposed" class="ext-item" value=".exposed">
                                                <label for="listqtnewexposed">.exposed</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfail" class="ext-item" value=".fail">
                                                <label for="listqtnewfail">.fail</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfarm" class="ext-item" value=".farm">
                                                <label for="listqtnewfarm">.farm</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfinancial" class="ext-item" value=".financial">
                                                <label for="listqtnewfinancial">.financial</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfish" class="ext-item" value=".fish">
                                                <label for="listqtnewfish">.fish</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfitness" class="ext-item" value=".fitness">
                                                <label for="listqtnewfitness">.fitness</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewflights" class="ext-item" value=".flights">
                                                <label for="listqtnewflights">.flights</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewflorist" class="ext-item" value=".florist">
                                                <label for="listqtnewflorist">.florist</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfoundation" class="ext-item" value=".foundation">
                                                <label for="listqtnewfoundation">.foundation</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfund" class="ext-item" value=".fund">
                                                <label for="listqtnewfund">.fund</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewfurniture" class="ext-item" value=".furniture">
                                                <label for="listqtnewfurniture">.furniture</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewgift" class="ext-item" value=".gift">
                                                <label for="listqtnewgift">.gift</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewglass" class="ext-item" value=".glass">
                                                <label for="listqtnewglass">.glass</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewgraphics" class="ext-item" value=".graphics">
                                                <label for="listqtnewgraphics">.graphics</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewgripe" class="ext-item" value=".gripe">
                                                <label for="listqtnewgripe">.gripe</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewguide" class="ext-item" value=".guide">
                                                <label for="listqtnewguide">.guide</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewguitars" class="ext-item" value=".guitars">
                                                <label for="listqtnewguitars">.guitars</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewhiphop" class="ext-item" value=".hiphop">
                                                <label for="listqtnewhiphop">.hiphop</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewholdings" class="ext-item" value=".holdings">
                                                <label for="listqtnewholdings">.holdings</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewhosting" class="ext-item" value=".hosting">
                                                <label for="listqtnewhosting">.hosting</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewhouse" class="ext-item" value=".house">
                                                <label for="listqtnewhouse">.house</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewindustries" class="ext-item" value=".industries">
                                                <label for="listqtnewindustries">.industries</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewink" class="ext-item" value=".ink">
                                                <label for="listqtnewink">.ink</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewinstitute" class="ext-item" value=".institute">
                                                <label for="listqtnewinstitute">.institute</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewinternational" class="ext-item" value=".international">
                                                <label for="listqtnewinternational">.international</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewinvestments" class="ext-item" value=".investments">
                                                <label for="listqtnewinvestments">.investments</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewjuegos" class="ext-item" value=".juegos">
                                                <label for="listqtnewjuegos">.juegos</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewkitchen" class="ext-item" value=".kitchen">
                                                <label for="listqtnewkitchen">.kitchen</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewland" class="ext-item" value=".land">
                                                <label for="listqtnewland">.land</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlease" class="ext-item" value=".lease">
                                                <label for="listqtnewlease">.lease</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlife" class="ext-item" value=".life">
                                                <label for="listqtnewlife">.life</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlighting" class="ext-item" value=".lighting">
                                                <label for="listqtnewlighting">.lighting</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlimited" class="ext-item" value=".limited">
                                                <label for="listqtnewlimited">.limited</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlimo" class="ext-item" value=".limo">
                                                <label for="listqtnewlimo">.limo</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewlink" class="ext-item" value=".link">
                                                <label for="listqtnewlink">.link</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewmaison" class="ext-item" value=".maison">
                                                <label for="listqtnewmaison">.maison</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewmanagement" class="ext-item" value=".management">
                                                <label for="listqtnewmanagement">.management</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewpartners" class="ext-item" value=".partners">
                                                <label for="listqtnewpartners">.partners</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewparts" class="ext-item" value=".parts">
                                                <label for="listqtnewparts">.parts</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewphotography" class="ext-item" value=".photography">
                                                <label for="listqtnewphotography">.photography</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewphotos" class="ext-item" value=".photos">
                                                <label for="listqtnewphotos">.photos</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewpics" class="ext-item" value=".pics">
                                                <label for="listqtnewpics">.pics</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewpictures" class="ext-item" value=".pictures">
                                                <label for="listqtnewpictures">.pictures</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewplumbing" class="ext-item" value=".plumbing">
                                                <label for="listqtnewplumbing">.plumbing</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewpress" class="ext-item" value=".press">
                                                <label for="listqtnewpress">.press</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewproductions" class="ext-item" value=".productions">
                                                <label for="listqtnewproductions">.productions</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewproperties" class="ext-item" value=".properties">
                                                <label for="listqtnewproperties">.properties</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewproperty" class="ext-item" value=".property">
                                                <label for="listqtnewproperty">.property</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewrecipes" class="ext-item" value=".recipes">
                                                <label for="listqtnewrecipes">.recipes</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewreisen" class="ext-item" value=".reisen">
                                                <label for="listqtnewreisen">.reisen</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewrentals" class="ext-item" value=".rentals">
                                                <label for="listqtnewrentals">.rentals</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewrepair" class="ext-item" value=".repair">
                                                <label for="listqtnewrepair">.repair</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewreport" class="ext-item" value=".report">
                                                <label for="listqtnewreport">.report</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewrest" class="ext-item" value=".rest">
                                                <label for="listqtnewrest">.rest</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewschule" class="ext-item" value=".schule">
                                                <label for="listqtnewschule">.schule</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewservices" class="ext-item" value=".services">
                                                <label for="listqtnewservices">.services</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewshoes" class="ext-item" value=".shoes">
                                                <label for="listqtnewshoes">.shoes</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsingles" class="ext-item" value=".singles">
                                                <label for="listqtnewsingles">.singles</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsolar" class="ext-item" value=".solar">
                                                <label for="listqtnewsolar">.solar</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsolutions" class="ext-item" value=".solutions">
                                                <label for="listqtnewsolutions">.solutions</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsupplies" class="ext-item" value=".supplies">
                                                <label for="listqtnewsupplies">.supplies</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsupply" class="ext-item" value=".supply">
                                                <label for="listqtnewsupply">.supply</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsupport" class="ext-item" value=".support">
                                                <label for="listqtnewsupport">.support</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsurgery" class="ext-item" value=".surgery">
                                                <label for="listqtnewsurgery">.surgery</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewsystems" class="ext-item" value=".systems">
                                                <label for="listqtnewsystems">.systems</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtattoo" class="ext-item" value=".tattoo">
                                                <label for="listqtnewtattoo">.tattoo</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtax" class="ext-item" value=".tax">
                                                <label for="listqtnewtax">.tax</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtechnology" class="ext-item" value=".technology">
                                                <label for="listqtnewtechnology">.technology</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtienda" class="ext-item" value=".tienda">
                                                <label for="listqtnewtienda">.tienda</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtips" class="ext-item" value=".tips">
                                                <label for="listqtnewtips">.tips</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtoday" class="ext-item" value=".today">
                                                <label for="listqtnewtoday">.today</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtools" class="ext-item" value=".tools">
                                                <label for="listqtnewtools">.tools</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtown" class="ext-item" value=".town">
                                                <label for="listqtnewtown">.town</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtoys" class="ext-item" value=".toys">
                                                <label for="listqtnewtoys">.toys</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewtraining" class="ext-item" value=".training">
                                                <label for="listqtnewtraining">.training</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewuniversity" class="ext-item" value=".university">
                                                <label for="listqtnewuniversity">.university</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewvacations" class="ext-item" value=".vacations">
                                                <label for="listqtnewvacations">.vacations</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewventures" class="ext-item" value=".ventures">
                                                <label for="listqtnewventures">.ventures</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewviajes" class="ext-item" value=".viajes">
                                                <label for="listqtnewviajes">.viajes</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewvillas" class="ext-item" value=".villas">
                                                <label for="listqtnewvillas">.villas</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewvision" class="ext-item" value=".vision">
                                                <label for="listqtnewvision">.vision</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewvoyage" class="ext-item" value=".voyage">
                                                <label for="listqtnewvoyage">.voyage</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewwatch" class="ext-item" value=".watch">
                                                <label for="listqtnewwatch">.watch</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewwiki" class="ext-item" value=".wiki">
                                                <label for="listqtnewwiki">.wiki</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewworks" class="ext-item" value=".works">
                                                <label for="listqtnewworks">.works</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewwtf" class="ext-item" value=".wtf">
                                                <label for="listqtnewwtf">.wtf</label>
                                            </div><div class="checkbox-custom checkbox-info">
                                                <input type="checkbox" id="listqtnewzone" class="ext-item" value=".zone">
                                                <label for="listqtnewzone">.zone</label>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="see-more-domains-new" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();" style="display: inline-block;">Xem thêm các đuôi tên miền khác</a>
                                    <a id="less-domains-new" class="btn btn-dark badge text-uppercase fs14 fw600" title="Xem thêm tên miền" href="javascript: void();">Rút gọn các đuôi tên miền</a>
                                </div>
                            </div>
                        </figure>
                    <!-- End: List Domain -->

                    <!-- Start: More Service -->
                    <figure class="col-md-12">
                        <div class="more-s">
                            <ul>
                                <li><a href="/site/site/domain"><i class="fa fa-table mr5"></i> Bảng giá tên miền</a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-globe mr5"></i> Tên miền sắp tự do (Backorder)</a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-gavel mr5"></i> Các tên miền đang giao dịch (Sàn tên miền)</a></li>
                            </ul>
                        </div>
                    </figure>
                    <!-- End: More Service -->
                    <figure class="col-md-12">
                        <table class="footable table table-striped table-hover fs14 mv30 default footable-loaded">
                            <thead>
                                <tr class="primary">
                                    <th class="footable-visible footable-first-column" data-toggle="true">Tên miền</th>
                                    <th class="footable-visible" data-hide="phone">Phí khởi tạo</th>
                                    <th class="footable-visible" data-hide="phone">Phí duy trì/năm</th>
                                    <th class="text-center footable-visible footable-last-column"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="domainItem0">
                                    <td class=""><span class="lineT text-danger">webmoi<strong>.vn</strong></span></td>
                                    <td class=""><span class="lineT mr5">350,000 đ</span> <strong class="text-success">315,000 đ</strong></td>
                                    <td class=""><span class="lineT mr5">480,000 đ</span> <strong class="text-success">432,000 đ</strong></td>
                                    <td class="text-center"><a class="text-danger" href="javascript:void()" onclick="show_whois_domain('webmoi','.vn')"><i class="fa fa-eye mr5"></i> XEM THÔNG TIN</a>
                                    </td>
                                </tr>
                                <tr id="domainItem1"><td class="">webmoi<strong>.com.vn</strong></td>
                                    <td class=""><span class="lineT mr5">350,000 đ</span> <strong class="text-success">315,000 đ</strong></td>
                                    <td class=""><span class="lineT mr5">350,000 đ</span> <strong class="text-success">315,000 đ</strong></td>
                                    <td class="text-center"><a id="webmoicomvn" class="text-success" href="#"><i class="fa fa-shopping-cart mr5"></i> <span class="cart-status">Thêm vào giỏ hàng</span><span class="cart-alert"></span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </figure>
                </div>
                
            </article>
            
            
        </div>  
    </div>

</section>
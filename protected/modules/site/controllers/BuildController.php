<?php

class BuildController extends PublicController {

    public $layout = '//layouts/build';

    const BUILD_GENERATE_KEY = 'W3NgenerateSQL';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xEEEEEE,
            ),
        );
    }

    /**
     * chọn theme
     */
    function actionChoicetheme() {
        //
        $cat_id = Yii::app()->request->getParam('cid');
        //
        $pagesize = 30;
        $pagesize = $pagesize - 1;
        //
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        //
        $options = array(
            'limit' => $pagesize,
            ClaSite::PAGE_VAR => $page,
            'cat_id' => $cat_id,
        );
        $themes = Themes::getThemes($options);
        $totalItems = Themes::countThemes($options);
        //
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_THEME, 'create' => true));
        $data = $category->createArrayCategory();
        //
        $this->render('choicetheme', array(
            'themes' => $themes,
            'data' => $data,
            'pagesize' => $pagesize,
            'totalItems' => $totalItems,
        ));
    }

    /**
     * Tạo web
     */
    public function actionInstall() {
        //
        $isAjax = Yii::app()->request->isAjaxRequest;
        $theme_id = Yii::app()->request->getParam('theme');
        if (!$theme_id) {
            if ($isAjax)
                $this->jsonResponse(404);
            else
                $this->redirect(Yii::app()->createUrl('site/build/choicetheme'));
        }
        $theme = Themes::model()->findByPk($theme_id);
        if (!$theme || $theme->status != Themes::STATUS_AVAILABLE) {
            if ($isAjax)
                $this->jsonResponse(400);
            else
                $this->redirect(Yii::app()->createUrl('site/build/choicetheme'));
        }
        //
        $model = new BuildRegisterForm();
        $dataPath = $theme->getPathOfDefaultData();
        if (!file_exists($dataPath)) {
            if ($isAjax)
                $this->jsonResponse(400, array('mess' => $dataPath));
            else
                $this->redirect(Yii::app()->createUrl('site/build/choicetheme'));
        }
        //
        //
        if (isset($_POST['BuildRegisterForm'])) {
            $model->attributes = $_POST['BuildRegisterForm'];
            $model->domain = trim($model->domain, '.'); // bỏ dấu chấm ở đầu và cuối domain
            if ($model->validate()) {
                $userAdmin = new UsersAdmin();
                $userAdmin->email = $model->email;
                $userAdmin->user_name = $model->email;
                //
                $passwordStore = $model->password;
                //
                $userAdmin->password = ClaGenerate::encrypPassword($model->password);
                //create user admin
                if ($userAdmin->save()) {
                    $site = new SiteSettings();
                    $site->site_type = $theme->theme_type;
                    $site->site_title = $model->domain;
                    $site->site_skin = $theme->theme_id;
                    $site->admin_email = $model->email;
                    $site->domain_default = $model->getRealDomain();
                    $site->phone = $model->phone;
                    $site->user_id = $userAdmin->user_id;
                    $site->expiration_date = time() + Yii::app()->params['trial_date'] * 86400;
                    //save site
                    if ($site->save()) {
                        //
                        $userAdmin->site_id = $site->site_id;
                        $userAdmin->save();
                        //
                        $domain = new Domains();
                        $domain->domain_id = $model->getRealDomain();
                        $domain->site_id = $site->site_id;
                        $domain->user_id = $userAdmin->user_id;
                        $domain->domain_default = Domains::DOMAIN_DEFAULT_YES;
                        $domain->domain_type = Domains::DOMAIN_TYPE_NOACTION; // Không cho người dùng xóa domain này
                        // create domain
                        if ($domain->save()) {
                            // insert default data for site
                            $sql = '';
                            $sql = trim(file_get_contents($dataPath));
                            $sql = str_replace(array('[site_id]', '[user_id]', '[now]'), array($site->site_id, $userAdmin->user_id, time()), $sql);
                            //echo $sql;
                            if ($sql) {
                                $transaction = Yii::app()->db->beginTransaction();
                                try {
                                    $respond = Yii::app()->db->createCommand($sql)->execute();
                                    $transaction->commit();
                                    if ($respond) {
                                        $redirect = ClaSite::getHttpMethod() . $domain->domain_id . '/' . ClaSite::getAdminEntry();
                                        //
                                        // Auto login
                                        $token = ClaGenerate::getUniqueCode();
                                        $cacheFile = new ClaCacheFile();
                                        $loginForm = New LoginForm();
                                        $loginForm->username = $userAdmin->email;
                                        $loginForm->password = $userAdmin->password;
                                        $loginForm->rememberMe = 1;
                                        //
                                        $cacheFile->add($token, $loginForm->attributes);
                                        //
                                        $loginredirect = ClaSite::getHttpMethod() . $domain->domain_id . '/' . ClaSite::getAdminEntry() . '/login/login/tklogin?tk=' . $token;
                                        // send mail 
                                        $mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
                                            'mail_key' => 'registersuccess',
                                        ));
                                        if ($mailSetting) {
                                            $data = array(
                                                'site' => ClaSite::getHttpMethod() . $domain->domain_id,
                                                'date' => date('d-m-Y'),
                                                'website_name' => $model->domain,
                                                'admin_username' => $userAdmin->email,
                                                'admin_password' => $passwordStore,
                                                'site_admin' => $redirect,
                                                'ip' => Yii::app()->params['ipssystem'][0],
                                            );
                                            //
                                            $content = $mailSetting->getMailContent($data);
                                            //
                                            $subject = $mailSetting->getMailSubject($data);
                                            //
                                            if ($content && $subject) {
                                                Yii::app()->mailer->send('', $userAdmin->email, $subject, $content);
                                                Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
                                                //$mailer->send($from, $email, $subject, $message);
                                            }
                                        }
                                        //
                                        $time = 30;
                                        if ($isAjax) {
                                            $this->jsonResponse(200, array(
                                                'message' => $this->renderPartial('registerSuccess', array(
                                                    'user' => $userAdmin,
                                                    'domain' => $domain,
                                                    'website' => ClaSite::getHttpMethod() . $domain->domain_id,
                                                    'admin_link' => $redirect,
                                                    'time' => $time,
                                                        ), true, true),
                                                'autologin' => $loginredirect,
                                                'redirect' => $redirect,
                                                'time' => $time,
                                            ));
                                        }
                                        //
                                        header("Location:" . $redirect);
                                    } else {
//                                    var_dump($respond);
//                                    echo $sql;
//                                    die;
                                    }
                                } catch (Exception $e) {
                                    $transaction->rollback();
                                    //$site->delete();
                                    //$domain->delete();
                                    //$userAdmin->delete();
                                    $file = Yii::getPathOfAlias('root') . '/' . 'data.sql';
                                    file_put_contents($file, $sql);
//                            if ($theme_id == 'w3ni131') {
//                                $file = Yii::getPathOfAlias('root') . '/' . 'data.sql';
//                                //echo $file;
//                                file_put_contents($file, $sql);
//                                die();
//                            }
                                    $this->redirect(Yii::app()->createUrl('site/build/choicetheme'));
                                }
                            }
                            //
                        }
                        //
                    } else {
                        // Nếu không lưu site thành công thì xóa admin
                        $userAdmin->delete();
                    }
                }
                //
            } else if ($isAjax) {
                $this->jsonResponse(400, array(
                    'errors' => $model->getJsonErrors(),
                ));
            }
        }
        $theme_relaction = Themes::getThemeInRelaction($theme_id, array(
                    'cat_id' => $theme['category_id'],
                    'created_time' => $theme['created_time'],
        ));
        //
        $theme_relaction = ClaArray::getRandomInArray($theme_relaction, 3);
        //
        $this->render('register', array(
            'theme' => $theme,
            'model' => $model,
            'themerelaction' => $theme_relaction,
        ));
    }

    /**
     * Tự động tạo ra file sql
     * array("table" => array("id" => array("map"=>"tên biến trong sql")))
     */
    public function actionGeneratesql() {
//        if (!Yii::app()->isDemo)
//            Yii::app()->end();
        $key = Yii::app()->request->getParam('key');
        if (!$key) {
            if (!ClaSite::getAdminSession())
                Yii::app()->end();
        }else {
            if ($key != self::BUILD_GENERATE_KEY)
                Yii::app()->end();
        }

        // sql
        $sql = '';
        // mảng lưu trữ các biến và map giữa các biến trong php và mysql
        $store = array();
        //
        $site_id = Yii::app()->controller->site_id;
        //
        /**
         * Tạo ra banner group -> banner
         */
        // Cập nhật thông tin của site
        $siteInfo = Yii::app()->siteinfo;
        $sql.="UPDATE " . Yii::app()->params['tables']['site'] . " SET site_logo=" . ClaGenerate::quoteValue($siteInfo['site_logo']) . ",footercontent=" . ClaGenerate::quoteValue($siteInfo['footercontent']) . ",contact=" . ClaGenerate::quoteValue($siteInfo['contact']) . ",admin_default=" . ClaGenerate::quoteValue($siteInfo['admin_default'])
                . " WHERE site_id=[site_id];" . "\n\n";
        // Lấy giới thiệu website
        $introduce = SiteIntroduces::getIntroduce();
        if ($introduce && count($introduce)) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['site_introduce'] . " (site_id,user_id, title, sortdesc, description, image_path, image_name, meta_keywords, meta_description, meta_title, created_time, modified_time) "
                    . "VALUES ([site_id],[user_id]," . ClaGenerate::quoteValue($introduce['title']) . ',' . ClaGenerate::quoteValue($introduce['sortdesc']) . ',' . ClaGenerate::quoteValue($introduce['description'])
                    . ',' . ClaGenerate::quoteValue($introduce['image_path']) . ',' . ClaGenerate::quoteValue($introduce['image_name']) . ',' . ClaGenerate::quoteValue($introduce['meta_keywords'])
                    . ',' . ClaGenerate::quoteValue($introduce['meta_description']) . ',' . ClaGenerate::quoteValue($introduce['meta_title']) . ',[now],[now]);';
            //
            $sql.="\n\n";
        }
        //
        //Lấy hỗ trợ trực tuyến của site
        $support = SiteSupport::model()->findByPk($site_id);
        if ($support) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['site_support'] . " (site_id,user_id,`data`, created_time, modified_time) "
                    . "VALUES ([site_id],[user_id]," . ClaGenerate::quoteValue($support['data']) . ',[now],[now]);';
            //
            $sql.="\n\n";
        }
        //
        //Lấy bản đồ
        $maps = Maps::getMaps(array('limit' => 100));
        if ($maps && count($maps)) {
            foreach ($maps as $map) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['map'] . " (id,site_id, user_id, latlng, `name`, address, email, phone, website, headoffice, `order`, created_time, modified_time) ";
                $sql.= "VALUES (null,[site_id],[user_id]," . ClaGenerate::quoteValue($map['latlng']) . ',' . ClaGenerate::quoteValue($map['name']) . ',' . ClaGenerate::quoteValue($map['address']) . ','
                        . ClaGenerate::quoteValue($map['email']) . ',' . ClaGenerate::quoteValue($map['phone']) . ',' . ClaGenerate::quoteValue($map['website']) . ',' . $map['headoffice'] . ',' . $map['order']
                        . ",[now],[now]);" . "\n";
                //$sql.= "set @" . Yii::app()->params['tables']['map'] . $map['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                //$store[Yii::app()->params['tables']['map']][$map['id']]['map'] = Yii::app()->params['tables']['map'] . $map['id'];
            }
            $sql.="\n\n";
        }
        // Lấy baner group -> Và tạo ra bannder group
        $bannergroups = Banners::getAllBannerGroup();
        foreach ($bannergroups as $bg) {
            $sql.= "INSERT INTO " . Yii::app()->params['tables']['banner_group'] . ' (banner_group_id, banner_group_name, banner_group_description, site_id, user_id, width, height, created_time) ' . " VALUES (null, " . ClaGenerate::quoteValue($bg['banner_group_name']) . ", " . ClaGenerate::quoteValue($bg['banner_group_description']) . ", '[site_id]', '[user_id]', '" . $bg['width'] . "', '" . $bg['height'] . "', '[now]');" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['banner_group'] . $bg['banner_group_id'] . " = LAST_INSERT_ID();" . "\n";
            $store[Yii::app()->params['tables']['banner_group']][$bg['banner_group_id']]['map'] = Yii::app()->params['tables']['banner_group'] . $bg['banner_group_id'];
        }
        $sql.="\n\n";
        //Lấy banner
        $banners = Banners::getAllBanner();
        $bannercount = count($banners);
        if ($banners && $bannercount) {
            $i = 0;
            foreach ($banners as $banner) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['banner'] . " (banner_id, site_id, banner_group_id, banner_name, banner_description, banner_src, banner_width, banner_height, banner_link, banner_type, banner_order, banner_rules, banner_target, created_time, banner_showall) VALUES ";
                $sql.="(null, [site_id]," . (isset($store[Yii::app()->params['tables']['banner_group']][$banner['banner_group_id']]['map']) ? "@" . $store[Yii::app()->params['tables']['banner_group']][$banner['banner_group_id']]['map'] : 0)
                        . ", " . ClaGenerate::quoteValue($banner['banner_name']) . "," . ClaGenerate::quoteValue($banner['banner_description']) . "," . ClaGenerate::quoteValue($banner['banner_src'])
                        . "," . $banner['banner_width'] . "," . $banner['banner_height'] . "," . ClaGenerate::quoteValue($banner['banner_link']) . "," . $banner['banner_type'] . "," . $banner['banner_order']
                        . "," . ClaGenerate::quoteValue($banner['banner_rules']) . "," . $banner['banner_target'] . ",[now]," . $banner['banner_showall']
                        . ");"
                        . "\n";
                //
                $sql.= "set @" . Yii::app()->params['tables']['banner'] . $banner['banner_id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['banner']][$banner['banner_id']]['map'] = Yii::app()->params['tables']['banner'] . $banner['banner_id'];
            }
            $sql.="\n\n";
        }
        // Banner partial
        $bannerPartials = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('banner_partial'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($bannerPartials && count($bannerPartials)) {
            foreach ($bannerPartials as $bannerP) {
                if (!isset($store[Yii::app()->params['tables']['banner']][$bannerP['banner_id']]['map']))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['banner_partial'] . " (`id`, `site_id`, `banner_id`, `name`, `path`, `created_time`, `modified_time`, `resizes`, `height`, `width`, `position`) VALUES ";
                $sql.="(null, [site_id]," . "@" . $store[Yii::app()->params['tables']['banner']][$bannerP['banner_id']]['map']
                        . ", " . ClaGenerate::quoteValue($bannerP['name']) . "," . ClaGenerate::quoteValue($bannerP['path']) . ",[now],[now]," . ClaGenerate::quoteValue($bannerP['resizes'])
                        . "," . $bannerP['height'] . "," . $bannerP['width'] . "," . $bannerP['position']
                        . ");"
                        . "\n";
                //
            }
            $sql.="\n\n";
        }
        //
        //Lấy danh mục tin tức
        $newscategories = NewsCategories::getAllCategory();
        foreach ($newscategories as $nc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['newcategory'] . " (cat_id, site_id, user_id, cat_parent, cat_name, `alias`, cat_order, cat_description, cat_countchild, image_path, image_name, `status`, created_time, modified_time, showinhome, meta_keywords, meta_description, meta_title) "
                    . "VALUES (null,[site_id],[user_id]," . (isset($store[Yii::app()->params['tables']['newcategory']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['newcategory']][$nc['cat_parent']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . "," . $nc['cat_order']
                    . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild'] . "," . ClaGenerate::quoteValue($nc['image_path']) . ","
                    . ClaGenerate::quoteValue($nc['image_name']) . "," . $nc['status'] . ",[now], [now]," . $nc['showinhome'] . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description']) . "," . ClaGenerate::quoteValue($nc['meta_title'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['newcategory'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['newcategory']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['newcategory'] . $nc['cat_id'];
        }
        //
        //Tin tức
        $news = News::getAllNews(array('limit' => 1000, 'full' => true));
        foreach ($news as $ne) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['news'] . " (news_id, news_category_id, news_title, news_sortdesc, news_desc, `alias`, `status`, meta_keywords, meta_description, site_id, user_id, image_path, image_name, created_time, modified_time, modified_by, news_hot, news_source, poster, publicdate) ";
            $sql.= "VALUES (null," . (isset($store[Yii::app()->params['tables']['newcategory']][$ne['news_category_id']]) ? '@' . $store[Yii::app()->params['tables']['newcategory']][$ne['news_category_id']]['map'] : 0) . "," . ClaGenerate::quoteValue($ne['news_title'])
                    . "," . ClaGenerate::quoteValue($ne['news_sortdesc']) . "," . ClaGenerate::quoteValue($ne['news_desc'])
                    . "," . ClaGenerate::quoteValue($ne['alias']) . "," . $ne['status'] . "," . ClaGenerate::quoteValue($ne['meta_keywords']) . "," . ClaGenerate::quoteValue($ne['meta_description'])
                    . ",[site_id],[user_id]," . ClaGenerate::quoteValue($ne['image_path']) . "," . ClaGenerate::quoteValue($ne['image_name']) . ",[now], [now],[user_id],"
                    . $ne['news_hot'] . "," . ClaGenerate::quoteValue($ne['news_source']) . "," . ClaGenerate::quoteValue($ne['poster']) . ",[now]);";
            $sql.= "set @" . Yii::app()->params['tables']['news'] . $ne['news_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['news']][$ne['news_id']]['map'] = Yii::app()->params['tables']['news'] . $ne['news_id'];
        }
        $sql.="\n\n";
        //
        // Lấy danh mục bài viết
        $postscategories = PostCategories::getAllCategory();
        foreach ($postscategories as $nc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['postcategory'] . " (cat_id, site_id, user_id, cat_parent, cat_name, `alias`, cat_order, cat_description, cat_countchild, image_path, image_name, `status`, created_time, modified_time, showinhome, meta_keywords, meta_description, meta_title) "
                    . "VALUES (null,[site_id],[user_id]," . (isset($store[Yii::app()->params['tables']['postcategory']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['postcategory']][$nc['cat_parent']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . "," . $nc['cat_order']
                    . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild'] . "," . ClaGenerate::quoteValue($nc['image_path']) . ","
                    . ClaGenerate::quoteValue($nc['image_name']) . "," . $nc['status'] . ",[now],[now]," . $nc['showinhome'] . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description']) . "," . ClaGenerate::quoteValue($nc['meta_title'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['postcategory'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['postcategory']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['postcategory'] . $nc['cat_id'];
        }
        // Lấy bài viết
        $news = Posts::getAllPosts(array('limit' => 1000));
        foreach ($news as $ne) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['post'] . " (id, category_id, title, sortdesc, description, `alias`, `status`, meta_keywords, meta_description, site_id, user_id, image_path, image_name, created_time, modified_time, modified_by, publicdate) ";
            $sql.= "VALUES (null," . (isset($store[Yii::app()->params['tables']['postcategory']][$ne['category_id']]) ? '@' . $store[Yii::app()->params['tables']['postcategory']][$ne['category_id']]['map'] : 0) . "," . ClaGenerate::quoteValue($ne['title'])
                    . "," . ClaGenerate::quoteValue($ne['sortdesc']) . "," . ClaGenerate::quoteValue($ne['description'])
                    . "," . ClaGenerate::quoteValue($ne['alias']) . "," . $ne['status'] . "," . ClaGenerate::quoteValue($ne['meta_keywords']) . "," . ClaGenerate::quoteValue($ne['meta_description'])
                    . ",[site_id],[user_id]," . ClaGenerate::quoteValue($ne['image_path']) . "," . ClaGenerate::quoteValue($ne['image_name']) . ",[now], [now],[user_id],"
                    . "[now]);";
            $sql.= "set @" . Yii::app()->params['tables']['post'] . $ne['id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['post']][$ne['id']]['map'] = Yii::app()->params['tables']['post'] . $ne['id'];
        }
        $sql.="\n\n";
        //
        // attribute set
        $attributeSets = BuildHelper::helper()->getAllAttributeSetInSite(array('limit' => 1000));
        foreach ($attributeSets as $set) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['product_attribute_set'] . " (id, `name`, `code`, sort_order, site_id) "
                    . "VALUES (null," . ClaGenerate::quoteValue($set['name']) . "," . ClaGenerate::quoteValue($set['code']) . "," . $set['sort_order'] . ",[site_id]"
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['product_attribute_set'] . $set['id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['product_attribute_set']][$set['id']]['map'] = Yii::app()->params['tables']['product_attribute_set'] . $set['id'];
        }
        $sql.="\n";
        //Danh mục sản phẩm
        $productcategories = ProductCategories::getAllCategory();
        foreach ($productcategories as $nc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['productcategory'] . " (cat_id, site_id, attribute_set_id, cat_parent, cat_name, `alias`, cat_order, cat_description, cat_countchild, image_path, image_name, `status`, created_time, modified_time, showinhome, meta_keywords, meta_description, icon_path, icon_name) "
                    . "VALUES (null,[site_id],"
                    . (isset($store[Yii::app()->params['tables']['product_attribute_set']][$nc['attribute_set_id']]) ? "@" . $store[Yii::app()->params['tables']['product_attribute_set']][$nc['attribute_set_id']]['map'] : 'NULL')
                    . "," . (isset($store[Yii::app()->params['tables']['productcategory']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['productcategory']][$nc['cat_parent']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . "," . $nc['cat_order']
                    . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild'] . "," . ClaGenerate::quoteValue($nc['image_path'])
                    . "," . ClaGenerate::quoteValue($nc['image_name']) . "," . $nc['status'] . ",[now], [now]," . $nc['showinhome'] . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description'])
                    . "," . ClaGenerate::quoteValue($nc['icon_path']) . "," . ClaGenerate::quoteValue($nc['icon_name'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['productcategory'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['productcategory']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['productcategory'] . $nc['cat_id'];
        }
        $sql.="\n";
        //
        // Hãng sản xuất
        $manufacturers = Manufacturer::getFullManufacturersInSite();
        foreach ($manufacturers as $manufacturer) {
            //process category track
            $CategoryTrack = $manufacturer['category_track'];
            $tracks = array();
            if ($CategoryTrack != '') {
                $tr_temp = explode(ClaCategory::CATEGORY_SPLIT, $CategoryTrack);
                if ($tr_temp && count($tr_temp)) {
                    foreach ($tr_temp as $cat_id)
                        if (isset($store[Yii::app()->params['tables']['productcategory']][$cat_id]))
                            array_push($tracks, '@' . $store[Yii::app()->params['tables']['productcategory']][$cat_id]['map']);
                }
            }
            $tracks = implode(",'" . ClaCategory::CATEGORY_SPLIT . "',", $tracks);
            if ($tracks != '')
                $tracks = "CONCAT(" . $tracks . ")";
            else
                $tracks = "''";
            //
            $sql.="INSERT INTO " . Yii::app()->params['tables']['manufacturers'] . " (`id`, `site_id`, `user_id`, `name`, `alias`, `order`, `image_path`, `image_name`, `created_time`, `modified_time`, `category_track`) ";
            $sql.= "VALUES (null,[site_id],[user_id]" . "," . ClaGenerate::quoteValue($manufacturer['name']) . "," . ClaGenerate::quoteValue($manufacturer['alias']) . "," . $manufacturer['order']
                    . "," . ClaGenerate::quoteValue($manufacturer['image_path']) . "," . ClaGenerate::quoteValue($manufacturer['image_name'])
                    . "," . "[now],[now]," . $tracks
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['manufacturers'] . $manufacturer['id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['manufacturers']][$manufacturer['id']]['map'] = Yii::app()->params['tables']['manufacturers'] . $manufacturer['id'];
        }
        $sql.="\n";
        // Manufacturer Info
        $manuInfos = ManufacturerInfo::getManufacturerInfoInSite(array('limit' => 1000));
        foreach ($manuInfos as $manuInfo) {
            //
            if (!$manuInfo['manufacturer_id'] || !isset($store[Yii::app()->params['tables']['manufacturers']][$manuInfo['manufacturer_id']]))
                continue;
            $sql.="INSERT INTO " . Yii::app()->params['tables']['manufacturer_info'] . " (`manufacturer_id`, `site_id`, `shortdes`, `description`, `address`, `phone`, `meta_title`, `meta_keywords`, `meta_description`) "
                    . "VALUES (" . "@" . $store[Yii::app()->params['tables']['manufacturers']][$manuInfo['manufacturer_id']]['map'] . ",[site_id]"
                    . "," . ClaGenerate::quoteValue($manuInfo['shortdes']) . "," . ClaGenerate::quoteValue($manuInfo['description']) . "," . ClaGenerate::quoteValue($manuInfo['address']) . "," . ClaGenerate::quoteValue($manuInfo['phone'])
                    . "," . ClaGenerate::quoteValue($manuInfo['meta_title']) . "," . ClaGenerate::quoteValue($manuInfo['meta_keywords']) . "," . ClaGenerate::quoteValue($manuInfo['meta_description'])
                    . ");" . "\n";
            //
        }
        $sql.="\n";
        // Product attribute
        $productAttributes = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_attribute'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        $productAttributesArr = array();
        if ($productAttributes && count($productAttributes)) {
            foreach ($productAttributes as $pro) {
                $productAttributesArr[$pro['id']] = $pro;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_attribute'] . " (`id`, `name`, `code`, `attribute_set_id`, `type`, `frontend_input`, `frontend_label`, `default_value`, `is_configurable`, `is_filterable`, `field_product`, `is_frontend`, `is_system`, `sort_order`,`field_configurable`,`type_option`,`site_id`) "
                        . "VALUES (null," . ClaGenerate::quoteValue($pro['name']) . "," . ClaGenerate::quoteValue($pro['code']) . "," . (($pro['attribute_set_id']) ? "@" . $store[Yii::app()->params['tables']['product_attribute_set']][$pro['attribute_set_id']]['map'] : 'null')
                        . "," . ClaGenerate::quoteValue($pro['type']) . "," . ClaGenerate::quoteValue($pro['frontend_input']) . "," . ClaGenerate::quoteValue($pro['frontend_label']) . "," . ClaGenerate::quoteValue($pro['default_value'])
                        . "," . $pro['is_configurable'] . "," . $pro['is_filterable'] . "," . $pro['field_product'] . "," . $pro['is_frontend'] . "," . $pro['is_system'] . "," . $pro['sort_order'] . "," . $pro['field_configurable'] . "," . $pro['type_option'] . ",[site_id]"
                        . ");" . "\n";
                //
                $sql.= "set @" . Yii::app()->params['tables']['product_attribute'] . $pro['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['product_attribute']][$pro['id']]['map'] = Yii::app()->params['tables']['product_attribute'] . $pro['id'];
            }
            unset($productAttributes);
            $sql.="\n";
        }
        //
        //product attribute option
        $productAttributeOptions = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_attribute_option'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productAttributeOptions && count($productAttributeOptions)) {
            foreach ($productAttributeOptions as $pro) {
                //$index_key = (isset($productAttributesArr[$pro['attribute_id']]) && $productAttributesArr[$pro['attribute_id']]['frontend_input'] != 'multiselect') ? 0 : $pro['index_key'];
                $index_key = $pro['index_key'];
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_attribute_option'] . " (`id`, `attribute_id`, `index_key`, `sort_order`, `value`,`ext`,`site_id`) "
                        . "VALUES (null," . (($pro['attribute_id'] && isset($store[Yii::app()->params['tables']['product_attribute']][$pro['attribute_id']])) ? "@" . $store[Yii::app()->params['tables']['product_attribute']][$pro['attribute_id']]['map'] : 0)
                        . "," . $index_key . "," . $pro['sort_order'] . "," . ClaGenerate::quoteValue($pro['value']) . "," . ClaGenerate::quoteValue($pro['ext']) . ",[site_id]"
                        . ");" . "\n";
                //
                $sql.= "set @" . Yii::app()->params['tables']['product_attribute_option'] . $pro['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['product_attribute_option']][$pro['id']]['map'] = Yii::app()->params['tables']['product_attribute_option'] . $pro['id'];
                //
                if (isset($productAttributesArr[$pro['attribute_id']]) && $productAttributesArr[$pro['attribute_id']]['frontend_input'] != 'multiselect') {
                    $sql.="UPDATE " . Yii::app()->params['tables']['product_attribute_option'] . " SET index_key=id"
                            . " WHERE id=@" . Yii::app()->params['tables']['product_attribute_option'] . $pro['id'] . ";\n";
                }
            }
            //
            $sql.="\n";
        }
        //product attribute option index
        $productAttributeOptionIndex = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_attribute_option_index'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productAttributeOptionIndex && count($productAttributeOptionIndex)) {
            foreach ($productAttributeOptionIndex as $pro) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_attribute_option_index'] . " (`attribute_id`, `value_key`,`site_id`) "
                        . "VALUES (" . (($pro['attribute_id'] && isset($store[Yii::app()->params['tables']['product_attribute']][$pro['attribute_id']])) ? "@" . $store[Yii::app()->params['tables']['product_attribute']][$pro['attribute_id']]['map'] : 0)
                        . "," . $pro['value_key'] . ",[site_id]"
                        . ");" . "\n";
                //
                //$sql.= "set @" . Yii::app()->params['tables']['product_attribute_option'] . $pro['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                //$store[Yii::app()->params['tables']['product_attribute_option']][$pro['id']]['map'] = Yii::app()->params['tables']['product_attribute_option'] . $pro['id'];
            }
            $sql.="\n";
        }
        // Sản phẩm
        $products = Product::getAllProducts(array('limit' => 1000));
        foreach ($products as $pro) {
            //process category track
            $track = $pro['category_track'];
            $tracks = array();
            if ($track != '') {
                $tr_temp = explode(' ', $track);
                if ($tr_temp && count($tr_temp)) {
                    foreach ($tr_temp as $cat_id)
                        if (isset($store[Yii::app()->params['tables']['productcategory']][$cat_id]))
                            array_push($tracks, '@' . $store[Yii::app()->params['tables']['productcategory']][$cat_id]['map']);
                }
            }
            $tracks = implode(",' ',", $tracks);
            if ($tracks != '')
                $tracks = "CONCAT(" . $tracks . ")";
            //
            // process customfield
            for ($i = 1; $i <= 32; $i++) {
                if ($pro['cus_field' . $i] && isset($store[Yii::app()->params['tables']['product_attribute_option']][$pro['cus_field' . $i]]))
                    $pro['cus_field' . $i] = '@' . $store[Yii::app()->params['tables']['product_attribute_option']][$pro['cus_field' . $i]]['map'];
            }
            //
            $sql.="INSERT INTO " . Yii::app()->params['tables']['product'] . " (`id`, `attribute_set_id`, `name`, `code`, `alias`, `ishot`, `price`, `price_market`, `price_discount`, `price_discount_percent`, `avatar_id`, `avatar_path`, `avatar_name`, `currency`, `include_vat`, `quantity`, `position`, `product_category_id`, `category_track`, `status`, `state`, `created_user`, `created_time`, `modified_user`, `modified_time`, `site_id`, `meta_keywords`, `meta_description`, `meta_title`, `list_product_relate`, `isnew`, `manufacturer_id`, `cus_field1`, `cus_field2`, `cus_field3`, `cus_field4`, `cus_field5`, `cus_field6`, `cus_field7`, `cus_field8`, `cus_field9`, `cus_field10`, `cus_field11`, `cus_field12`, `cus_field13`, `cus_field14`, `cus_field15`, `cus_field16`, `cus_field17`, `cus_field18`, `cus_field19`, `cus_field20`, `cus_field21`, `cus_field22`, `cus_field23`, `cus_field24`, `cus_field25`, `cus_field26`, `cus_field27`, `cus_field28`, `cus_field29`, `cus_field30`, `cus_field31`, `cus_field32`, `cus_field33`, `cus_field34`, `cus_field35`, `cus_field36`, `cus_field37`, `cus_field38`) "
                    . "VALUES (null," . (($pro['attribute_set_id']) ? "@" . $store[Yii::app()->params['tables']['product_attribute_set']][$pro['attribute_set_id']]['map'] : 'null') . "," . ClaGenerate::quoteValue($pro['name']) . "," . ClaGenerate::quoteValue($pro['code']) . "," . ClaGenerate::quoteValue($pro['alias'])
                    . "," . $pro['ishot'] . "," . $pro['price'] . "," . $pro['price_market'] . "," . $pro['price_discount'] . "," . $pro['price_discount_percent'] . ",0," . ClaGenerate::quoteValue($pro['avatar_path']) . "," . ClaGenerate::quoteValue($pro['avatar_name'])
                    . "," . ClaGenerate::quoteValue($pro['currency']) . "," . $pro['include_vat'] . "," . $pro['quantity'] . "," . $pro['position']
                    . "," . (($pro['product_category_id']) ? "@" . $store[Yii::app()->params['tables']['productcategory']][$pro['product_category_id']]['map'] : $pro['product_category_id']) . "," . $tracks
                    . "," . $pro['status'] . "," . $pro['state'] . ",[user_id],[now],[user_id],[now],[site_id]"
                    . "," . ClaGenerate::quoteValue($pro['meta_keywords']) . "," . ClaGenerate::quoteValue($pro['meta_description']) . "," . ClaGenerate::quoteValue($pro['meta_title']) . "," . ClaGenerate::quoteValue($pro['list_product_relate'])
                    . "," . $pro['isnew'] . "," . (($pro['manufacturer_id'] && isset($store[Yii::app()->params['tables']['manufacturers']][$pro['manufacturer_id']])) ? "@" . $store[Yii::app()->params['tables']['manufacturers']][$pro['manufacturer_id']]['map'] : 0)
                    . "," . $pro['cus_field1'] . "," . $pro['cus_field2'] . "," . $pro['cus_field3'] . "," . $pro['cus_field4'] . "," . $pro['cus_field5'] . "," . $pro['cus_field6'] . "," . $pro['cus_field7'] . "," . $pro['cus_field8'] . "," . $pro['cus_field9'] . "," . $pro['cus_field10'] . "," . $pro['cus_field11'] . "," . $pro['cus_field12']
                    . "," . $pro['cus_field13'] . "," . $pro['cus_field14'] . "," . $pro['cus_field15'] . "," . $pro['cus_field16'] . "," . $pro['cus_field17'] . "," . $pro['cus_field18'] . "," . $pro['cus_field19']
                    . "," . $pro['cus_field20'] . "," . $pro['cus_field21'] . "," . $pro['cus_field22'] . "," . $pro['cus_field23'] . "," . $pro['cus_field24'] . "," . $pro['cus_field25'] . "," . $pro['cus_field26'] . "," . $pro['cus_field27'] . "," . $pro['cus_field28'] . "," . $pro['cus_field29']
                    . "," . $pro['cus_field30'] . "," . $pro['cus_field31'] . "," . $pro['cus_field32'] . "," . $pro['cus_field33'] . "," . $pro['cus_field34'] . "," . $pro['cus_field35'] . "," . $pro['cus_field36'] . "," . $pro['cus_field37'] . "," . $pro['cus_field38']
                    . ");" . "\n";
            //
            $sql.= "set @" . Yii::app()->params['tables']['product'] . $pro['id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['product']][$pro['id']]['map'] = Yii::app()->params['tables']['product'] . $pro['id'];
        }
        $sql.="\n";
        //
        // Products Info
        $productsInfo = ProductInfo::getProductInfoInSite(array('limit' => 1000));
        foreach ($productsInfo as $pro) {
            // process dynamic field
            $dynamic = ($pro['dynamic_field']) ? json_decode($pro['dynamic_field'], true) : array();
            $dynamicArr = array();
            $replace = array();
            $dstr = '';
            if (!empty($dynamic)) {
                foreach ($dynamic as $key => $dyn) {
                    // attribute id
                    $dynamicArr[$key]['id'] = "id" . $key . $dyn['id'];
                    $replace["id" . $key . $dyn['id']] = "',@" . $store[Yii::app()->params['tables']['product_attribute']][$dyn['id']]['map'] . ",'";
                    // attribute name
                    $dynamicArr[$key]['name'] = $dyn['name'];
                    // attribute code
                    $dynamicArr[$key]['code'] = $dyn['code'];
                    //
                    if ($dyn['index_key'] && !is_array($dyn['index_key']) && isset($store[Yii::app()->params['tables']['product_attribute_option']][$dyn['index_key']])) {
                        $dynamicArr[$key]['index_key'] = "indexkey" . $key . $dyn['index_key'];
                        $replace["indexkey" . $key . $dyn['index_key']] = "',@" . $store[Yii::app()->params['tables']['product_attribute_option']][$dyn['index_key']]['map'] . ",'";
                        $dynamicArr[$key]['value'] = "value" . $key . $dyn['value'];
                        $replace["value" . $key . $dyn['value']] = "',@" . $store[Yii::app()->params['tables']['product_attribute_option']][$dyn['index_key']]['map'] . ",'";
                    } else {
                        $dynamicArr[$key]['index_key'] = $dyn['index_key'];
                        $dynamicArr[$key]['value'] = $dyn['value'];
                    }
                }
            }
            if (!empty($dynamicArr)) {
                $dstr = json_encode($dynamicArr, JSON_UNESCAPED_UNICODE);
                $dstr = "CONCAT('" . str_replace(array_keys($replace), $replace, $dstr) . "')";
                $dstr = str_replace('\u', '\\u', $dstr);
            } else
                $dstr = ClaGenerate::quoteValue('');
            //
            if (!$pro['product_id'] || !isset($store[Yii::app()->params['tables']['product']][$pro['product_id']]))
                continue;
            //
            $sql.="INSERT INTO " . Yii::app()->params['tables']['productinfo'] . " (product_id, product_sortdesc, product_desc, dynamic_field, meta_title, meta_keywords, meta_description, list_product_relate, site_id) "
                    . "VALUES (" . (($pro['product_id'] && $store[Yii::app()->params['tables']['product']][$pro['product_id']]) ? "@" . $store[Yii::app()->params['tables']['product']][$pro['product_id']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($pro['product_sortdesc']) . "," . ClaGenerate::quoteValue($pro['product_desc']) . "," . $dstr
                    . "," . ClaGenerate::quoteValue($pro['meta_title']) . "," . ClaGenerate::quoteValue($pro['meta_keywords']) . "," . ClaGenerate::quoteValue($pro['meta_description']) . "," . ClaGenerate::quoteValue($pro['list_product_relate'])
                    . ",[site_id]" . ");" . "\n";
            //
        }
        $sql.="\n";
        //
        //Thuộc tính tùy chọn
        $productConfigurables = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_configurable'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productConfigurables && count($productConfigurables)) {
            foreach ($productConfigurables as $pc) {
                if (!$pc['product_id'] || !isset($store[Yii::app()->params['tables']['product']][$pc['product_id']]))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_configurable'] . " (`product_id`,`attribute1_id`,`attribute2_id`,`site_id`) "
                        . "VALUES ("
                        . "@" . $store[Yii::app()->params['tables']['product']][$pc['product_id']]['map']
                        . "," . (($pc['attribute1_id'] && isset($store[Yii::app()->params['tables']['product_attribute']][$pc['attribute1_id']])) ? "@" . $store[Yii::app()->params['tables']['product_attribute']][$pc['attribute1_id']]['map'] : 0)
                        . "," . (($pc['attribute2_id'] && isset($store[Yii::app()->params['tables']['product_attribute']][$pc['attribute2_id']])) ? "@" . $store[Yii::app()->params['tables']['product_attribute']][$pc['attribute2_id']]['map'] : 0)
                        . ",[site_id]"
                        . ");" . "\n";
                //
            }
            $sql.="\n";
        }
        // Giá trị của thuộc tính tủy chọn
        $productConfigurableValues = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_configurable_value'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productConfigurableValues && count($productConfigurableValues)) {
            foreach ($productConfigurableValues as $pc) {
                if (!$pc['product_id'] || !isset($store[Yii::app()->params['tables']['product']][$pc['product_id']]))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_configurable_value'] . " (`id`, `product_id`, `attribute1_value`, `attribute2_value`, `price`, `multitext`, `site_id`) "
                        . "VALUES (null,"
                        . "@" . $store[Yii::app()->params['tables']['product']][$pc['product_id']]['map']
                        . "," . $pc['attribute1_value'] . "," . $pc['attribute2_value'] . "," . $pc['price'] . "," . ClaGenerate::quoteValue($pc['multitext'])
                        . ",[site_id]"
                        . ");" . "\n";
                //
                $sql.= "set @" . Yii::app()->params['tables']['product_configurable_value'] . $pc['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['product_configurable_value']][$pc['id']]['map'] = Yii::app()->params['tables']['product_configurable_value'] . $pc['id'];
            }
            $sql.="\n";
        }
        // Ảnh của thuộc tính tủy chọn
        $productConfigurableValueImages = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['product_configurable_images'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productConfigurableValueImages && count($productConfigurableValueImages)) {
            foreach ($productConfigurableValueImages as $pcv) {
                if (!$pcv['product_id'] || !$pcv['pcv_id'] || !isset($store[Yii::app()->params['tables']['product']][$pcv['product_id']]) || !isset($store[Yii::app()->params['tables']['product_configurable_value']][$pcv['pcv_id']]))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['product_configurable_images'] . " (`img_id`, `product_id`, `pcv_id`, `name`, `path`, `display_name`, `description`, `alias`, `site_id`, `user_id`, `height`, `width`, `created_time`, `modified_time`, `resizes`) "
                        . "VALUES (null"
                        . "," . "@" . $store[Yii::app()->params['tables']['product']][$pcv['product_id']]['map']
                        . "," . "@" . $store[Yii::app()->params['tables']['product_configurable_value']][$pcv['pcv_id']]['map']
                        . "," . ClaGenerate::quoteValue($pcv['name']) . "," . ClaGenerate::quoteValue($pcv['path']) . "," . ClaGenerate::quoteValue($pcv['display_name'])
                        . "," . ClaGenerate::quoteValue($pcv['description']) . "," . ClaGenerate::quoteValue($pcv['alias']) . ",[site_id],[user_id]"
                        . "," . $pcv['height'] . "," . $pcv['width'] . ",[now],[now]," . ClaGenerate::quoteValue($pcv['resizes'])
                        . ");" . "\n";
                //
            }
            $sql.="\n";
        }
        //
        // Ảnh cho sản phẩm
        $productimages = Product::getAllImages();
        foreach ($productimages as $pi) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['productimage'] . " (img_id, product_id, `name`, `path`, display_name, description, `alias`, site_id, user_id, height, width, created_time, modified_time) "
                    . "VALUES (null," . (isset($store[Yii::app()->params['tables']['product']][$pi['product_id']]) ? '@' . $store[Yii::app()->params['tables']['product']][$pi['product_id']]['map'] : 0) . "," . ClaGenerate::quoteValue($pi['name']) . "," . ClaGenerate::quoteValue($pi['path'])
                    . "," . ClaGenerate::quoteValue($pi['display_name']) . "," . ClaGenerate::quoteValue($pi['description'])
                    . "," . ClaGenerate::quoteValue($pi['alias']) . ",[site_id],[user_id]," . $pi['height'] . "," . $pi['width'] . ",[now],[now]"
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['productimage'] . $pi['img_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['productimage']][$pi['img_id']]['map'] = Yii::app()->params['tables']['productimage'] . $pi['img_id'];
        }
        $sql.="\n";
        // Cập nhật avatar_id for product
        foreach ($products as $pro) {
            if (!isset($store[Yii::app()->params['tables']['productimage']][$pro['avatar_id']]))
                continue;
            $sql.="UPDATE " . Yii::app()->params['tables']['product'] . " SET avatar_id=@" . $store[Yii::app()->params['tables']['productimage']][$pro['avatar_id']]['map']
                    . " WHERE id=@" . $store[Yii::app()->params['tables']['product']][$pro['id']]['map'] . ";\n";
        }
        //
        $sql.="\n\n";
        //
        // Nhóm sản phẩm
        $productGroups = Yii::app()->db->createCommand()
                ->select('*')
                ->from(Yii::app()->params['tables']['productgroups'])
                ->where('site_id=' . $this->site_id)
                ->queryAll();
        if ($productGroups && count($productGroups)) {
            foreach ($productGroups as $pg) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['productgroups'] . " (`group_id`, `site_id`, `user_id`, `name`, `description`, `status`, `alias`, `showinhome`, `meta_keywords`, `meta_description`, `meta_title`, `created_time`) "
                        . "VALUES (null,[site_id],[user_id]," . ClaGenerate::quoteValue($pg['name']) . "," . ClaGenerate::quoteValue($pg['description']) . ',' . $pg['status']
                        . ',' . ClaGenerate::quoteValue($pg['alias']) . "," . $pg['showinhome'] . "," . ClaGenerate::quoteValue('meta_keywords') . "," . ClaGenerate::quoteValue('meta_description') . "," . ClaGenerate::quoteValue('meta_title') . ",[now]"
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['productgroups'] . $pg['group_id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['productgroups']][$pg['group_id']]['map'] = Yii::app()->params['tables']['productgroups'] . $pg['group_id'];
            }
            $sql.="\n";
            $productToGroup = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from(Yii::app()->params['tables']['product_to_group'])
                    ->where('site_id=' . $this->site_id)
                    ->queryAll();
            if ($productToGroup && count($productToGroup)) {
                foreach ($productToGroup as $pTg) {
                    $sql.="INSERT INTO " . Yii::app()->params['tables']['product_to_group'] . " (`id`, `group_id`, `product_id`, `site_id`, `created_time`) "
                            . "VALUES (null," . (isset($store[Yii::app()->params['tables']['productgroups']][$pTg['group_id']]) ? '@' . $store[Yii::app()->params['tables']['productgroups']][$pTg['group_id']]['map'] : 0)
                            . ',' . (isset($store[Yii::app()->params['tables']['product']][$pTg['product_id']]) ? '@' . $store[Yii::app()->params['tables']['product']][$pTg['product_id']]['map'] : 0)
                            . ',[site_id],[now]'
                            . ");" . "\n";
                    //
                }
                $sql.="\n";
            }
        }
        // Trang nội dung
        $pagecategory = CategoryPage::getAllCategoryPage(array('limit' => 1000));
        foreach ($pagecategory as $pc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['categorypage'] . " (id, title, content, site_id, user_id, `alias`, created_time, modified_time, modified_by, meta_keywords, meta_description, meta_title, image_path, image_name) "
                    . "VALUES (null," . ClaGenerate::quoteValue($pc['title']) . "," . ClaGenerate::quoteValue($pc['content']) . ",[site_id],[user_id]"
                    . "," . ClaGenerate::quoteValue($pc['alias']) . ",[now],[now],[user_id]"
                    . "," . ClaGenerate::quoteValue($pc['meta_keywords']) . "," . ClaGenerate::quoteValue($pc['meta_description']) . "," . ClaGenerate::quoteValue($pc['meta_title']) . "," . ClaGenerate::quoteValue($pc['image_path']) . "," . ClaGenerate::quoteValue($pc['image_name'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['categorypage'] . $pc['id'] . " = LAST_INSERT_ID();" . "\n";
            $store[Yii::app()->params['tables']['categorypage']][$pc['id']]['map'] = Yii::app()->params['tables']['categorypage'] . $pc['id'];
        }
        $sql.="\n\n";
        //
        // video
        $videos = Videos::getVideoInSite(array('limit' => 100));
        if (count($videos)) {
            foreach ($videos as $video) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['video'] . " (video_id, site_id, user_id, video_title, video_description, video_link, video_embed, video_height, video_width, video_prominent, `status`, avatar_path, avatar_name, `alias`, `order`, meta_keywords, meta_description, created_time, modified_time) "
                        . "VALUES (null,[site_id],[user_id]," . ClaGenerate::quoteValue($video['video_title']) . "," . ClaGenerate::quoteValue($video['video_description']) . "," . ClaGenerate::quoteValue($video['video_link'])
                        . "," . ClaGenerate::quoteValue($video['video_embed']) . "," . $video['video_height'] . "," . $video['video_width'] . "," . $video['video_prominent'] . "," . $video['status'] . "," . ClaGenerate::quoteValue($video['avatar_path']) . "," . ClaGenerate::quoteValue($video['avatar_name'])
                        . "," . ClaGenerate::quoteValue($video['alias']) . "," . $video['order'] . "," . ClaGenerate::quoteValue($video['meta_keywords']) . "," . ClaGenerate::quoteValue($video['meta_description']) . ",[now],[now]"
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['video'] . $video['video_id'] . " = LAST_INSERT_ID();" . "\n";
                $store[Yii::app()->params['tables']['video']][$video['video_id']]['map'] = Yii::app()->params['tables']['video'] . $video['video_id'];
            }
            $sql.="\n\n";
        }
        //
        // Tuyển dụng
        $jobs = Jobs::getJobInSite(array('limit' => 100));
        if (count($jobs)) {
            foreach ($jobs as $job) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['job'] . " (id, user_id, site_id, `position`, degree, trade_id, typeofwork, location, quantity, salaryrange, currency, salary_min, salary_max, description, experience, `level`, includes, requirement, benefit, expirydate, publicdate, created_time, modified_time, `alias`, contact_username, contact_email, contact_phone, contact_address,image_path,image_name) "
                        . "VALUES (null,[user_id],[site_id]," . ClaGenerate::quoteValue($job['position']) . "," . $job['degree'] . "," . $job['trade_id'] . "," . $job['typeofwork'] . "," . ClaGenerate::quoteValue($job['location']) . "," . $job['quantity']
                        . "," . $job['salaryrange'] . "," . $job['currency'] . "," . $job['salary_min'] . "," . $job['salary_max'] . "," . ClaGenerate::quoteValue($job['description']) . "," . $job['experience'] . "," . $job['level']
                        . "," . ClaGenerate::quoteValue($job['includes']) . "," . ClaGenerate::quoteValue($job['requirement']) . "," . ClaGenerate::quoteValue($job['benefit'])
                        . "," . $job['expirydate'] . "," . $job['publicdate'] . ",[now],[now]"
                        . "," . ClaGenerate::quoteValue($job['alias']) . "," . ClaGenerate::quoteValue($job['contact_username']) . "," . ClaGenerate::quoteValue($job['contact_email']) . "," . ClaGenerate::quoteValue($job['contact_phone']) . "," . ClaGenerate::quoteValue($job['contact_address'])
                        . "," . ClaGenerate::quoteValue($job['image_path']) . "," . ClaGenerate::quoteValue($job['image_name'])
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['job'] . $job['id'] . " = LAST_INSERT_ID();" . "\n";
                $store[Yii::app()->params['tables']['job']][$job['id']]['map'] = Yii::app()->params['tables']['job'] . $job['id'];
            }
            $sql.="\n\n";
        }
        //
        // Danh muc anh
        //
        $albumcategories = AlbumsCategories::getAllCategory();
        foreach ($albumcategories as $nc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['albums_categories'] . " (`cat_id`, `site_id`, `cat_parent`, `cat_name`, `alias`, `cat_order`, `cat_description`, `cat_countchild`, `image_path`, `image_name`, `status`, `created_time`, `modified_time`, `showinhome`, `meta_keywords`, `meta_description`, `meta_title`) "
                    . "VALUES (null,[site_id]," . (isset($store[Yii::app()->params['tables']['albums_categories']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['albums_categories']][$nc['cat_parent']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . "," . $nc['cat_order']
                    . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild'] . "," . ClaGenerate::quoteValue($nc['image_path']) . ","
                    . ClaGenerate::quoteValue($nc['image_name']) . "," . $nc['status'] . ",[now], [now]," . $nc['showinhome'] . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description']) . "," . ClaGenerate::quoteValue($nc['meta_title'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['albums_categories'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['albums_categories']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['albums_categories'] . $nc['cat_id'];
        }
        //
        // Album ảnh
        $albums = Albums::getAllAlbum(array('limit' => 100));
        if ($albums && count($albums)) {
            foreach ($albums as $album) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['album'] . " (album_id, album_name, album_description, album_type, photocount, `alias`, site_id, user_id, meta_keywords, meta_description, avatar_path, avatar_name, avatar_id, created_time, modified_time, cat_id,`order`) "
                        . "VALUES (null," . ClaGenerate::quoteValue($album['album_name']) . "," . ClaGenerate::quoteValue($album['album_description']) . "," . $album['album_type'] . "," . $album['photocount']
                        . "," . ClaGenerate::quoteValue($album['alias']) . ",[site_id],[user_id]" . "," . ClaGenerate::quoteValue($album['meta_keywords']) . "," . ClaGenerate::quoteValue($album['meta_description'])
                        . "," . ClaGenerate::quoteValue($album['avatar_path']) . "," . ClaGenerate::quoteValue($album['avatar_name']) . "," . $album['avatar_id'] . ",[now],[now]"
                        . "," . (isset($store[Yii::app()->params['tables']['albums_categories']][$album['cat_id']]) ? '@' . $store[Yii::app()->params['tables']['albums_categories']][$album['cat_id']]['map'] : 0)
                        . "," . $album['order']
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['album'] . $album['album_id'] . " = LAST_INSERT_ID();" . "\n";
                $store[Yii::app()->params['tables']['album']][$album['album_id']]['map'] = Yii::app()->params['tables']['album'] . $album['album_id'];
            }
            $sql.="\n\n";
            // Ảnh cho album
            $albumImages = Images::getImagesInSite(array('limit' => 100));
            foreach ($albumImages as $pi) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['image'] . " (img_id, album_id, `name`, `path`, display_name, description, `alias`, site_id, user_id, height, width, created_time, modified_time) "
                        . "VALUES (null," . (isset($store[Yii::app()->params['tables']['album']][$pi['album_id']]) ? '@' . $store[Yii::app()->params['tables']['album']][$pi['album_id']]['map'] : 0) . "," . ClaGenerate::quoteValue($pi['name']) . "," . ClaGenerate::quoteValue($pi['path'])
                        . "," . ClaGenerate::quoteValue($pi['display_name']) . "," . ClaGenerate::quoteValue($pi['description'])
                        . "," . ClaGenerate::quoteValue($pi['alias']) . ",[site_id],[user_id]," . $pi['height'] . "," . $pi['width'] . ",[now],[now]"
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['image'] . $pi['img_id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['image']][$pi['img_id']]['map'] = Yii::app()->params['tables']['image'] . $pi['img_id'];
            }
            $sql.="\n";
        }

        //
        // Edu_course
        // course category
        $categories = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course_categories'))
                ->where("site_id=$site_id")
                ->order('created_time')
                ->queryAll();
        if ($categories && count($categories)) {
            foreach ($categories as $nc) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_course_categories'] . " (`cat_id`, `site_id`, `cat_parent`, `cat_name`, `alias`, `cat_order`, `cat_description`, `cat_countchild`, `image_path`, `image_name`, `status`, `created_time`, `modified_time`, `showinhome`, `meta_keywords`, `meta_description`, `meta_title`) "
                        . "VALUES (null,[site_id]," . (isset($store[Yii::app()->params['tables']['edu_course_categories']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['edu_course_categories']][$nc['cat_parent']]['map'] : 0)
                        . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . "," . $nc['cat_order']
                        . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild'] . "," . ClaGenerate::quoteValue($nc['image_path']) . ","
                        . ClaGenerate::quoteValue($nc['image_name']) . "," . $nc['status'] . ",[now], [now]," . $nc['showinhome'] . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description']) . "," . ClaGenerate::quoteValue($nc['meta_title'])
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['edu_course_categories'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['edu_course_categories']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['edu_course_categories'] . $nc['cat_id'];
            }
            $sql.="\n\n";
        }
        // course
        $courses = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course'))
                ->where("site_id=$site_id")
                ->order('order')
                ->queryAll();
        if ($courses && count($courses)) {
            foreach ($courses as $co) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_course'] . " (`id`, `site_id`, `cat_id`, `name`, `alias`, `price`, `price_market`, `status`, `order`, `image_path`, `image_name`, `created_time`, `modified_time`, `viewed`, `time_for_study`, `number_of_students`, `school_schedule`, `course_open`, `course_finish`, `sort_description`, `number_lession`, `ishot`) "
                        . "VALUES (null,[site_id]," . (isset($store[Yii::app()->params['tables']['edu_course_categories']][$co['cat_id']]) ? "@" . $store[Yii::app()->params['tables']['edu_course_categories']][$co['cat_id']]['map'] : 0)
                        . "," . ClaGenerate::quoteValue($co['name']) . "," . ClaGenerate::quoteValue($co['alias']) . "," . $co['price'] . "," . $co['price_market'] . "," . (int) $co['status'] . "," . (int) $co['order']
                        . "," . ClaGenerate::quoteValue($co['image_path']) . "," . ClaGenerate::quoteValue($co['image_name']) . ",[now], [now]," . $co['viewed'] . "," . ClaGenerate::quoteValue($co['time_for_study'])
                        . "," . (int) $co['number_of_students'] . "," . ClaGenerate::quoteValue($co['school_schedule']) . "," . $co['course_open'] . "," . (int) $co['course_finish'] . "," . ClaGenerate::quoteValue($co['sort_description']) . "," . (int) $co['number_lession'] . "," . (int) $co['ishot']
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['edu_course'] . $co['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['edu_course']][$co['id']]['map'] = Yii::app()->params['tables']['edu_course'] . $co['id'];
            }
            $sql.="\n\n";
        }
        // course info
        $courseInfos = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course_info'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($courseInfos && count($courseInfos)) {
            foreach ($courseInfos as $coi) {
                if (!isset($store[Yii::app()->params['tables']['edu_course']][$coi['course_id']]))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_course_info'] . " (`course_id`, `meta_keywords`, `meta_description`, `meta_title`, `description`, `site_id`) "
                        . "VALUES (" . "@" . $store[Yii::app()->params['tables']['edu_course']][$coi['course_id']]['map']
                        . "," . ClaGenerate::quoteValue($coi['meta_keywords']) . "," . ClaGenerate::quoteValue($coi['meta_description'])
                        . "," . ClaGenerate::quoteValue($coi['meta_title']) . "," . ClaGenerate::quoteValue($coi['description']) . ",[site_id]"
                        . ");" . "\n";
            }
            $sql.="\n\n";
        }
        // course shift
        $courseShift = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course_shift'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($courseShift && count($courseShift)) {
            foreach ($courseShift as $cos) {
                if (!isset($store[Yii::app()->params['tables']['edu_course']][$cos['course_id']]))
                    continue;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_course_shift'] . " (`site_id`, `course_id`, `time`, `shift`, `status`, `created_time`, `modified_time`) "
                        . "VALUES ([site_id]," . "@" . $store[Yii::app()->params['tables']['edu_course']][$cor['course_id']]['map']
                        . "," . $cos['time'] . "," . $cos['shift'] . "," . $cos['status'] . ",[now],[now]"
                        . ");" . "\n";
            }
            $sql.="\n\n";
        }
        //
        // course register
        $courseRegis = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course_register'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($courseRegis && count($courseRegis)) {
            foreach ($courseRegis as $cor) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_course_register'] . " (`id`, `site_id`, `course_id`, `name`, `email`, `phone`, `message`, `created_time`, `modified_time`) "
                        . "VALUES (null,[site_id]," . (isset($store[Yii::app()->params['tables']['edu_course']][$cor['course_id']]) ? "@" . $store[Yii::app()->params['tables']['edu_course']][$cor['course_id']]['map'] : 0)
                        . "," . ClaGenerate::quoteValue($cor['name']) . "," . ClaGenerate::quoteValue($cor['email']) . "," . ClaGenerate::quoteValue($cor['phone'])
                        . "," . ClaGenerate::quoteValue($cor['message']) . ",[now],[now]"
                        . ");" . "\n";
            }
            $sql.="\n\n";
        }
        // lecturer
        $lecturers = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_lecturer'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($lecturers && count($lecturers)) {
            foreach ($lecturers as $lec) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_lecturer'] . " (`id`, `site_id`, `name`, `bod`, `status`, `subject`, `level_of_education`, `avatar_path`, `avatar_name`, `sort_description`, `description`, `gender`, `add`, `phone`, `experience`, `facebook`, `email`, `job_title`, `company`) "
                        . "VALUES (null,[site_id]," . ClaGenerate::quoteValue($lec['name']) . "," . (int) $lec['bod'] . "," . (int) $lec['status'] . "," . ClaGenerate::quoteValue($lec['subject'])
                        . "," . ClaGenerate::quoteValue($lec['level_of_education']) . "," . ClaGenerate::quoteValue($lec['avatar_path']) . "," . ClaGenerate::quoteValue($lec['avatar_name']) . "," . ClaGenerate::quoteValue($lec['sort_description']) . "," . ClaGenerate::quoteValue($lec['description'])
                        . "," . (int) $lec['gender'] . "," . ClaGenerate::quoteValue($lec['add']) . "," . ClaGenerate::quoteValue($lec['phone']) . "," . (int) $lec['experience']
                        . "," . ClaGenerate::quoteValue($lec['facebook']) . "," . ClaGenerate::quoteValue($lec['email']) . "," . ClaGenerate::quoteValue($lec['job_title']) . "," . ClaGenerate::quoteValue($lec['company'])
                        . ");" . "\n";
                $sql.= "set @" . Yii::app()->params['tables']['edu_lecturer'] . $lec['id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['edu_lecturer']][$lec['id']]['map'] = Yii::app()->params['tables']['edu_lecturer'] . $lec['id'];
            }
            $sql.="\n\n";
        }
        //edu_rel_course_lecturer
        $lecturerRel = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_rel_course_lecturer'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($lecturerRel && count($lecturerRel)) {
            foreach ($lecturerRel as $lec) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['edu_rel_course_lecturer'] . " (`id`, `site_id`, `course_id`, `lecturer_id`) "
                        . "VALUES (null,[site_id]"
                        . "," . (isset($store[Yii::app()->params['tables']['edu_course']][$lec['course_id']]) ? "@" . $store[Yii::app()->params['tables']['edu_course']][$lec['course_id']]['map'] : 0)
                        . "," . (isset($store[Yii::app()->params['tables']['edu_lecturer']][$lec['lecturer_id']]) ? "@" . $store[Yii::app()->params['tables']['edu_lecturer']][$lec['lecturer_id']]['map'] : 0)
                        . ");" . "\n";
            }
            $sql.="\n\n";
        }
        // -- BDS --
        //Danh mục tin tức bds
        $categories = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('real_estate_categories'))
                ->where("site_id=$site_id")
                ->order('created_time')
                ->queryAll();
        foreach ($categories as $nc) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['real_estate_categories'] . " (`cat_id`, `site_id`, `cat_parent`, `cat_name`, `alias`, `created_time`, `modified_time`, `status`, `showinhome`, `image_path`, `image_name`, `meta_keywords`, `meta_description`, `meta_title`, `cat_order`, `cat_description`, `cat_countchild`) "
                    . "VALUES (null,[site_id],"
                    . "," . (isset($store[Yii::app()->params['tables']['real_estate_categories']][$nc['cat_parent']]) ? "@" . $store[Yii::app()->params['tables']['real_estate_categories']][$nc['cat_parent']]['map'] : 0)
                    . "," . ClaGenerate::quoteValue($nc['cat_name']) . "," . ClaGenerate::quoteValue($nc['alias']) . ",[now], [now]" . "," . $nc['status'] . "," . $nc['showinhome']
                    . "," . ClaGenerate::quoteValue($nc['image_path']) . "," . ClaGenerate::quoteValue($nc['image_name']) . "," . ClaGenerate::quoteValue($nc['meta_keywords']) . "," . ClaGenerate::quoteValue($nc['meta_description'])
                    . "," . ClaGenerate::quoteValue($nc['meta_title']) . "," . $nc['cat_order'] . "," . ClaGenerate::quoteValue($nc['cat_description']) . "," . $nc['cat_countchild']
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['real_estate_categories'] . $nc['cat_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['real_estate_categories']][$nc['cat_id']]['map'] = Yii::app()->params['tables']['real_estate_categories'] . $nc['cat_id'];
        }
        $sql.="\n";
        // tin tức bds
        $bdsnews = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('real_estate_news'))
                ->where("site_id=$site_id")
                ->queryAll();
        foreach ($bdsnews as $news) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['real_estate_news'] . " (`id`, `site_id`, `name`, `alias`, `status`, `created_time`, `modified_time`, `user_id`, `sort_description`, `description`, `address`, `province_id`, `province_name`, `district_id`, `district_name`, `price`, `unit_price`, `area`, `image_path`, `image_name`, `cat_id`, `type`) "
                    . "VALUES (null,[site_id]," . "," . ClaGenerate::quoteValue($news['name']) . "," . ClaGenerate::quoteValue($news['alias']) . "," . $news['status'] . ",[now], [now], [user_id]"
                    . "," . ClaGenerate::quoteValue($news['sort_description']) . "," . ClaGenerate::quoteValue($news['description']) . "," . ClaGenerate::quoteValue($news['address']) . "," . ClaGenerate::quoteValue($news['province_id'])
                    . "," . ClaGenerate::quoteValue($news['province_name']) . "," . ClaGenerate::quoteValue($news['district_id']) . "," . ClaGenerate::quoteValue($news['district_name']) . "," . ClaGenerate::quoteValue($news['price'])
                    . "," . $news['unit_price'] . "," . $news['area'] . "," . ClaGenerate::quoteValue($news['image_path']) . "," . ClaGenerate::quoteValue($news['image_name'])
                    . "," . (isset($store[Yii::app()->params['tables']['real_estate_categories']][$news['cat_id']]) ? "@" . $store[Yii::app()->params['tables']['real_estate_categories']][$news['cat_id']]['map'] : 0)
                    . "," . $news['type']
                    . ");" . "\n";
        }
        // BDS project
        $projects = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('real_estate_project'))
                ->where("site_id=$site_id")
                ->queryAll();
        foreach ($projects as $project) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['real_estate_project'] . " (`id`, `site_id`, `name`, `alias`, `status`, `created_time`, `modified_time`, `user_id`, `image_path`, `image_name`, `address`, `province_id`, `province_name`, `district_id`, `district_name`) "
                    . "VALUES (null,[site_id]," . "," . ClaGenerate::quoteValue($project['name']) . "," . ClaGenerate::quoteValue($project['alias']) . "," . $project['status'] . ",[now], [now], [user_id]"
                    . "," . ClaGenerate::quoteValue($project['image_path']) . "," . ClaGenerate::quoteValue($project['image_name']) . "," . ClaGenerate::quoteValue($project['address']) . "," . ClaGenerate::quoteValue($news['province_id'])
                    . "," . ClaGenerate::quoteValue($news['province_name']) . "," . ClaGenerate::quoteValue($news['district_id']) . "," . ClaGenerate::quoteValue($news['district_name'])
                    . ");" . "\n";
            $sql.= "set @" . Yii::app()->params['tables']['real_estate_project'] . $project['id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['real_estate_project']][$project['id']]['map'] = Yii::app()->params['tables']['real_estate_project'] . $project['id'];
        }
        // BDS
        $estates = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('real_estate'))
                ->where("site_id=$site_id")
                ->queryAll();
        foreach ($estates as $bds) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['real_estate'] . " (`id`, `site_id`, `name`, `alias`, `status`, `created_time`, `modified_time`, `user_id`, `sort_description`, `description`, `address`, `province_id`, `province_name`, `district_id`, `district_name`, `price`, `unit_price`, `area`, `image_path`, `image_name`, `project_id`, `percent`, `type`, `contact_name`, `contact_phone`, `contact_email`) "
                    . "VALUES (null,[site_id]," . "," . ClaGenerate::quoteValue($bds['name']) . "," . ClaGenerate::quoteValue($bds['alias']) . "," . $bds['status'] . ",[now], [now], [user_id]"
                    . "," . ClaGenerate::quoteValue($bds['sort_description']) . "," . ClaGenerate::quoteValue($bds['description']) . "," . ClaGenerate::quoteValue($bds['address']) . "," . ClaGenerate::quoteValue($bds['province_id'])
                    . "," . ClaGenerate::quoteValue($bds['province_name']) . "," . ClaGenerate::quoteValue($news['district_id']) . "," . ClaGenerate::quoteValue($news['district_name'])
                    . "," . ClaGenerate::quoteValue($bds['province_name']) . "," . ClaGenerate::quoteValue($news['district_id']) . "," . ClaGenerate::quoteValue($news['district_name'])
                    . ");" . "\n";
        }
        // -- END BDS ---
        // Menu group
        $menugroup = MenuGroups::getAllMenuGroup();
        foreach ($menugroup as $mg) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['menu_group'] . " (menu_group_id, menu_group_name, menu_group_description, site_id, user_id, config, created_time, modified_time, modified_by, menu_group_type) "
                    . "VALUES (null," . ClaGenerate::quoteValue($mg['menu_group_name']) . "," . ClaGenerate::quoteValue($mg['menu_group_description']) . ",[site_id],[user_id]"
                    . "," . ClaGenerate::quoteValue($mg['config']) . ",[now],[now],[user_id]," . $mg['menu_group_type']
                    . ");" . "\n";
            //
            $sql.= "set @" . Yii::app()->params['tables']['menu_group'] . $mg['menu_group_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['menu_group']][$mg['menu_group_id']]['map'] = Yii::app()->params['tables']['menu_group'] . $mg['menu_group_id'];
        }
        $sql.="\n";
        // Menu
        $menus = Menus::getAllMenuInSite(null, 'created_time');
        $menuTemp = array();
        foreach ($menus as $menu) {
            $menu = Menus::prepareDataForBuild($menu, $store);
            if ($menu['parent_id'] && isset($store[Yii::app()->params['tables']['menu']][$menu['parent_id']])) {
                $parent = "@" . $store[Yii::app()->params['tables']['menu']][$menu['parent_id']]['map'];
            } else {
                if ($menu['parent_id'] && !isset($store[Yii::app()->params['tables']['menu']][$menu['parent_id']])) {
                    $menuTemp[$menu['menu_id']] = $menu['parent_id'];
                }
                $parent = 0;
            }
            $sql.="INSERT INTO " . Yii::app()->params['tables']['menu'] . " (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, icon_path, icon_name, background_path, background_name, description, created_time, modified_time, modified_by) "
                    . "VALUES (null,[site_id],[user_id]," . (isset($store[Yii::app()->params['tables']['menu_group']][$menu['menu_group']]) ? '@' . $store[Yii::app()->params['tables']['menu_group']][$menu['menu_group']]['map'] : 0) . "," . ClaGenerate::quoteValue($menu['menu_title'])
                    . "," . $parent
                    . "," . $menu['menu_linkto'] . "," . ClaGenerate::quoteValue($menu['menu_link']) . ',' . ClaGenerate::quoteValue($menu['menu_basepath']) . "," . $menu['menu_pathparams']
                    . "," . $menu['menu_order'] . "," . ClaGenerate::quoteValue($menu['alias']) . "," . $menu['status'] . "," . $menu['menu_target']
                    . "," . $menu['menu_values'] . "," . ClaGenerate::quoteValue($menu['icon_path']) . "," . ClaGenerate::quoteValue($menu['icon_name']) . "," . ClaGenerate::quoteValue($menu['background_path']) . "," . ClaGenerate::quoteValue($menu['background_name'])
                    . "," . ClaGenerate::quoteValue($menu['description'])
                    . ",[now],[now],[user_id]"
                    . ");" . "\n";
            //
            $sql.= "set @" . Yii::app()->params['tables']['menu'] . $menu['menu_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['menu']][$menu['menu_id']]['map'] = Yii::app()->params['tables']['menu'] . $menu['menu_id'];
        }
        if (count($menuTemp)) {
            foreach ($menuTemp as $menu_id => $menu_parent) {
                if (!isset($store[Yii::app()->params['tables']['menu']][$menu_parent]))
                    continue;
                $sql.="UPDATE " . Yii::app()->params['tables']['menu'] . " SET parent_id=@" . $store[Yii::app()->params['tables']['menu']][$menu_parent]['map']
                        . " WHERE menu_id=@" . $store[Yii::app()->params['tables']['menu']][$menu_id]['map'] . ";\n";
            }
            unset($menuTemp);
        }
        $sql.="\n\n";
        //
        // Menu Admin
        $menusadmin = MenusAdmin::getAllMenuInSite(null, 'created_time');
        foreach ($menusadmin as $menu) {
            $menu = MenusAdmin::prepareDataForBuild($menu, $store);
            $sql.="INSERT INTO " . Yii::app()->params['tables']['menu_admin'] . " (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) "
                    . "VALUES (null,[site_id],[user_id]," . ClaGenerate::quoteValue($menu['menu_title']) . "," . (isset($store[Yii::app()->params['tables']['menu_admin']][$menu['parent_id']]) ? "@" . $store[Yii::app()->params['tables']['menu_admin']][$menu['parent_id']]['map'] : 0)
                    . "," . $menu['menu_linkto'] . "," . ClaGenerate::quoteValue($menu['menu_link']) . ',' . ClaGenerate::quoteValue($menu['menu_basepath']) . "," . $menu['menu_pathparams']
                    . "," . $menu['menu_order'] . "," . ClaGenerate::quoteValue($menu['alias']) . "," . $menu['status'] . "," . $menu['menu_target']
                    . "," . ClaGenerate::quoteValue($menu['menu_values']) . "," . ClaGenerate::quoteValue($menu['iconclass']) . ",[now],[now],[user_id]"
                    . ");" . "\n";
            //
            $sql.= "set @" . Yii::app()->params['tables']['menu_admin'] . $menu['menu_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['menu_admin']][$menu['menu_id']]['map'] = Yii::app()->params['tables']['menu_admin'] . $menu['menu_id'];
        }
        $sql.="\n\n";
        // forms
        $forms = Forms::getAllForm();
        if (count($forms)) {
            foreach ($forms as $form) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['form'] . " (form_id, form_code, form_name, form_description, site_id, `status`, created_time, modified_time, user_id) "
                        . "VALUES (null," . ClaGenerate::quoteValue($form['form_code']) . "," . ClaGenerate::quoteValue($form['form_name']) . "," . ClaGenerate::quoteValue($form['form_description'])
                        . ",[site_id]," . $form['status'] . ",[now],[now],[user_id]"
                        . ");" . "\n";
                //
                $sql.= "set @" . Yii::app()->params['tables']['form'] . $form['form_id'] . " = LAST_INSERT_ID();" . "\n";
                //
                $store[Yii::app()->params['tables']['form']][$form['form_id']]['map'] = Yii::app()->params['tables']['form'] . $form['form_id'];
            }
            $sql.="\n";
            $formsfields = FormFields::getFieldsInSite();
            $countfields = count($formsfields);
            if ($countfields) {
                $i = 0;
                $sql.="INSERT INTO " . Yii::app()->params['tables']['formfield'] . " (field_id, form_id, field_key, field_label, field_type, field_options, field_required, `order`, site_id, user_id, `status`) VALUES " . "\n";
                foreach ($formsfields as $ff) {
                    $i++;
                    $sql.="(null,@" . $store[Yii::app()->params['tables']['form']][$ff['form_id']]['map']
                            . ", " . ClaGenerate::quoteValue($ff['field_key']) . "," . ClaGenerate::quoteValue($ff['field_label']) . "," . ClaGenerate::quoteValue($ff['field_type'])
                            . "," . ClaGenerate::quoteValue($ff['field_options']) . "," . $ff['field_required'] . "," . $ff['order'] . ",[site_id],[user_id]," . $ff['status'] . ")"
                            . (($i == $countfields) ? ";" : ",") . "\n";
                }
            }
            $sql.="\n\n";
        }
        // site_users
        $siteUsers = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('site_users'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($siteUsers && count($siteUsers)) {
            foreach ($siteUsers as $su) {
                $sql.="INSERT INTO " . Yii::app()->params['tables']['site_users'] . " (`id`, `site_id`, `name`, `job_title`, `phone`, `email`, `skype`, `yahoo`, `status`, `type`, `avatar_path`, `avatar_name`, `created_time`, `modified_time`) "
                        . "VALUES (null,[site_id]," . ClaGenerate::quoteValue($su['name']) . "," . ClaGenerate::quoteValue($su['job_title']) . "," . ClaGenerate::quoteValue($su['phone'])
                        . "," . ClaGenerate::quoteValue($su['email']) . "," . ClaGenerate::quoteValue($su['skype']) . "," . ClaGenerate::quoteValue($su['yahoo'])
                        . "," . (int) $su['status'] . "," . (int) $su['type'] . "," . ClaGenerate::quoteValue($su['avatar_path']) . "," . ClaGenerate::quoteValue($su['avatar_name'])
                        . ",[now],[now]"
                        . ");" . "\n";
                //
            }
            $sql.="\n\n";
        }
        // 
        // module (page widget)
        $pagewidges = Widgets::getWidgets();
        foreach ($pagewidges as $pw) {
            $sql.="INSERT INTO " . Yii::app()->params['tables']['pagewidget'] . " (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) "
                    . "VALUES (null,[site_id],[user_id]," . ClaGenerate::quoteValue($pw['widget_title']) . "," . $pw['position']
                    . "," . ClaGenerate::quoteValue($pw['page_key']) . "," . $pw['widget_type'] . ',' . ClaGenerate::quoteValue($pw['widget_id']) . ",[now]," . $pw['showallpage'] . "," . $pw['worder']
                    . ");" . "\n";
            //
            $sql.= "set @" . Yii::app()->params['tables']['pagewidget'] . $pw['page_widget_id'] . " = LAST_INSERT_ID();" . "\n";
            //
            $store[Yii::app()->params['tables']['pagewidget']][$pw['page_widget_id']]['map'] = Yii::app()->params['tables']['pagewidget'] . $pw['page_widget_id'];
        }
        $sql.="\n";
        // module config(page widget config)
        $pagewidgetconfigs = PageWidgetConfig::getAllPageWidgetConfigs();
        foreach ($pagewidgetconfigs as $pwc) {
            if (!isset($store[Yii::app()->params['tables']['pagewidget']][$pwc['page_widget_id']]))
                continue;
            $pwc = PageWidgetConfig::prepareConfig($pwc, $pagewidges[$pwc['page_widget_id']]);
            $sql.="INSERT INTO " . Yii::app()->params['tables']['pagewidgetconfig'] . " (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) "
                    . "VALUES (null,@" . $store[Yii::app()->params['tables']['pagewidget']][$pwc['page_widget_id']]['map'] . ",[site_id],[user_id]," . $pwc['config_data'] . ",[now],[now]"
                    . ");" . "\n";
        }
        $sql.="\n";
        // echo $sql; die;
        //
        $file = Yii::app()->theme->getBasePath() . '/' . 'data.sql';
        // echo $file; die;
        // if (file_put_contents($file, $sql, FILE_APPEND | LOCK_EX)) {
        //     echo "push ok"; die;
            // $handle = fopen($file, "w");
            // fwrite($handle, $sql);
            // fclose($handle);
        // echo $file; die;

            // exec("chmod 0777 " . $file);
        $handle = fopen($file, "w+");
        fwrite($handle, $sql);
        fclose($handle);
        chmod($file, 0777);

        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename=data.sql');
        echo $sql;

            //die('success');
        // }
        // --------------- end Banner
    }

    /**
     * generate sql for all theme
     */
    function actionGeneratesqlall() {
	echo "test"; die;
        set_time_limit(0);
        // Lấy các themes đã sẵn sàng
        $themes = Themes::model()->findAllByAttributes(array('status' => Themes::STATUS_AVAILABLE));
        foreach ($themes as $theme) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_setopt($ch, CURLOPT_URL, $theme->previewlink . "/site/build/generatesql?key=" . self::BUILD_GENERATE_KEY);
            curl_exec($ch);
        }
        echo 'execute: ' . count($themes);
        Yii::app()->end();
    }

    /**
     * Đặt web theo yêu cầu có trong theme
     */
    function actionOrder() {
        //
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            $this->sendResponse(404);
        //
        $theme_id = Yii::app()->request->getParam('theme');
        $theme = Themes::model()->findByPk($theme_id);
        //
        if (!$theme || $theme->status != Themes::STATUS_DEMO)
            $this->sendResponse(404);
        //
        $model = new Requests;
        $model->theme_id = $theme_id;
        //
        $theme_relaction = Themes::getThemeInRelaction($theme_id, array(
                    'cat_id' => $theme['category_id'],
                    'created_time' => $theme['created_time'],
        ));
        //
        $theme_relaction = ClaArray::getRandomInArray($theme_relaction, 3);
        //
        $this->render('order', array(
            'model' => $model,
            'theme' => $theme,
            'themerelaction' => $theme_relaction,
        ));
    }

    /**
     * Chỉ có web3nhat.com mới chạy được controller này
     * @param type $action
     */
    function beforeAction($action) {
        if ($action->id != 'generatesql' && $action->id != 'generatesqlall') {
	//	echo "123"; die;
            if ($this->site_id . '' != ClaSite::ROOT_SITE_ID . '')
                $this->sendResponse(404);
        }
        //
        return true;
    }

}

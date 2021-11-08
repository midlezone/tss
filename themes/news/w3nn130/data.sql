UPDATE sites SET site_logo='/mediacenter/media/images/80/logo/458_1421030948_18654b3362457838.jpg',footercontent='' WHERE site_id=[site_id];

INSERT INTO site_introduces (site_id,title,user_id, sortdesc, description, image_path, image_name, meta_keywords, meta_description, meta_title, created_time, modified_time) VALUES ([site_id],[user_id],'ABOUT ICE TECH UK','','<div class=\"home_text\">Offering <span class=\"blue\">turn-key solutions</span> for design, construction,<br />\r\nrefurbishment and <span class=\"blue\">maintenance</span> of <span class=\"blue\">ice rinks</span><br />\r\nand <span class=\"blue\">ice systems</span> worldwide</div>\r\n','','','','','',[now],[now]);

INSERT INTO `banner_groups` VALUES (null, 'Main', '', '[site_id]', '[user_id]', '400', '0', '[now]');
set @banner_groups11 = LAST_INSERT_ID();
INSERT INTO `banner_groups` VALUES (null, 'Partner', '', '[site_id]', '[user_id]', '0', '116', '[now]');
set @banner_groups12 = LAST_INSERT_ID();


INSERT INTO banners (banner_id, site_id, banner_group_id, banner_name, banner_description, banner_src, banner_width, banner_height, banner_link, banner_type, banner_order, banner_rules, banner_target, created_time, banner_showall) VALUES 
(null, [site_id],@banner_groups11, 'Icetech','','/mediacenter/media/files/80/banners/429_1421033656_58054b340b847b75.jpg',400,0,'',1,1,'',0,1421033656,1),
(null, [site_id],@banner_groups11, 'Goal','','/mediacenter/media/files/80/banners/634_1421033691_21154b340db6f901.jpg',400,0,'',1,2,'',0,1421033691,1),
(null, [site_id],@banner_groups11, 'Main 3','','/mediacenter/media/files/80/banners/571_1421033729_68754b34101a687c.jpg',400,0,'',1,3,'',0,1421033729,1),
(null, [site_id],@banner_groups12, 'sport system','','/mediacenter/media/files/80/banners/188_1421034452_7354b343d493668.png',0,116,'',1,1,'',0,1421034452,1),
(null, [site_id],@banner_groups12, 'Preferred Link','','/mediacenter/media/files/80/banners/718_1421034520_59954b34418d7543.png',0,116,'',1,2,'',0,1421034520,1),
(null, [site_id],@banner_groups12, 'Athletica','','/mediacenter/media/files/80/banners/735_1421034554_7354b3443a6ca44.png',0,116,'',1,3,'',0,1421034554,1);


INSERT INTO news_categories (cat_id, site_id, user_id, cat_parent, cat_name, `alias`, cat_order, cat_description, cat_countchild, image_path, image_name, `status`, created_time, modified_time, showinhome, meta_keywords, meta_description) VALUES (null,[site_id],[user_id],0,'Professional Services','professional-services',14,'Professional Services',0,'','',1,[now], [now],0,'','');
set @news_categories45 = LAST_INSERT_ID();
INSERT INTO news (news_id, news_category_id, news_title, news_sortdesc, news_desc, `alias`, `status`, meta_keywords, meta_description, site_id, user_id, image_path, image_name, created_time, modified_time, modified_by, news_hot, news_source, poster, publicdate) VALUES (null,@news_categories45,'Design & Build','Most of the companies providing core equipment or services to the ice rink industry are refrigeration specialists whose primary objective is to sell refrigeration plant, with construction of the cooling floors, barriers and equipment infrastructure being of secondary importance and these elements are often sub-contracted','','design--build',1,'','',[site_id],[user_id],'/media/images/80/news/ava/','342_1421032696_38454b33cf833659.jpg',[now], [now],[user_id],0,'','',[now]);set @news43 = LAST_INSERT_ID();
INSERT INTO news (news_id, news_category_id, news_title, news_sortdesc, news_desc, `alias`, `status`, meta_keywords, meta_description, site_id, user_id, image_path, image_name, created_time, modified_time, modified_by, news_hot, news_source, poster, publicdate) VALUES (null,@news_categories45,'Professional Consultancy Services','With over 150 ice rinks constructed or refurbished worldwide, whatever stage your project is at, Ice Tech UK offer a Professional Consultancy Service that provides state-of-the-art design and engineering solutions encompassing','','professional-consultancy-services',1,'','',[site_id],[user_id],'/media/images/80/news/ava/','683_1421031699_34454b339137e45f.jpg',[now], [now],[user_id],0,'','',[now]);set @news42 = LAST_INSERT_ID();









INSERT INTO categorypage (id, title, content, site_id, user_id, `alias`, created_time, modified_time, modified_by) VALUES (null,'ABOUT ICE TECH UK','<h2>ABOUT ICE TECH UK</h2>\r\n\r\n<p>Ice Tech UK is a unique company offering worldwide turn-key packages for the design, construction, refurbishment and maintenance of Ice Rinks and Ice systems.</p>\r\n\r\n<p>Our range of Ice Systems are specifically selected to suit different applications, from Olympic size permanent indoor rinks to outdoor temporary winter rinks and leisure rinks to specialist film sets - we cater for all types of applications.</p>\r\n\r\n<p>Here at Ice Tech UK we have spent years researching and sourcing the very best products from all around the globe. We have pioneered the introduction of new, safe, energy efficient products from low emissivity ceilings to desiccant dehumidification and our equipment range includes many products which are manufactured from recycled materials or use raw materials from sustainable sources.</p>\r\n\r\n<p>The key to supplying the right system is to have a complete understanding of the Client\'s requirements - from initial planning, to building design, meeting budgets and most importantly designing and constructing an ice rink system that will stand up to the rigorous demands of its users.</p>\r\n\r\n<p>Our service can include simply replacing one piece of equipment or Project Managing the entire construction and development of a multi purpose Ice arena from the initial feasibility and design stage through to practical completion.</p>\r\n\r\n<p>Whatever your own requirement, you\'ll find our expertise surmountable and our product range extensive. Welcome to Ice Tech UK.</p>\r\n\r\n<p>Mark Nelson<br />\r\nSenior Partner</p>\r\n',[site_id],[user_id],'about-ice-tech-uk',[now],[now],[user_id]);
set @categorypage14 = LAST_INSERT_ID();


INSERT INTO menu_groups (menu_group_id, menu_group_name, menu_group_description, site_id, user_id, config, created_time, modified_time, modified_by, menu_group_type) VALUES (null,'Nhóm chính','nhóm chính',[site_id],[user_id],'',[now],[now],[user_id],0);
set @menu_groups11 = LAST_INSERT_ID();

INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'HOME',0,1,'','','[]',1,'home',1,1,'{\"t\":1,\"oi\":1}',[now],[now],[user_id]);
set @menus80 = LAST_INSERT_ID();
INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'ABOUT US',0,1,'','/page/category/detail',CONCAT('{"id":',@categorypage14,',"alias":"about-ice-tech-uk"}'),2,'about-us',1,1,CONCAT('{"t":3,"oi":',@categorypage14,'}'),[now],[now],[user_id]);
set @menus81 = LAST_INSERT_ID();
INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'PROFESSIONAL SERVICES',0,1,'','/news/news/category',CONCAT('{"id":',@news_categories45,',"alias":"professional-services"}'),3,'professional-services',1,1,CONCAT('{"t":2,"ot":5,"oi":',@news_categories45,'}'),[now],[now],[user_id]);
set @menus82 = LAST_INSERT_ID();
INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'Professional Consultancy Services',@menus82,1,'','/news/news/detail',CONCAT('{"id":',@news42,',"alias":"professional-consultancy-services"}'),2,'professional-consultancy-services',1,1,CONCAT('{"t":2,"ot":7,"oi":',@news42,'}'),[now],[now],[user_id]);
set @menus83 = LAST_INSERT_ID();
INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'Design & Build',@menus82,1,'','/news/news/detail',CONCAT('{"id":',@news43,',"alias":"design--build"}'),1,'design--build',1,1,CONCAT('{"t":2,"ot":7,"oi":',@news43,'}'),[now],[now],[user_id]);
set @menus84 = LAST_INSERT_ID();
INSERT INTO menus (menu_id, site_id, user_id, menu_group, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],@menu_groups11,'CONTACT US',0,1,'','/site/site/contact','[]',4,'contact-us',1,1,'{\"t\":1,\"oi\":2}',[now],[now],[user_id]);
set @menus85 = LAST_INSERT_ID();


INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Nội dung',0,1,'','','',1,'noi-dung',1,1,'{\"t\":1,\"oi\":0}','icon-file-text-o',[now],[now],[user_id]);
set @menus_admin114 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Quản lý tin tức',@menus_admin114,1,'','content/news','[]',1,'quan-ly-tin-tuc',1,1,'{\"t\":5,\"oi\":\"news.index\"}','',[now],[now],[user_id]);
set @menus_admin115 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Banner',0,1,'','banner/banner','[]',2,'banner',1,1,'{\"t\":5,\"oi\":\"banner.index\"}','icon-building-o',[now],[now],[user_id]);
set @menus_admin116 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Quản lý banner',@menus_admin116,1,'','banner/banner','[]',1,'quan-ly-banner',1,1,'{\"t\":5,\"oi\":\"banner.index\"}','',[now],[now],[user_id]);
set @menus_admin117 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Quản lý nhóm banner',@menus_admin116,1,'','banner/bannergroup','[]',2,'quan-ly-nhom-banner',1,1,'{\"t\":5,\"oi\":\"bannergroup.index\"}','',[now],[now],[user_id]);
set @menus_admin118 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Giao diện',0,1,'','','',3,'giao-dien',1,1,'{\"t\":1,\"oi\":0}','icon-desktop',[now],[now],[user_id]);
set @menus_admin119 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Quản lý menu',@menus_admin119,1,'','interface/menugroup','[]',1,'quan-ly-menu',1,1,'{\"t\":5,\"oi\":\"menugroup.index\"}','',[now],[now],[user_id]);
set @menus_admin120 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Chân trang (footer)',@menus_admin119,1,'','interface/sitesettings/footersetting','[]',2,'chan-trang-footer',1,1,'{\"t\":5,\"oi\":\"sitesettings.footersetting\"}','',[now],[now],[user_id]);
set @menus_admin121 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Thông tin liên hệ',@menus_admin119,1,'','interface/sitesettings/contact','[]',3,'thong-tin-lien-he',1,1,'{\"t\":5,\"oi\":\"sitesettings.contact\"}','',[now],[now],[user_id]);
set @menus_admin122 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Thông tin website',0,1,'','','',4,'thong-tin-website',1,1,'{\"t\":1,\"oi\":0}','icon-cogs',[now],[now],[user_id]);
set @menus_admin123 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Thông tin cơ bản',@menus_admin123,1,'','setting/setting','[]',1,'thong-tin-co-ban',1,1,'{\"t\":5,\"oi\":\"setting.index\"}','',[now],[now],[user_id]);
set @menus_admin124 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Giới thiệu website',@menus_admin123,1,'','setting/setting/introduce','[]',2,'gioi-thieu-website',1,1,'{\"t\":5,\"oi\":\"setting.introduce\"}','',[now],[now],[user_id]);
set @menus_admin125 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Cấu hình tên miền',@menus_admin123,1,'','setting/setting/domainsetting','[]',3,'cau-hinh-ten-mien',1,1,'{\"t\":5,\"oi\":\"setting.domainsetting\"}','',[now],[now],[user_id]);
set @menus_admin126 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Liên hệ',0,1,'','custom/customform/statistic','[]',5,'lien-he',1,1,'{\"t\":5,\"oi\":\"customform.statistic\"}','icon-book',[now],[now],[user_id]);
set @menus_admin127 = LAST_INSERT_ID();
INSERT INTO menus_admin (menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, `alias`, `status`, menu_target, menu_values, iconclass, created_time, modified_time, modified_by) VALUES (null,[site_id],[user_id],'Trang nội dung',@menus_admin114,1,'','content/categorypage','[]',2,'trang-noi-dung',1,1,'{\"t\":5,\"oi\":\"categorypage.index\"}','',[now],[now],[user_id]);
set @menus_admin128 = LAST_INSERT_ID();


INSERT INTO forms (form_id, form_code, form_name, form_description, site_id, `status`, created_time, modified_time, user_id) VALUES (null,'fo_142087918154b0e54d185b3','Form Liên Hệ','liên hệ',[site_id],1,[now],[now],[user_id]);
set @forms6 = LAST_INSERT_ID();

INSERT INTO form_fields (field_id, form_id, field_key, field_label, field_type, field_options, field_required, `order`, site_id, user_id, `status`) VALUES 
(null,@forms6, 'c21','Name','text','{\"size\":\"large\"}',1,0,[site_id],[user_id],1),
(null,@forms6, 'c62','Company','text','{\"size\":\"large\"}',0,1,[site_id],[user_id],1),
(null,@forms6, 'c103','Phone Number','text','{\"size\":\"large\"}',1,2,[site_id],[user_id],1),
(null,@forms6, 'c144','Email Address','email','{\"size\":\"large\"}',0,3,[site_id],[user_id],1),
(null,@forms6, 'c185','Postal Address','text','{\"size\":\"large\"}',0,4,[site_id],[user_id],1),
(null,@forms6, 'c226','City','text','{\"size\":\"large\"}',0,5,[site_id],[user_id],1),
(null,@forms6, 'c267','County/State','text','{\"size\":\"large\"}',0,6,[site_id],[user_id],1),
(null,@forms6, 'c318','Post/Zip Code','text','{\"size\":\"large\"}',0,7,[site_id],[user_id],1),
(null,@forms6, 'c359','Country','text','{\"size\":\"large\"}',0,8,[site_id],[user_id],1),
(null,@forms6, 'c3910','Comment','paragraph','{\"size\":\"large\"}',0,9,[site_id],[user_id],1),
(null,@forms6, 'c4511','Submit','button','{\"size\":\"large\",\"onclick\":\"\",\"button_type\":\"submitform\"}',0,10,[site_id],[user_id],1);


INSERT INTO page_widgets (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) VALUES (null,[site_id],[user_id],'Main Menu',3,'news/news/',1,'menu',[now],1,1);
set @page_widgets55 = LAST_INSERT_ID();
INSERT INTO page_widgets (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) VALUES (null,[site_id],[user_id],'CONTACT US',5,'site/site/contact',1,'customform',[now],0,1);
set @page_widgets56 = LAST_INSERT_ID();
INSERT INTO page_widgets (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) VALUES (null,[site_id],[user_id],'Main',5,'news/news/',1,'bannergroup',[now],0,1);
set @page_widgets57 = LAST_INSERT_ID();
INSERT INTO page_widgets (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) VALUES (null,[site_id],[user_id],'Introduce',5,'news/news/',1,'introducebox',[now],0,2);
set @page_widgets58 = LAST_INSERT_ID();
INSERT INTO page_widgets (page_widget_id, site_id,user_id, widget_title, position, page_key, widget_type, widget_id, created_time, showallpage, worder) VALUES (null,[site_id],[user_id],'Partner',5,'news/news/',1,'bannergroup',[now],0,3);
set @page_widgets59 = LAST_INSERT_ID();

INSERT INTO page_widget_config (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) VALUES (null,@page_widgets55,[site_id],[user_id],CONCAT('{"group_id":',@menu_groups11,',"directfrom":"left","showallpage":"1","widget_title":"Main Menu","show_wiget_title":"0"}'),[now],[now]);
INSERT INTO page_widget_config (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) VALUES (null,@page_widgets56,[site_id],[user_id],CONCAT('{"form_id":',@forms6,',"labelClass":"3","showallpage":"0","widget_title":"CONTACT US","show_wiget_title":"0"}'),[now],[now]);
INSERT INTO page_widget_config (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) VALUES (null,@page_widgets57,[site_id],[user_id],CONCAT('{"banner_group_id":',@banner_groups11,',"timeDelay":"4000","style":"style1","showallpage":"0","widget_title":"Main","show_wiget_title":"0"}'),[now],[now]);
INSERT INTO page_widget_config (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) VALUES (null,@page_widgets58,[site_id],[user_id],'{\"showallpage\":\"0\",\"widget_title\":\"Introduce\",\"show_wiget_title\":\"0\"}',[now],[now]);
INSERT INTO page_widget_config (id, page_widget_id, site_id, user_id, config_data, created_time, modified_time) VALUES (null,@page_widgets59,[site_id],[user_id],CONCAT('{"banner_group_id":',@banner_groups12,',"timeDelay":"16000","style":"default","showallpage":"0","widget_title":"Partner","show_wiget_title":"0"}'),[now],[now]);


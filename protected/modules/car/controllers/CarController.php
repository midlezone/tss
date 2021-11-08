<?php

class CarController extends PublicController {

    public $layout = '//layouts/car';

    /**
     * Car detail
     * @param type $id
     */
    public function actionDetail($id) {
        //
        $car = Car::model()->findByPk($id);
        if (!$car) {
            $this->sendResponse(404);
        }
        if ($car->site_id != $this->site_id) {
            $this->sendResponse(404);
        }
        if ($car['avatar_path'] && $car['avatar_name']) {
            $this->addMetaTag(ClaHost::getImageHost() . $car['avatar_path'] . 's1000_1000/' . $car['avatar_name'], 'og:image', null, array('property' => 'og:image'));
        }
        $this->addMetaTag('article', 'og:type', null, array('property' => 'og:type'));
        //
        $category = CarCategories::model()->findByPk($car->car_category_id);
        $attributesShow = null;
        if ($category) {
            // get car category
            $categoryClass = new ClaCategory(array('type' => ClaCategory::CATEGORY_CAR, 'create' => true));
            $categoryClass->application = 'public';
            $track = $categoryClass->saveTrack($car->car_category_id);
            $track = array_reverse($track);
            //
            foreach ($track as $tr) {
                $item = $categoryClass->getItem($tr);
                if (!$item) {
                    continue;
                }
                $this->breadcrumbs [$item['cat_name']] = Yii::app()->createUrl('/economy/car/category', array('id' => $item['cat_id'], 'alias' => $item['alias']));
            }
        }
        $car->description = $car->car_info->attribute;
        $link = Yii::app()->createUrl('/car/car/detail', array('id' => $id, 'alias' => $car->alias));
        //
        $this->render('detail', array(
            'model' => $car,
            'car' => $car->attributes + array('price_text' => Car::getPriceText($car->attributes), 'price_market_text' => Car::getPriceText($car->attributes, 'price_market'), 'price_save_text' => Car::getPriceText($car->attributes, 'price_save')),
            'category' => $category,
            'link' => $link,
        ));
    }

}

?>
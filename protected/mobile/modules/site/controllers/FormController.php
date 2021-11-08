<?php

class FormController extends PublicController {

    /**
     * susmit form
     * @param type $id (form_id)
     */
    public function actionSubmit($id) {
        if (Yii::app()->request->isAjaxRequest) {
            $form = Forms::model()->findByPk($id);
            if (!$form)
                $this->jsonResponse(404);
            if ($form->site_id != $this->site_id)
                $this->jsonResponse(404);
            $fields = FormFields::getFieldsInForm($id);
            $fielddata = Yii::app()->request->getPost(Forms::FORM_SUBMIT_NAME);
            if ($fielddata) {
                $formValidate = new AutoForm();
                $formValidate->loadFields($fields);
                // Load field data for form
                foreach ($fielddata as $field_id => $field) {
                    $fkey = key($field);
                    if (isset($fields[$field_id]) && $fields[$field_id]['field_key'] == $fkey) {
                        $formValidate->$fkey = $field[$fkey];
                    }
                }
                //
                if ($formValidate->validateFields()) {
                    // $listData Lưu những dữ liệu dc insert vào db
                    $listData = array();
                    //
                    $form_session = new FormSessions();
                    $form_session->form_id = $id;
                    $form_session->created_time = time();
                    if ($form_session->save()) {
                        //Save value
                        foreach ($fielddata as $field_id => $field) {
                            $fkey = key($field);
                            if (isset($fields[$field_id]) && $fields[$field_id]['field_key'] == $fkey) {
                                $ffvalue = new FormFieldValues();
                                $ffvalue->field_id = $field_id;
                                $ffvalue->form_session_id = $form_session->form_session_id;
                                $ffvalue->field_data = $field[$fkey];
                                $ffvalue->save(false);
                                $listData[$field_id] = $fields[$field_id];
                                $listData[$field_id]['field_data'] = $field[$fkey];
                            }
                        }
                    }
                    // Send mail
                    if ($form->sendmail && Yii::app()->siteinfo['admin_email']) {
                        $content = $this->renderPartial('common.templates.mail.sendmail', array(
                            'data' => $listData,
                                ), true);
                        Yii::app()->mailer->send(Yii::app()->siteinfo['domain_default'], Yii::app()->siteinfo['admin_email'], "Bạn có một ". $form->form_name, $content);
                    }
                    //
                    Yii::app()->user->setFlash('success', Yii::t('common', 'sendsuccess'));
                    $this->jsonResponse(200);
                } else {
                    $this->jsonResponse(400, array(
                        'errors' => $formValidate->getJsonErrors(),
                    ));
                }
            }
            $this->jsonResponse(404);
        }
    }

}

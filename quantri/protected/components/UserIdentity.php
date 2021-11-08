<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    public function authenticate() {
        $username = strtolower($this->username);
        $user = UserModel::model()->find('LOWER(user_name)=?', array($username));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->password !== $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            /**
             * If the user is spper admin so that can login all site
             */
            if ($user->user_id == ClaUser::getSupperAdmin() || $user->site_id == Yii::app()->controller->site_id) {
                $this->_id = $user->user_id;
                $this->username = $user->user_name;
                $this->errorCode = self::ERROR_NONE;
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
        }
        return $this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

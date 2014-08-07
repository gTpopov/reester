<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 01.08.14
 * Time: 01:44
 */

class WebUser extends CWebUser {

    private $_model = null;

    function getRole() {
        if($user = $this->getModel()){
            return $user->role;
        }else{
            return NIL;
        }
    }

    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }

} 
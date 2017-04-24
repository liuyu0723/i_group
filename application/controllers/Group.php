<?php

/**
 * Created by PhpStorm.
 * User: ZXM
 */
class GroupController extends \BaseController {

    public function init() {
        parent::init();
    }

    public function userListAction() {
        $this->_view->display('group/userList.phtml');
    }
}
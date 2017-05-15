<?php

/**
 * 集团控制器
 */
class GroupController extends \BaseController {

    public function init() {
        parent::init();
    }

    /**
     * 管理员列表
     */
    public function userListAction() {
        $this->_view->display('group/userList.phtml');
    }
}
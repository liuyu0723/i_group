<?php

/**
 * 帮助管理控制器
 */
class HelpController extends BaseController {

    public function init() {
        parent::init();
    }

    /**
     * 类别列表
     */
    public function typeAction() {
        $this->_view->display('help/type.phtml');
    }

    /**
     * 帮助列表
     */
    public function listAction() {
        $helpModel = new HelpModel();
        $typeList = $helpModel->getTypeList(array('groupid' => $this->getGroupId()), 3600);
        $this->_view->assign('typeList', $typeList['data']['list']);
        $this->_view->display('help/help.phtml');
    }
}
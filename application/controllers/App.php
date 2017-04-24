<?php

/**
 * Created by PhpStorm.
 * User: ZXM
 */
class AppController extends \BaseController {

    public function startMsgListAction() {
        $baseModel = new BaseModel();
        $allowTypeImage = $baseModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE);
        $this->_view->assign('allowTypeImage', array_keys($allowTypeImage['data']['list']));
        $this->_view->display('app/startMsgList.phtml');
    }

    public function groupPushAction() {
        $this->_view->display('app/push.phtml');
    }
}
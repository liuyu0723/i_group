<?php

/**
 * APP管理
 */
class AppController extends \BaseController {

    /**
     * 启动消息
     */
    public function startMsgListAction() {
        $baseModel = new BaseModel();
        $allowTypeImage = $baseModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE);
        $this->_view->assign('allowTypeImage', array_keys($allowTypeImage['data']['list']));
        $this->_view->display('app/startMsgList.phtml');
    }

    /**
     * 集团推送
     */
    public function groupPushAction() {
        $baseModel = new BaseModel();
        $platform = $baseModel->getPlatformList();
        $this->_view->assign('platform', $platform);
        $this->_view->display('app/push.phtml');
    }

    /**
     * 启动广告图管理
     */
    public function startPicListAction() {
        $baseModel = new BaseModel();
        $allowTypeImage = $baseModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE);
        $this->_view->assign('allowTypeImage', array_keys($allowTypeImage['data']['list']));
        $this->_view->display('app/startPicList.phtml');
    }

    /**
     * 版本管理
     */
    public function versionListAction() {
        $baseModel = new BaseModel();
        $platformList = $baseModel->getPlatformList();
        $this->_view->assign('platformList', $platformList);
        $this->_view->display('app/versionList.phtml');
    }

    /**
     * APP启动图管理
     */
    public function appImgListAction() {
        $baseModel = new BaseModel();
        $allowTypeImage = $baseModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE);
        $this->_view->assign('allowTypeImage', array_keys($allowTypeImage['data']['list']));
        $this->_view->display('app/appImgList.phtml');
    }

    /**
     * APP问题反馈列表
     */
    public function feedbackListAction() {
        $this->_view->display('app/feedbackList.phtml');
    }
}
<?php

/**
 * 物业通知管理控制器
 */
class NoticController extends BaseController {

    public function init() {
        parent::init();
        $languageList = array(Enum_Lang::LANG_KEY_CHINESE, Enum_Lang::LANG_KEY_ENGLISH);
        $this->_view->assign('languageList', $languageList);
        $this->_view->assign('langIndex', Enum_Lang::getSystemLang(true));
    }

    /**
     * 标签列表
     */
    public function tagListAction() {
        $this->_view->display('notic/tag.phtml');
    }

    /**
     * 物业通知管理
     */
    public function listAction() {
        $noticModel = new NoticModel();
        $tagList = $noticModel->getTagList(array('groupid' => $this->getGroupId()), 3600);
        $this->_view->assign('tagList', $tagList['data']['list']);
        $this->setAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE, 'allowTypeImage');
        $this->setAllowUploadFileType(Enum_Oss::OSS_PATH_PDF, 'allowTypePdf');
        $this->_view->display('notic/notic.phtml');
    }
}
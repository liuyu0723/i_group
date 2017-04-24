<?php

/**
 * Created by PhpStorm.
 * User: ZXM
 */
class HotelController extends \BaseController {

    public function init() {
        parent::init();
    }

    public function hotelListAction() {
        $cityModel = new CityModel();
        $cityList = $cityModel->getCityList(array());
        $this->_view->assign('cityList', $cityList['data']['list']);
        $languageList = $cityModel->getLanguageList();
        $this->_view->assign('languageList', $languageList);
        $allowTypeImage = $cityModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_IMAGE);
        $this->_view->assign('allowTypeImage', array_keys($allowTypeImage['data']['list']));
        $allowTypeVoice = $cityModel->getAllowUploadFileType(Enum_Oss::OSS_PATH_VOICE);
        $this->_view->assign('allowTypeVoice', array_keys($allowTypeVoice['data']['list']));
        $this->_view->display('hotel/hotelList.phtml');
    }
}
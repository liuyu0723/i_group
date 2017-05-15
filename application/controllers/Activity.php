<?php

/**
 * 活动管理
 */
class ActivityController extends \BaseController {

    public function init() {
        parent::init();
    }

    /**
     * 获取活动用户报名列表
     */
    public function activityUserListAction() {
        $hotelModel = new HotelModel();
        $hotelList = $hotelModel->getHotelList(array('groupid' => $this->getGroupId()), 3600);
        $this->_view->assign('hotelList', $hotelList['data']['list']);
        $activityModel = new ActivityModel();
        $activityList = $activityModel->getActivityList(array('groupid' => $this->getGroupId()), 3600);
        $this->_view->assign('activityList', $activityList['data']['list']);
        $this->_view->display('activity/activityUserList.phtml');
    }
}
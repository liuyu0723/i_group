<?php

/**
 * 集团控制器
 */
class GroupController extends \BaseController
{

    public function init()
    {
        parent::init();
    }

    /**
     * 管理员列表
     */
    public function userListAction()
    {
        $this->_view->display('group/userList.phtml');
    }

    public function staffListAction()
    {
        $model = new HotelModel();
        $convertor = new Convertor_Hotel();
        $params['groupid'] = $this->getGroupId();
        $hotelList = $model->getHotelList($params);
        $hotelList = $convertor->hotelListPermissionConvert($hotelList['data']['list']);
        $this->_view->assign('hotelList', $hotelList);
        $this->_view->display('group/staffList.phtml');

    }
}
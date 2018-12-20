<?php

/**
 * 集团请求控制器
 */
class StaffajaxController extends \BaseController {
    const STAFF_IDENTITY = 'group_test';

    /**
     * @var StaffModel
     */
    private $staffModel;

    /**
     * @var Convertor_Staff
     */
    private $staffConvertor;

    public function init() {
        parent::init();
        $this->staffModel = new StaffModel();
        $this->staffConvertor = new Convertor_Staff();
    }


    /**
     * 获取管理员列表
     */
    public function getStaffListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['limit'] = $this->getPost('limit');
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['groupid'] = intval($this->getGroupId());
        $paramList['staffid'] = intval($this->getPost('staffid'));
        $paramList['name'] = trim($this->getPost('name'));
        $result = $this->staffModel->getStaffList($paramList);

        $result = $this->staffConvertor->userListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑集团管理员数据
     */
    private function handlerUserSaveParams() {
        $paramList = array();
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['lname'] = trim($this->getPost("username"));
        $paramList['staffid'] = trim($this->getPost("staffid"));
        $paramList['hotel_list'] = trim($this->getPost("hotelList"));
        return $paramList;
    }

    /**
     * 新建集团管理员
     */
    public function createStaffAction() {
        $paramList = $this->handlerUserSaveParams();
        $paramList['groupid'] = intval($this->getGroupId());
        $paramList['identity'] = self::STAFF_IDENTITY;
        $result = $this->staffModel->addStaff($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新集团管理员
     */
    public function updateStaffAction() {
        $paramList = $this->handlerUserSaveParams();
        $result = $this->staffModel->updateStaffInfo($paramList);
        $this->echoJson($result);
    }
}

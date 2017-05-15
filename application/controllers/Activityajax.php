<?php

/**
 * 活动管理请求
 */
class ActivityajaxController extends \BaseController {

    /**
     * @var ActivityModel
     */
    private $activtyModel;

    /**
     * @var Convertor_Activity
     */
    private $activityConvertor;

    public function init() {
        parent::init();
        $this->activtyModel = new ActivityModel();
        $this->activityConvertor = new Convertor_Activity();
    }

    /**
     * 获取活动用户报名列表
     */
    public function getActivityOrderListAction() {
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['name'] = trim($this->getPost('name'));
        $paramList['phone'] = trim($this->getPost('phone'));
        $paramList['hotelid'] = intval($this->getPost('hotelid'));
        $paramList['activityid'] = intval($this->getPost('activityid'));
        $paramList['groupid'] = intval($this->getGroupId());
        $result = $this->activtyModel->getActivityOrderList($paramList);
        $result = $this->activityConvertor->activityOrderListConvertor($result);
        $this->echoJson($result);
    }

}

<?php

/**
 * 物业通知请求控制器
 */
class NoticajaxController extends \BaseController {
    /** @var  NoticModel */
    private $model;
    /** @var  Convertor_Notic */
    private $convertor;

    public function init() {
        parent::init();
        $this->model = new NoticModel();
        $this->convertor = new Convertor_Notic();
    }

    /**
     * 获取tag列表
     */
    public function getTagListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['groupid'] = $this->getGroupId();
        $result = $this->model->getTagList($paramList);
        $result = $this->convertor->tagListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑tag信息数据
     */
    private function handlerTagSaveParams() {
        $paramList = array();
        $paramList['title'] = trim($this->getPost("title"));
        $paramList['groupid'] = intval($this->getGroupId());
        return $paramList;
    }

    /**
     * 新建tag信息
     */
    public function createTagAction() {
        $paramList = $this->handlerTagSaveParams();
        $result = $this->model->saveTagDataInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新tag信息
     */
    public function updateTagAction() {
        $paramList = $this->handlerTagSaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->model->saveTagDataInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 获取通知列表
     */
    public function getListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['groupid'] = $this->getGroupId();
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['tagid'] = intval($this->getPost('tag'));
        $paramList['title'] = $this->getPost('title');
        $status = $this->getPost('status');
        $status !== 'all' && !is_null($status) ? $paramList['status'] = intval($status) : false;
        $result = $this->model->getList($paramList);
        $result = $this->convertor->getListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑物业通知
     */
    private function handlerSaveParams() {
        $paramList = array();
        $paramList['title'] = trim($this->getPost("title"));
        $paramList['tagid'] = intval($this->getPost("tagid"));
        $paramList['status'] = intval($this->getPost("status"));
        $paramList['groupid'] = intval($this->getGroupId());
        $paramList['pic'] = $_FILES['pic'];
        $paramList['pdf'] = $_FILES['pdf'];
        $paramList['video'] = trim($this->getPost("video"));
        $paramList['sort'] = intval($this->getPost("sort"));
        return $paramList;
    }

    /**
     * 新建物业通知
     */
    public function createAction() {
        $paramList = $this->handlerSaveParams();
        $result = $this->model->saveInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新物业通知
     */
    public function updateAction() {
        $paramList = $this->handlerSaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->model->saveInfo($paramList);
        $this->echoJson($result);
    }
}

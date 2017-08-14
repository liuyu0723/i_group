<?php

/**
 * 帮助管理请求控制器
 */
class HelpajaxController extends \BaseController {
    /** @var  HelpModel */
    private $model;
    /** @var  Convertor_Help */
    private $convertor;

    public function init() {
        parent::init();
        $this->model = new HelpModel();
        $this->convertor = new Convertor_Help();
    }

    /**
     * 获取类型列表
     */
    public function getTypeListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['groupid'] = $this->getGroupId();
        $result = $this->model->getTypeList($paramList);
        $result = $this->convertor->TypeListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑Type信息数据
     */
    private function handlerTypeSaveParams() {
        $paramList = array();
        $paramList['title_zh'] = trim($this->getPost("titleZh"));
        $paramList['title_en'] = trim($this->getPost("titleEn"));
        $paramList['sort'] = intval($this->getPost("sort"));
        $paramList['groupid'] = intval($this->getGroupId());
        return $paramList;
    }

    /**
     * 新建Type信息
     */
    public function createTypeAction() {
        $paramList = $this->handlerTypeSaveParams();
        $result = $this->model->saveTypeDataInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新Type信息
     */
    public function updateTypeAction() {
        $paramList = $this->handlerTypeSaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->model->saveTypeDataInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 获取新闻列表
     */
    public function getListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['groupid'] = $this->getGroupId();
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['typeid'] = intval($this->getPost('type'));
        $paramList['title'] = $this->getPost('title');
        $status = $this->getPost('status');
        $status !== 'all' && !is_null($status) ? $paramList['status'] = intval($status) : false;
        $result = $this->model->getList($paramList);
        $result = $this->convertor->getListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑物业新闻
     */
    private function handlerSaveParams() {
        $paramList = array();
        $paramList['title_zh'] = trim($this->getPost("titleZh"));
        $paramList['title_en'] = trim($this->getPost("titleEn"));
        $paramList['typeid'] = intval($this->getPost("typeid"));
        $paramList['status'] = intval($this->getPost("status"));
        $paramList['groupid'] = intval($this->getGroupId());
        $paramList['sort'] = intval($this->getPost("sort"));
        return $paramList;
    }

    /**
     * 新建物业新闻
     */
    public function createAction() {
        $paramList = $this->handlerSaveParams();
        $result = $this->model->saveInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新物业新闻
     */
    public function updateAction() {
        $paramList = $this->handlerSaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->model->saveInfo($paramList);
        $this->echoJson($result);
    }
}

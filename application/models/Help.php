<?php

/**
 * 帮助管理Model
 */
class HelpModel extends \BaseModel {

    /**
     * 获取Type列表
     */
    public function getTypeList($paramList, $cacheTime = 0) {
        do {
            $params['groupid'] = $paramList['groupid'];
            if ($cacheTime == 0) {
                $this->setPageParam($params, $paramList['page'], $paramList['limit'], 15);
            }
            $isCache = $cacheTime != 0 ? true : false;
            $result = $this->rpcClient->getResultRaw('H001', $params, $isCache, $cacheTime);
        } while (false);
        return (array)$result;
    }

    /**
     * 新建和编辑Type信息数据
     */
    public function saveTypeDataInfo($paramList) {
        $params = $this->initParam($paramList);
        do {
            $result = array(
                'code' => 1,
                'msg' => '参数错误'
            );
            if (empty($params['title_zh']) || empty($params['title_en']) || empty($params['groupid'])) {
                break;
            }
            $interfaceId = $params['id'] ? 'H002' : 'H003';
            $result = $this->rpcClient->getResultRaw($interfaceId, $params);
            if (!$result['code']) {
                $this->getTypeList(array('groupid' => $params['groupid']), -2);
            }
        } while (false);
        return $result;
    }

    /**
     * 获取新闻列表
     */
    public function getList($paramList) {
        do {
            $params['groupid'] = $paramList['groupid'];
            $paramList['id'] ? $params['id'] = $paramList['id'] : false;
            $paramList['typeid'] ? $params['typeid'] = $paramList['typeid'] : false;
            $paramList['title'] ? $params['title'] = $paramList['title'] : false;
            isset($paramList['status']) ? $params['status'] = $paramList['status'] : false;
            $this->setPageParam($params, $paramList['page'], $paramList['limit'], 15);
            $result = $this->rpcClient->getResultRaw('H004', $params);
        } while (false);
        return (array)$result;
    }

    /**
     * 新建和编辑帮助管理
     */
    public function saveInfo($paramList) {
        $params = $this->initParam($paramList);
        do {
            $result = array(
                'code' => 1,
                'msg' => '参数错误'
            );
            if (empty($params['title_zh']) || empty($params['title_en']) || empty($params['groupid'])) {
                break;
            }
            $interfaceId = $params['id'] ? 'H005' : 'H006';
            $result = $this->rpcClient->getResultRaw($interfaceId, $params);
        } while (false);
        return $result;
    }
}

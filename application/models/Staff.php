<?php

/**
 * Class StaffModel
 */
class StaffModel extends \BaseModel
{

    /**
     * Get staff list
     *
     * @param $paramList
     * @return array
     */
    public function getStaffList($paramList)
    {
        do {
            $paramList['hotelid'] ? $params['hotelid'] = $paramList['hotelid'] : false;
            $paramList['groupid'] ? $params['groupid'] = $paramList['groupid'] : false;
            $paramList['staffid'] ? $params['staffid'] = $paramList['staffid'] : false;
            $paramList['name'] ? $params['name'] = $paramList['name'] : false;
            if ($paramList['limit']) {
                $this->setPageParam($params, $paramList['page'], $paramList['limit']);
            }
            $result = $this->rpcClient->getResultRaw('SF001', $params);
        } while (false);
        return (array)$result;
    }

    /**
     * @param array $paramList
     * @return array
     */
    public function resetPin(array $paramList) : array {
        $params = array();
        !empty($paramList['token']) ? $params['token'] = $paramList['token'] : $this->throwException('请重新登录', 1);
        $paramList['user_id'] > 0 ? $params['userid'] = $paramList['user_id'] : false;
        $result = $this->rpcClient->getResultRaw('SF002', $params);
        return (array)$result;
    }

    public function updateStaffSchedule($paramList) {
        do {
            $result = array(
                'code' => 1,
                'msg' => '参数错误'
            );

            if (intval($paramList['id']) <= 0) {
                break;
            }
            if (is_null($paramList['schedule']) && is_null($paramList['washing'])) {
                break;
            }
            $params = array();
            $params['id'] = intval($paramList['id']);
            !is_null($paramList['schedule']) ? $params['schedule'] = trim($paramList['schedule']) : false;
            !is_null($paramList['washing_push']) ? $params['washing_push'] = intval($paramList['washing_push']) : false;
            $result = $this->rpcClient->getResultRaw('SF003', $params);

        } while (false);
        return $result;
    }

    public function updateStaffPermission($paramList)
    {
        try {
            $params['permission'] = $paramList['permission'];
            $paramList['id'] ? $params['id'] = intval($paramList['id']) : $this->throwException("Lack param[id]", 1);
            $result = $this->rpcClient->getResultRaw('SF003', $params);
        } catch (Exception $e) {
            $result = array(
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            );
        }
        return $result;
    }

    public function updateStaffInfo($paramList)
    {
        try {
            $params['id'] = intval($paramList['id']);
            if(empty($params['id'])){
                $this->throwException('lack param[id]', 1);
            }
            $params['lname'] = $paramList['lname'];
            $params['staffid'] = $paramList['staffid'];
            $params['hotel_list'] = $paramList['hotel_list'];

            $result = $this->rpcClient->getResultRaw('SF003', $params);
        } catch (Exception $e) {
            $result = array(
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            );
        }
        return $result;
    }


    public function getStaffAdministratorList($cacheTime = 0): array
    {
        do {
            $params = array();
            $isCache = $cacheTime != 0 ? true : false;
            $result = $this->rpcClient->getResultRaw('SF004', $params, $isCache, $cacheTime);
        } while (false);
        return (array)$result;
    }

    /**
     * 新建和编辑集团管理员数据
     */
    public function addStaff($paramList) {
        $params = $this->initParam($paramList);
        do {
            $result = array(
                'code' => 1,
                'msg' => '参数错误'
            );

            if (empty($params['lname']) || empty($params['staffid']) || empty($params['groupid'])) {
                $result['msg'] = '用户名, groupid和staffid不能为空';
                break;
            }

            $result = $this->rpcClient->getResultRaw('SF005', $params);
        } while (false);
        return $result;
    }
}

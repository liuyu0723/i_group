<?php

class ActivityModel extends \BaseModel {

    public function getActivityList($paramList, $cacheTime = 0) {
        do {
            $paramList['groupid'] ? $params['groupid'] = $paramList['groupid'] : false;
            if ($cacheTime == 0) {
                $this->setPageParam($params, $paramList['page'], $paramList['limit'], 15);
            } else {
                $params['limit'] = 0;
            }
            $isCache = $cacheTime != 0 ? true : false;
            $result = $this->rpcClient->getResultRaw('GA001', $params, $isCache, $cacheTime);
        } while (false);
        return (array)$result;
    }

    public function getActivityOrderList($paramList, $cacheTime = 0) {
        do {
            $paramList['id'] ? $params['id'] = $paramList['id'] : false;
            $paramList['name'] ? $params['name'] = $paramList['name'] : false;
            $paramList['phone'] ? $params['phone'] = $paramList['phone'] : false;
            $paramList['hotelid'] ? $params['hotelid'] = $paramList['hotelid'] : false;
            $paramList['groupid'] ? $params['groupid'] = $paramList['groupid'] : false;
            $paramList['activityid'] ? $params['activityid'] = $paramList['activityid'] : false;
            if ($cacheTime == 0) {
                $this->setPageParam($params, $paramList['page'], $paramList['limit'], 15);
            } else {
                $params['limit'] = 0;
            }
            $isCache = $cacheTime != 0 ? true : false;
            $result = $this->rpcClient->getResultRaw('GA002', $params, $isCache, $cacheTime);
        } while (false);
        return (array)$result;
    }
}

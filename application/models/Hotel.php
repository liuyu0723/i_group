<?php

/**
 * 物业Model
 */
class HotelModel extends \BaseModel {

    /**
     * 获取物业列表
     */
    public function getHotelList($paramList, $cacheTime = 0) {
        do {
            $paramList['id'] ? $params['id'] = $paramList['id'] : false;
            $paramList['name'] ? $params['name'] = $paramList['name'] : false;
            $paramList['groupid'] ? $params['groupid'] = $paramList['groupid'] : false;
            isset($paramList['status']) ? $params['status'] = $paramList['status'] : false;
            if ($cacheTime == 0) {
                $this->setPageParam($params, $paramList['page'], $paramList['limit'], 15);
            } else {
                $params['limit'] = 0;
            }
            $isCache = $cacheTime != 0 ? true : false;
            $result = $this->rpcClient->getResultRaw('GH001', $params, $isCache, $cacheTime);
        } while (false);
        return (array)$result;
    }
}

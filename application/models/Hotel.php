<?php

class HotelModel extends \BaseModel {

    public function getHotelList($paramList, $cacheTime = 0) {
        do {
            if ($cacheTime == 0) {
                $paramList['id'] ? $params['id'] = $paramList['id'] : false;
                $paramList['name'] ? $params['name'] = $paramList['name'] : false;
                $paramList['groupid'] ? $params['groupid'] = $paramList['groupid'] : false;
                isset($paramList['status']) ? $params['status'] = $paramList['status'] : false;
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

<?php

/**
 * 集团管理数据转换器
 */
class Convertor_Staff extends Convertor_Base {

    /**
     * 集团管理员
     */
    public function userListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $result = $list['data'];
            $tmp = array();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['username'] = $value['lname'];
                $dataTemp['staffid'] = $value['staffid'];
                $dataTemp['lastLoginTime'] = $value['lastlogintime'] ? date('Y-m-d H:i:s', $value['lastlogintime']) : '';
                $dataTemp['lastLoginIp'] = $value['lastloginip'] ? Util_Tools::ntoip($value['lastloginip']) : '';
                $dataTemp['createTime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
                $dataTemp['hotelList'] = $value['hotel_list'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            if (intval($result['limit']) > 0) {
                $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
            } else {
                $data['data']['pageData']['pageNum'] = 1;
            }
        }
        return $data;
    }
}

?>
<?php

/**
 * 活动数据转换器
 */
class Convertor_Activity extends Convertor_Base {

    /**
     * 活动参与用户列表
     */
    public function activityOrderListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $baseModel = new BaseModel();

            $result = $list['data'];
            $tmp = array();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['userid'] = $value['userid'];
                $dataTemp['userName'] = $value['userName'];
                $dataTemp['name'] = $value['name'];
                $dataTemp['phone'] = $value['phone'];
                $dataTemp['createtime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
                $dataTemp['hotelid'] = $value['hotelid'];
                $dataTemp['hotelName'] = $value['hotelName'];
                $dataTemp['activityid'] = $value['activityid'];
                $dataTemp['activityName'] = $value['activityName'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }
}

?>
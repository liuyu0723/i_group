<?php

class Convertor_App extends Convertor_Base {

    public function startMsgListConvertor($list) {
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
                $dataTemp['pic'] = Enum_Img::getPathByKeyAndType($value['pic']);
                $dataTemp['status'] = $value['status'];
                $dataTemp['statusShow'] = $value['status'] ? Enum_Lang::getPageText('startMsg', 'enable') : Enum_Lang::getPageText('startMsg', 'disable');
                $dataTemp['msg'] = $value['msg'];
                $dataTemp['url'] = $value['url'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }

    public function pushListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $result = $list['data'];
            $tmp = array();
            $baseModel = new BaseModel();
            $platformList = $baseModel->getPlatformList();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['type'] = $value['type'];
                $dataTemp['dataid'] = $value['dataid'];
                $dataTemp['cn_title'] = $value['cn_title'];
                $dataTemp['en_title'] = $value['en_title'];
                $dataTemp['url'] = $value['url'];
                $dataTemp['result'] = $value['result'];
                $dataTemp['resultShow'] = $value['result'] ? Enum_Lang::getPageText('push', 'resultFail') : Enum_Lang::getPageText('push', 'resultSuccess');
                $dataTemp['platform'] = $value['platform'];
                $dataTemp['platformShow'] = $platformList[$dataTemp['platform']];
                $dataTemp['createtime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
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
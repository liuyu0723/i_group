<?php

/**
 * 帮助管理数据转换器
 */
class Convertor_Help extends Convertor_Base {

    /**
     * 标签列表转换器
     * @param array $list
     * @return array
     */
    public function TypeListConvertor($list) {
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
                $dataTemp['titleZh'] = $value['title_zh'];
                $dataTemp['titleEn'] = $value['title_en'];
                $dataTemp['sort'] = $value['sort'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }

    /**
     * 列表转换器
     * @param array $list
     * @return array
     */
    public function getListConvertor($list) {
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
                $dataTemp['titleZh'] = $value['title_zh'];
                $dataTemp['titleEn'] = $value['title_en'];
                $dataTemp['sort'] = $value['sort'];
                $dataTemp['status'] = $value['status'];
                $dataTemp['statusShow'] = $value['status'] ? Enum_Lang::getPageText('Help', 'enable') : Enum_Lang::getPageText('Help', 'disable');
                $dataTemp['typeid'] = $value['typeid'];
                $dataTemp['typeShow'] = Enum_Lang::getSystemLang() == Enum_Lang::LANG_KEY_CHINESE ? $value['typeName_zh'] : $value['typeName_en'];
                $dataTemp['createtime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
                $dataTemp['updatetime'] = $value['updatetime'] ? date('Y-m-d H:i:s', $value['updatetime']) : '';
                $dataTemp['helpZh'] = $value['help_zh'];
                $dataTemp['helpEn'] = $value['help_en'];
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
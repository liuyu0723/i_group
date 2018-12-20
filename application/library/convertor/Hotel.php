<?php

/**
 * 物业数据转换器
 */
class Convertor_Hotel extends Convertor_Base
{

    /**
     * 物业列表
     */
    public function hotelListConvertor($list)
    {
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
                $dataTemp['groupid'] = $value['groupid'];
                $dataTemp['groupName'] = $value['groupName'];
                $dataTemp['propertyinterfid'] = $value['propertyinterfid'];
                $dataTemp['lng'] = $value['lng'];
                $dataTemp['lat'] = $value['lat'];
                $dataTemp['cityid'] = $value['cityid'];
                if (Enum_Lang::getSystemLang() == Enum_Lang::LANG_KEY_CHINESE) {
                    $dataTemp['cityName'] = $value['cityName'];
                } else {
                    $dataTemp['cityName'] = $value['cityEnName'];
                }
                $dataTemp['tel'] = $value['tel'];
                $dataTemp['name_lang1'] = $value['name_lang1'];
                $dataTemp['name_lang2'] = $value['name_lang2'];
                $dataTemp['name_lang3'] = $value['name_lang3'];
                $dataTemp['website'] = $value['website'];
                $dataTemp['logo'] = Enum_Img::getPathByKeyAndType($value['logo']);
                $dataTemp['index_background'] = Enum_Img::getPathByKeyAndType($value['index_background']);
                $dataTemp['voice_lang1'] = Enum_Img::getPathByKeyAndType($value['voice_lang1']);
                $dataTemp['voice_lang2'] = Enum_Img::getPathByKeyAndType($value['voice_lang2']);
                $dataTemp['voice_lang3'] = Enum_Img::getPathByKeyAndType($value['voice_lang3']);
                $dataTemp['address_lang1'] = $value['address_lang1'];
                $dataTemp['address_lang2'] = $value['address_lang2'];
                $dataTemp['address_lang3'] = $value['address_lang3'];
                $dataTemp['introduction_lang1'] = $value['introduction_lang1'];
                $dataTemp['introduction_lang2'] = $value['introduction_lang2'];
                $dataTemp['introduction_lang3'] = $value['introduction_lang3'];
                $dataTemp['status'] = $value['status'];
                $dataTemp['statusShow'] = $value['status'] ? Enum_Lang::getPageText('hotel', 'enable') : Enum_Lang::getPageText('hotel', 'disable');;
                $langList = explode(",", $value['lang_list']);
                $dataTemp['langListShow'] = array();
                foreach ($langList as $langKey => $langId) {
                    $dataTemp['langListShow'][$langKey + 1] = Enum_Lang::getPageText('language', $langId);
                }
                $dataTemp['langlist'] = json_encode($dataTemp['langListShow']);
                $dataTemp['langListShow'] = implode(',', $dataTemp['langListShow']);
                $dataTemp['bookurl'] = $value['bookurl'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }


    public function hotelListPermissionConvert($hotelList)
    {
        $result = array();
        foreach ($hotelList as $hotel) {
            $tmp = array();
            $tmp['id'] = $hotel['id'];
            $tmp['name'] = $hotel['name_lang' . Enum_Lang::getSystemLang(true)];
            $result[] = $tmp;
        }
        return $result;
    }
}

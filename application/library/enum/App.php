<?php

class Enum_App {

    const START_MSG_TYPE_GROUP = 2;
    const PUSH_TYPE_GROUP = 5;
    const PUSH_CONTENT_TYPE_URL = 'url';

    public static function getStartMsgMustInput() {
        return array(
            'url',
            'msg',
        );
    }

    public static function getPushMustInput() {
        return array(
            'cn_title',
            'en_title',
            'url',
        );
    }

    public static function getStartPicMustInput() {
        return array(
            'link',
        );
    }

    public static function getVersionMustInput() {
        return array(
            'version',
            'description',
            'platform',
        );
    }

    public static function getAppImgMustInput() {
        return array();
    }
}

?>
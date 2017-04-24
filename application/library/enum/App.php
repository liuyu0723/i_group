<?php

class Enum_App {

    const START_MSG_TYPE_GROUP = 2;
    const PUSH_TYPE_GROUP = 5;


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
}

?>
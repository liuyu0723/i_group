<?php

class Enum_Article {

    const ARTICLE_TYPE_ACTIVITY = 'activity';
    const ARTICLE_TYPE_NEWS = 'news';
    const ARTICLE_TYPE_NOTIC = 'notic';
    const ARTICLE_TYPE_ABOUT_ZH = 'about_zh';
    const ARTICLE_TYPE_ABOUT_EN = 'about_en';
    const ARTICLE_TYPE_HELP_ZH = 'help_zh';
    const ARTICLE_TYPE_HELP_EN = 'help_en';

    private static $articleTypeList = array(
        self::ARTICLE_TYPE_ACTIVITY => array(
            'interfaceId' => 'GA007',
            'field' => 'article'
        ),
        self::ARTICLE_TYPE_NEWS => array(
            'interfaceId' => 'NT006',
            'field' => 'article'
        ),
        self::ARTICLE_TYPE_NOTIC => array(
            'interfaceId' => 'N006',
            'field' => 'article'
        ),
        self::ARTICLE_TYPE_ABOUT_ZH => array(
            'interfaceId' => 'B007',
            'field' => 'about_zh'
        ),
        self::ARTICLE_TYPE_ABOUT_EN => array(
            'interfaceId' => 'B007',
            'field' => 'about_en'
        ),
        self::ARTICLE_TYPE_HELP_ZH => array(
            'interfaceId' => 'H005',
            'field' => 'help_zh'
        ),
        self::ARTICLE_TYPE_HELP_EN => array(
            'interfaceId' => 'H005',
            'field' => 'help_en'
        ),
    );

    public static function getArticleTypeList() {
        return self::$articleTypeList;
    }
}

?>
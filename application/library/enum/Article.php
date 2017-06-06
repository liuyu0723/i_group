<?php

class Enum_Article {

    const ARTICLE_TYPE_ACTIVITY = 'activity';
    const ARTICLE_TYPE_NEWS = 'news';
    const ARTICLE_TYPE_NOTIC = 'notic';

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
    );

    public static function getArticleTypeList() {
        return self::$articleTypeList;
    }
}

?>
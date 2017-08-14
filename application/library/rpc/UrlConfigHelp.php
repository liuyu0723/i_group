<?php

class Rpc_UrlConfigHelp {

    private static $config = array(
        'H001' => array(
            'name' => '获取列表',
            'method' => 'getTypeList',
            'auth' => true,
            'url' => '/HelpType/getTypeList',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'page' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'limit' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                )
            )
        ),
        'H002' => array(
            'name' => '更新分类',
            'method' => 'updateHelpTypeById',
            'auth' => true,
            'url' => '/HelpType/updateHelpTypeById',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'sort' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'title_zh' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'title_en' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                )
            )
        ),
        'H003' => array(
            'name' => '新建分类',
            'method' => 'addHelpType',
            'auth' => true,
            'url' => '/HelpType/addHelpType',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'sort' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'title_zh' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'title_en' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                )
            )
        ),
        'H004' => array(
            'name' => '帮助列表',
            'method' => 'getHelpList',
            'auth' => true,
            'url' => '/Help/getHelpList',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'typeid' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'status' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'title' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'page' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'limit' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
            )
        ),
        'H005' => array(
            'name' => '更新帮助',
            'method' => 'updateHelpById',
            'auth' => true,
            'url' => '/Help/updateHelpById',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'typeid' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'status' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'sort' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'title_zh' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'title_en' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'help_zh' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'help_en' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
            )
        ),
        'H006' => array(
            'name' => '新建帮助',
            'method' => 'addHelp',
            'auth' => true,
            'url' => '/Help/addHelp',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'typeid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'status' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'sort' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'title_zh' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'title_en' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
            )
        ),
    );

    /**
     * 根据接口编号获取接口配置
     *
     * @param string $interfaceId
     * @param string $configKey
     * @return multitype:multitype:string multitype:multitype:boolean string
     *         |boolean
     */
    public static function getConfig($interfaceId, $configKey = '') {
        if (isset(self::$config[$interfaceId])) {
            if (strlen($configKey) && isset(self::$config[$interfaceId][$configKey])) {
                return self::$config[$interfaceId][$configKey];
            } else {
                return self::$config[$interfaceId];
            }
        } else {
            return false;
        }
    }
}

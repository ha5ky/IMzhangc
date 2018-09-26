<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function writeConfig($data)
{
    $path = APP_ROOT . '/config/group.conf';
    @file_put_contents($path, serialize($data));
    return true;
}

//读配置文件
function readConfig()
{
    $path = APP_ROOT . '/config/group.conf';
    $conf = require($path);
    if(empty($conf))
        return [];

    return $conf;
}
//写聊天配置
function writeCtConfig($data)
{
    $path = APP_ROOT . '/config/chat.conf';
    @file_put_contents($path, serialize($data));
    return true;
}

//读聊天配置文件
function readCtConfig()
{
    $path = APP_ROOT . '/config/chat.conf';
    $conf = file_get_contents($path);
    if(empty($conf))
        return [];

    return unserialize($conf);
}
function objToArr($object){
    if (is_object($object)) {
        foreach ($object as $key => $value) {
            foreach ($value as $k => $v) {
                $array[$key][$k] = $v;
            }
        }
    }
    else {
        $array = $object;
    }
    return $array;
}
<?php
//配置文件
return [
    'session'                => [
        'prefix'         => 'lv',
        'type'           => '',
        'auto_start'     => true,
        'expire'     => 21600,
    ],
    'http_exception_template'    =>  [
        // 定义404错误的重定向页面地址
        404 =>  APP_PATH.'404.html'
    ],
];
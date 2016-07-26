<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 12:17
 */

if(!function_exists('getQiniuUrl')) {
    function getQiniuUrl($key, $expires = 86400)
    {
        $accessKey = env('QINIU_AK');
        $secretKey = env('QINIU_SK');

        $auth = new Qiniu\Auth($accessKey, $secretKey);

        //baseUrl构造成私有空间的域名/key的形式
        $domain = 'http://7xp8vc.com1.z0.glb.clouddn.com';
        $baseUrl = $domain . $key;
        $authUrl = $auth->privateDownloadUrl($baseUrl, $expires);
        return $authUrl;
    }
}

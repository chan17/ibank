<?php
class OAuthClientFactory
{
	/**
	 * 创建OAuthClient实例
	 * 
	 * @param  string $type   	Client的类型
	 * @param  array $config 	必需包含key, secret两个参数
	 * @return AbstractOauthClient
	 */
    public static function create($type, array $config)
    {
    	if (!array_key_exists('key', $config) or !array_key_exists('secret', $config)) {
    		throw new InvalidArgumentException('参数$config中，必需包含key, secret两个为key的值');
    	}

        // 使用多个接口的时候使用
    	$class = ucfirst($type) . 'OAuthClient';
    	return new $class($config);
    }
}
<?php
Yii::import("application.utils.MessengerClient.cloopen.*"); 

/**
*     http://wiki.connect.qq.com/%E4%BD%BF%E7%94%A8authorization_code%E8%8E%B7%E5%8F%96access_token
**/
class QqOAuthClient extends AbstractOAuthClient
{   
    CONST USERINFO_URL = 'https://graph.qq.com/user/get_user_info';
    CONST AUTHORIZE_URL = 'https://graph.qq.com/oauth2.0/authorize?';
    CONST OAUTH_TOKEN_URL = 'https://graph.qq.com/oauth2.0/token';
    CONST OAUTH_ME_URL = 'https://graph.qq.com/oauth2.0/me';

    // 获取Access_Token   Step1：获取Authorization Code
    public function getAuthorizeUrl($callbackUrl)
    {
        $params = array();
        $params['client_id'] = $this->config['key'];
        
        
        $params['response_type'] = 'code';
        $params['redirect_uri'] = $callbackUrl;
        $params['status'] = 'pro';
        return self::AUTHORIZE_URL . http_build_query($params);
    }

    // 获取Access_Token   Step2：通过Authorization Code获取Access Token
    public function getAccessToken($code, $callbackUrl)
    {
        $params = array(
            'grant_type' => 'authorization_code', 
            'client_id' => $this->config['key'], 
            'client_secret' => $this->config['secret'], 
            'redirect_uri' => $callbackUrl, 
            'code' => $code,
        );
        $result = $this->getRequest(self::OAUTH_TOKEN_URL, $params);

        $rawToken = array();
        parse_str($result, $rawToken); 
        // 如果要获取更多操作权限，可以继续调用token ，userinfo作为基础信息，传送；
        $userInfo = $this->getUserInfo($rawToken);
        // var_dump('userInfo',$userInfo);exit();
        return  array(
            'userInfo' => $userInfo,
            'expiredTime' => $rawToken['expires_in'],
            'access_token' => $rawToken['access_token'],
            'token' => $rawToken['access_token']
        );
    }

    // 获取用户OpenID_OAuth2.0
    public function getUserInfo($token)
    {
        $params = array('access_token' => $token['access_token']);
        $result = $this->getRequest(self::OAUTH_ME_URL, $params);
        if (strpos($result, "callback") !== false) {
            $lpos = strpos($result, "(");
            $rpos = strrpos($result, ")");
            $result = substr($result, $lpos + 1, $rpos - $lpos - 1);
        }
        $user = json_decode($result);
        // var_dump($user);exit();
        $token['id'] = $user->openid;
        // var_dump($token);exit();
        $params = array(
            'oauth_consumer_key' => $this->config['key'] ,
            'openid' => $token['id'] , 
            // 'openid' => '134F29F0026866A664B549BDAD66A9F2', 
            'format' => 'json',
            'access_token' => $token['access_token']);
        // var_dump($params);exit();
        $result = $this->getRequest(self::USERINFO_URL, $params);
        // var_dump($result);exit();
        $info = json_decode($result, true);
        $info['id'] = $token['id'];
        // var_dump($info);exit();
        return $this->convertUserInfo($info);
    }

    private function convertUserInfo ($infos) {
        $userInfo = array();
        // $userInfo['Uid'] = ;
        $userInfo['Qqopenid'] = $infos['id'];
        $userInfo['Nickname'] = $infos['nickname'];
        // $userInfo['Face'] = empty($infos['figureurl_qq_2']) ? '' : $infos['figureurl_qq_2'];

        if ($infos['gender'] == '男') {
            $userInfo['Gender'] = 1;
        } elseif ($infos['gender'] == '女') {
            $userInfo['gender'] = 0;
        } else {
            $userInfo['Gender'] = 0;
        }

        return $userInfo;
    }

    public function getClientInfo()
    {
        return array('type' => 'qq','name' => 'QQ');
    }
}
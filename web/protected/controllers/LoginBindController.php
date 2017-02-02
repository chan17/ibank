<?php
Yii::import("application.utils.OAuthClient.*");

class LoginBindController extends Controller
{
    /**
    * @type  如QQ  weibo
    **/
    public function actionIndex ($type = 'Qq')
    {
        if (Yii::app()->request->hasProperty('_target_path')) {
            Yii::app()->Session->setSavePath('_target_path', Yii::app()->request->getQuery('_target_path'));
        }

        $client = $this->createOAuthClient($type);
        $callbackUrl = $this->createAbsoluteUrl('loginBind/callback', array('type' => $type));
        // var_dump('callbackUrl',$callbackUrl);exit();
        $url = $client->getAuthorizeUrl($callbackUrl);
// var_dump($url);exit();

        return Yii::app()->controller->redirect($url);
    }

    public function actionCallback($type ='Qq')
    {
        $code = Yii::app()->request->getQuery('code');
        // $code = $_GET['code'];
        // var_dump($code);exit();
        $callbackUrl = $this->createAbsoluteUrl('loginBind/callback', array('type' => $type));
        $token = $this->createOAuthClient($type)->getAccessToken($code, $callbackUrl);
// var_dump($token);exit();

        Yii::app()->Session->add('oauth_token', $token['userInfo']);

        $resultUrl = $this->createAbsoluteUrl('loginBind/choose', array('type' => $type));
        return $this->redirect($resultUrl);
    }

    public function actionChoose($type='Qq')
    {
        $token = Yii::app()->Session->get('oauth_token');

        $openUser = $this->getUserService()->getUserByOpenid($token['Qqopenid']);

        if (empty($openUser)) {
            return $this->redirect(array('Register/Index','type'=>'Qq'));
        }else{
            $identity=new UserAuthIdentity($token['Qqopenid']);
            if($identity->authenticate()){
                $result = Yii::app()->user->login($identity,3600*24*7);
                ini_set('session.cookie_lifetime', SessionKey::EXPIRE_TIME);
                ini_set('session.gc_maxlifetime', SessionKey::EXPIRE_TIME);
                Yii::app()->user->login($identity, SessionKey::EXPIRE_TIME);
                Yii::app()->user->identityCookie=array('cookieUserId'=>$identity->getId());
                
                $session = Yii::app()->session;
                // $session->setTimeout(3600*24*7);
                $session[SessionKey::UID] = $identity->getId();
                
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                throw new Exception($identity->errorMessage, 1);
            }

        }
    }

    public function getOauthUser($type = 'Qq')
    {
        $token = Yii::app()->Session->get('oauth_token');
        $client = $this->createOAuthClient($type);
        $oauthUser = $client->getUserInfo($token);

        return $oauthUser;
    }

    //  暂时用不到 里面有几个userservice 要改
    // public function actionexist($type)
    // {
    //     $token = Yii::app()->Session->get('oauth_token');
    //     $client = $this->createOAuthClient($type);

    //     $oauthUser = $client->getUserInfo($token);

    //     $data = Yii::app()->Request->getPost();
    //     $user = $this->getUserService()->getUserByEmail($data['email']);
    //     if (empty($user)) {
    //         $response = array('success' => false, 'message' => '该Email地址尚未注册');
    //     } elseif(!$this->getUserService()->verifyPassword($user['id'], $data['password'])) {
    //         $response = array('success' => false, 'message' => '密码不正确，请重试！');
    //     } elseif ($this->getUserService()->getUserBindByTypeAndUserId($type, $user['id'])) {
    //         $response = array('success' => false, 'message' => "该{{ $this->setting('site.name') }}帐号已经绑定了该第三方网站的其他帐号，如需重新绑定，请先到账户设置中取消绑定！");
    //     } else {
    //         $response = array('success' => true, '_target_path' => $request->getSession()->get('_target_path', $this->generateUrl('homepage')));
    //         // $this->getUserService()->bindUser($type, $oauthUser['id'], $user['id'], $token);
    //         $this->authenticateUser($user);
    //     }

    //     return json_encode($response);
    // }

    private function createOAuthClient($type = 'Qq')
    {
        // 配置参数

        $config = array('key' =>'101053603', 'secret' => '10c74a60f92cb854bfbbf0382337907c');
        // var_dump($type);die();
        $client = OAuthClientFactory::create($type, $config);

        return $client;
    }
}
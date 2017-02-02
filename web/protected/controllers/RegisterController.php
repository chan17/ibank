<?php
Yii::import("application.utils.MessengerClient.cloopen.*"); 
Yii::import("application.controller.LoginBindController.php");

class RegisterController extends Controller
{
	public $layout='//layouts/login-register';

	public function actionIndex($type='',$error='')
	{
		if ($type=='') {
			$this->locaRegister($type,$error);
		}
		if($type == 'Qq'){
			// $qquser = $oauthUser;
			$this->QQRegister($type,$error);
		}
	}

	private function locaRegister($type,$error)
	{
		$model=new RegisterForm;
		if(isset($_POST['RegisterForm'])){

			$userForm = $model->attributes=$_POST['RegisterForm'];

			if($model->validate()){
				if ($this->getUserService()->isPhoneAvailable($userForm['Phone']) == true) {
					// print_r('手机yanzheng');die();
					$result = $this->getUserService()->creatUser($userForm,$type);

					if (!$result && $result['status']==false) {
						throw new Exception("用户注册出错", 1);
					}else{
						$identity=new UserIdentity($userForm['Phone'],$userForm['Password']);
						if($identity->authenticate()){
							ini_set('session.cookie_lifetime', SessionKey::EXPIRE_TIME);
							ini_set('session.gc_maxlifetime', SessionKey::EXPIRE_TIME);
							Yii::app()->user->login($identity, SessionKey::EXPIRE_TIME);
							Yii::app()->user->identityCookie=array('cookieUserId'=>$identity->getId());

							$session = Yii::app()->session;
							// $session->setTimeout(3600*24*7);
							$session[SessionKey::UID] = $identity->getId();
						}else{
							// throw new Exception($identity->errorMessage, 1);
							$this->redirect(array('index','error'=>$identity->errorMessage));
						}
					}
					//从定向到前一页
					$this->redirect(Yii::app()->user->returnUrl);
				}else{
					$this->redirect(array('index','error'=>'手机已注册'));
				}
			}else{}
		}

		$this->render('index',array(
			'model'=>$model,
			'war'=>$type,
			'error'=>$error,
		));

	}

	private function QQRegister($type,$error)
	{
        $qquser = Yii::app()->Session->get('oauth_token');
        // $qquser = array("Qqopenid"=>"5A1E3336BA473173B1BB7CC2737C4FE3","Nickname"=>"徐玉国" ,"Gender"=>1);

		// var_dump('vv',$token);exit();
		$model=new QqRegisterForm;

		if(isset($_POST['QqRegisterForm'])){
			$userForm = $model->attributes=$_POST['QqRegisterForm'];
			$userForm = array_merge($userForm,array('qquser'=>$qquser));

			if($model->validate()){
		        $openUser = $this->getUserService()->getUserByOpenid($qquser['Qqopenid']);
			        if (empty($openUser)) {
						$result = $this->getUserService()->creatUser($userForm,$type);
			        }else{
						$result = $this->getUserService()->updateUser($openUser['Uid'],$userForm,$type);
			        }

				// 上线后该成 or
				if (!$result && $result['status']==false) {
					throw new Exception("用户注册出错", 1);
				}else{
					$identity=new UserAuthIdentity($qquser['Qqopenid']);
					if($identity->authenticate()){
						ini_set('session.cookie_lifetime', SessionKey::EXPIRE_TIME);
						ini_set('session.gc_maxlifetime', SessionKey::EXPIRE_TIME);
						Yii::app()->user->login($identity, SessionKey::EXPIRE_TIME);
						Yii::app()->user->identityCookie=array('cookieUserId'=>$identity->getId());

						$session = Yii::app()->session;
						// $session->setTimeout(3600*24*7);
						$session[SessionKey::UID] = $identity->getId();

					}else{
						$this->redirect(array('index','type'=>'Qq','oauthUser'=>$qquser,'error'=>$identity->errorMessage));
					}
				}
				//从定向到前一页
				$this->redirect(Yii::app()->user->returnUrl);
			}else{}
		}

		$this->render('index',array(
			'qquser'=>$qquser,
			'model'=>$model,
			'war'=>$type,
			'error'=>$error,
		));

	}

    public function actionAjaxphoneauth($phone)
    {

		$sss = array('status'=>true,'message'=>"Try to create a subaccount, binding to use");
    	return print CJSON::encode($sss);
    	// echo CJSON::encode( $sss );
    	$cloopen = new CloopenClick;

    	$response = $this->getUserService()->isPhoneVerifiedAvailable($phone);
    	if ($response == false) {
    		return $response;
    	}
    	Yii::app()->session->add('sendSMSStatus',true);
    	Yii::app()->session->add('sendSMSTime',time());

        $authCode = $this->makePhoneMessage($phone);
        // var_dump($authCode);exit();

        // 调用CloopenClick.......
        if (!empty($authCode)) {
			$aac = Yii::app()->session->get('sendSMSStatus');var_dump($aac);
			$aa = Yii::app()->session->get('sendSMSTime');var_dump($aa);
            $sms = $cloopen->sendSMS($authCode['phoneNum'],$authCode['message'],$authCode['msgType']);

            if ($sms['status'] == true) {
            	$this->getSendSMSService()->saveRecord('unknown','register',$authCode['code'],$phone,$sms['smsMessageSid'],$authCode['message'],$sms['dateCreated']);
	            $response = array('status'=>true,'message'=>'手机可以用','code'=>$authCode['code']);
		        return print json_encode($response);
            }

        }
        $response = array('status'=>false,'message'=>'手机不可用','code'=>NUll);


        return print json_encode($response);
    }

    private function makePhoneMessage($phone)
    {
    	if (empty($phone)) {
    		throw Exception("Not phone",1);
    	}
        $authCode=array();
        $randNum = mt_rand(0000,9999);
        if (strlen($randNum)<4) {
            $randNum=sprintf("%04d", $randNum);
        }
        $authCode['code'] = $randNum;
        $authCode['phoneNum']= $phone;
        $authCode['message']="您的手机验证码是：{$randNum}，欢迎使用千亿贷。验证码个人持有。请勿轻信不法分子，泄露本验证码。如非本人操作请致电：888888。【千亿贷】";
        $authCode['msgType']=0;// 普通短信

        return $authCode;
    }
}
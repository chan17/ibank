<?php

class AuthController extends Controller
{
	public $layout = 'main';
	public $aNav = '';
	public $twoNav = '';
	
	public function actionLogin($error='')
	{
		// 把前台的Cwebuser存的东西先去掉；
		$this->cleanCWebUser();
		$model=new AdminLoginForm;

		if(isset($_POST['AdminLoginForm'])){
			$loginForm = $model->attributes = $_POST['AdminLoginForm'];
			// var_dump($loginForm);exit();
			if($model->validate() && $model->login()){
				$identity=new UserAdminIdentity($loginForm['UserName'],$loginForm['Password']);
				
				if($identity->authenticate()){
					// 登陆限制时间：1200秒
					ini_set('session.cookie_lifetime', SessionKey::ADMIN_EXPIRE_TIME);
					ini_set('session.gc_maxlifetime', SessionKey::ADMIN_EXPIRE_TIME);
					Yii::app()->user->login($identity, SessionKey::ADMIN_EXPIRE_TIME);

					$session = Yii::app()->session;
					$session[SessionKey::UID] = $identity->getId();
					
					$this->redirect(array('info/index'));
				}
			}
			$errorArray = $model->getErrors();

			if (!empty($errorArray['errorFromIdentity'])) {
				return $this->redirect(array('login','error'=>$errorArray['errorFromIdentity'][0]));
			}

		}

		$this->render('login',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	private function cleanCWebUser()
	{
		$aaa = Yii::app()->user->logout(true);

		$session = Yii::app ()->session;
		$session->clear();
		$session->destroy();
	}

	public function actionLogout()
	{
		$aaa = Yii::app()->user->logout(true);

		$session = Yii::app ()->session;
		$session->clear();
		$session->destroy();

		$this->redirect(array('login'));
	}

}
<?php
Yii::import("application.controller.LoginBindController.php");

class LoginController extends Controller
{
	public $layout='//layouts/login-register';

	public function actionIndex($error='')
	{
		$model=new UserLoginForm;

		if(isset($_POST['UserLoginForm'])){
			
			$loginForm = $model->attributes = $_POST['UserLoginForm'];

			if($model->validate() && $model->login()){
				$identity=new UserIdentity($loginForm['Phone'],$loginForm['Password']);
				
				if($identity->authenticate()){
					$result = Yii::app()->user->login($identity);

					if ($loginForm['rememberMe'] == true) {
						ini_set('session.cookie_lifetime', SessionKey::EXPIRE_TIME);
						ini_set('session.gc_maxlifetime', SessionKey::EXPIRE_TIME);
						Yii::app()->user->login($identity, SessionKey::EXPIRE_TIME);
						Yii::app()->user->identityCookie=array('cookieUserId'=>$identity->getId());
					}
					$session = Yii::app()->session;
					$session[SessionKey::UID] = $identity->getId();
					
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			$errorArray = $model->getErrors();
			if (!empty($errorArray['errorFromIdentity'])) {
				return $this->redirect(array('index','error'=>$errorArray['errorFromIdentity'][0]));
			}
		}
		// $error = '';
		$this->render('index',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	public function actionQQLogin()
	{
		
	}

	public function actionLogout()
	{
		$aaa = Yii::app()->user->logout(true);

		$session = Yii::app ()->session;
		$session->clear();
		$session->destroy();

		$this->redirect(Yii::app()->homeUrl);
	}
	
}
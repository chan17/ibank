<?php
/**
 * 身份控制过滤器
 * 需要登录的action都需要经过此做身份判断
 */
class AuthFilter extends CFilter{
	public function preFilter($filterChain){
		// 可以在此增加身份过滤代码
		// 登录成功设置session，测试时写在此处
		$session = Yii::app()->session;
		$cookie=Yii::app()->user->identityCookie; //cookie 暂时不考虑
		$currentUser = Yii::app()->user->id;

		if (!empty(Yii::app()->user->site)) {
			if (Yii::app()->user->site != 'web') {
				$aaa = Yii::app()->user->logout(true);
				$session = Yii::app ()->session;
				$session->clear();
				$session->destroy();
			}
		}

		if(!empty($session[SessionKey::UID]) and !empty($currentUser)){
			if ($session[SessionKey::UID] == $currentUser) {
				return true; // cookie 和 cookie中UID == currentUser，则表示登陆过
			}
		}

		$loginUrl = Yii::app()->controller->createUrl('/login/index');
		Yii::app()->controller->redirect($loginUrl);
		return false;
	}
	
	public function postFilter($filterChain){

		return true;
	}
}
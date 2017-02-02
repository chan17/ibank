<?php

class LogoutController extends BaseAuthController
{
	public $layout='//layouts/column-pure';

	public function actionIndex()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);

		yii::app()->session->remove('UID');

		return true;
	}
}
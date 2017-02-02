<?php
class PeopleController extends Controller
{
	public $layout = 'main';

	public function actionView($uid)
	{
		$userInfo = User::model()->findByPk($uid);

		return $this->render('view',array(
			'userInfo'=>$userInfo,
		));
	}
}
<?php
class InfoController extends BaseAdminAuthController
{
	public $layout = '/info/info-main';

	public $aNav = 'info';
	public $twoNav;
//  下周一开始写短信的东西
	public function actionIndex()
	{
		// var_dump(Yii::app()->user->purview);exit();
		
		$this->twoNav = 'index';
		$this->render('index');
	}

	public function actionGainClick()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'Create_time desc'; //按什么字段来排序
		if(Yii::app()->request->isPostRequest){
			if(!empty($_POST['userneme'])){
				$criteria->addSearchCondition('Nickname',$_POST['userneme']);
			}
		}

		$count = LogGainClick::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。

		$pager = new CPagination($count);

		$pager->pageSize = 15; //每页显示的行数

		$pager->applyLimit($criteria);
		$posts = LogGainClick::model()->findAll($criteria);//查询所有的数据
		if (empty($posts)) {
			$ids = null;
			$postsUser = null;
		}
	
		foreach ($posts as $key => $value) {
			$ids[] = $value['Uid'];
		}
		$resultUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));
		foreach ($resultUser as $key => $value) {
			$postsUser[$value['Uid']] = $value['Nickname'];
		}


		$this->twoNav = 'GainClick';
		$this->render('gain-click',array(
			'pages'=>$pager,
			'posts'=>$posts,
			'postsUser'=>$postsUser
		));
	}

	// 短信发送记录
	public function actionSendSMS()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'SendTime desc'; //按什么字段来排序
		// if(Yii::app()->request->isPostRequest){
		// 	if(!empty($_POST['userneme'])){
		// 		$criteria->addSearchCondition('Nickname',$_POST['userneme']);
		// 	}
		// }

		$count = LogSendsms::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。

		$pager = new CPagination($count);

		$pager->pageSize = 13; //每页显示的行数

		$pager->applyLimit($criteria);
		$posts = LogSendsms::model()->findAll($criteria);//查询所有的数据
		// var_dump($posts);exit();
		if (empty($posts)) {
			$ids = null;
			$postsUser = null;
		}
	
		foreach ($posts as $key => $value) {
			$ids[] = $value['Uid'];
		}
		// var_dump($ids);exit();
		$resultUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));
		foreach ($resultUser as $key => $value) {
			$postsUser[$value['Uid']] = $value['Nickname'];
		}


		$this->twoNav = 'sendsms';
		$this->render('sendsms',array(
			'pages'=>$pager,
			'posts'=>$posts,
			'postsUser'=>$postsUser
		));
	}
	
	// 网站的资金流动
	public function actionPayment()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'Create_time desc'; //按什么字段来排序
		// if(Yii::app()->request->isPostRequest){
		// 	if(!empty($_POST['userneme'])){
		// 		$criteria->addSearchCondition('Nickname',$_POST['userneme']);
		// 	}
		// }

		$count = LogPayment::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。

		$pager = new CPagination($count);

		$pager->pageSize = 13; //每页显示的行数

		$pager->applyLimit($criteria);
		$posts = LogPayment::model()->findAll($criteria);//查询所有的数据
		if (empty($posts)) {
			$ids = null;
			$postsUser = null;
		}
	
		foreach ($posts as $key => $value) {
			$ids[] = $value['Uid'];
		}
		// var_dump($ids);exit();
		$resultUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));
		foreach ($resultUser as $key => $value) {
			$postsUser[$value['Uid']] = $value['Nickname'];
		}


		$this->twoNav = 'payment';
		$this->render('payment',array(
			'pages'=>$pager,
			'posts'=>$posts,
			'postsUser'=>$postsUser
		));
	}

	// public function filters() { 
	// 	// return array( 
	// 	// 	// 'accessControl',
	// 	// 	'accessAuth', 
	// 	// ); 
	// 	if (5 == 5) {
	// 	return array(
	// 		'postOnly + index',
	// 	);
	// 	}
	// }

	// public function filterAccessAuth($filterChain) {  
 //        // if(Yii::app()->user->getIsGuest() && !in_array($this->getAction()->getId(), $this->authlessActions())) {  
 //        //     Yii::app()->user->setFlash("info", "请先登录");  
 //        //     Yii::app()->user->loginRequired();  //封装了Yii::app()->user->loginUrl  
 //        // } 
 //        echo 'vvvvv';
 //            Yii::app()->user->setFlash("info", "请先登录");  
  
 //        $filterChain->run();  
 //    }
 //    public function filterPostOnly($filterChain)
 //    {
 //    	var_dump($_GET);
 //    	return print 'vvvvv';
 //    	// $filterChain->run('vvvv'); 
 //    }

	// public function accessRules()
	// {
	// 	return array(
	// 		// array('deny',  // allow all users to access 'index' and 'view' actions.
	// 		// 	'actions'=>array('index','GainClick'),
	// 		// 	'users'=>array('*'),
	// 		// 	'message'=>'ccc',
	// 		// ),
	// 		// array('allow', // allow authenticated users to access all actions
	// 		// 	'users'=>array('@'),
	// 		// ),
	// 		// array('deny',  // deny all users
	// 		// 	'users'=>array('*'),
	// 		// ),
	// 		// array('deny'),
	// 	);
	// }
}
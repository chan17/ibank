<?php

class UserController extends BaseAdminAuthController
{
	public $layout = '/user/user-main';

	public $aNav = 'user';
	public $twoNav;
	
	public function actionCtrl($filter=true)
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'Create_time desc'; //按什么字段来排序
		if(Yii::app()->request->isPostRequest){
			if(!empty($_POST['phone'])){
				// $criteria->addSearchCondition('Nickname',$_POST['userneme']);
				$criteria->condition='Phone=:Phone';
				$criteria->params=array(':Phone'=>$_POST['phone']);
			}
			if(!empty($_POST['userneme'])){
				$criteria->addSearchCondition('Nickname',$_POST['userneme']);
			}
		}

		$count = User::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。

		$pager = new CPagination($count);

		$pager->pageSize = 15; //每页显示的行数

		$pager->applyLimit($criteria);

		$userList = User::model()->findAll($criteria);//查询所有的数据

		$this->twoNav = 'ctrl';
		$this->render('ctrl',array(
			'pages'=>$pager,
			'posts'=>$userList,
		));
	}

	public function actionAjaxPullBlack($uid)
	{
		if (empty($uid)) {
			throw new Exception("id is undefined", 1);
		}
		$userInfo = User::model()->findByPk($uid);
		if ($userInfo['IsBlack'] == 0) {
			$newBlack = 1;
		}else{
			$newBlack = 0;
		}
		$result = User::model()->updateByPk($uid, array('IsBlack'=>$newBlack));
		return print json_encode(($result)?true:false);
	}

	public function actionAjaxChangeUser($uid)
	{
		if (empty($uid)) {
			throw new Exception("id is undefined", 1);
		}
		if(Yii::app()->request->isPostRequest){
			$result = User::model()->updateByPk($uid, array('SingleIncome'=>$_POST['singleincome'],'Level'=>$_POST['level']));
			return print json_encode(($result)?true:false);
		}
	
		$userInfo = User::model()->findByPk($uid);
		// var_dump($userInfo);
		$resultUserInfo = array('singleincome'=>$userInfo['SingleIncome'],'level'=>$userInfo['Level']);
		return print json_encode($resultUserInfo);
	}

	public function  actionCtrlAdmin($filter=true)
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'Uid desc'; //按什么字段来排序
		if(Yii::app()->request->isPostRequest){
			if(!empty($_POST['UserName'])){
				// $criteria->addSearchCondition('Nickname',$_POST['userneme']);
				$criteria->condition='UserName=:UserName';
				$criteria->params=array(':UserName'=>$_POST['UserName']);
			}
		}

		$count = UserAdmin::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。
		$pager = new CPagination($count);
		$pager->pageSize = 15; //每页显示的行数
		$pager->applyLimit($criteria);
		$userList = UserAdmin::model()->findAll($criteria);//查询所有的数据

		$this->twoNav = 'ctrlAdmin';
		$this->render('ctrl-admin',array(
			'pages'=>$pager,
			'posts'=>$userList,
			'admin_purview'=>SystemConstants::$admin_purview,
			'filter'=>$filter,
		));
	}

	public function actionCreateUser($filter=true)
	{
        if(Yii::app()->request->isPostRequest){
	        	$user = UserAdmin::model()->find('UserName=:UserName',array(':UserName'=>$_POST['UserName']));
	        	if (!empty($user)) {
	        		throw new Exception("该用户已存在", 1);
	        	}

    	        $userAR = new UserAdmin;
    	        $userAR->UserName = $_POST['UserName'];
    	        $userAR->Password = md5($_POST['Password']);
                  $userAR->Purview = $_POST['Purview'];
    	        $userAR->LastTime = time();
                $resultUser = $userAR->save();
    	        // $resultUser = true;
                if ($resultUser == true) {
                    return $this->redirect(array('CtrlAdmin'));
                }else{
                    return print ('false,创建失败，数据库出错');
                }
        }
        return print json_encode(false);
	}

    public function actionAjaxDelUser($uid)
    {
        $result = UserAdmin::model()->deleteByPk($uid);

        return print json_encode(($result)?true:false);
    }

	// 查余额
	public function actionRecharge($uid='',$filter=true)
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'Create_time desc'; //按什么字段来排序
			if(!empty($uid)){
				// var_dump($uid);
				$criteria->condition='Uid=:Uid';
				$criteria->params=array(':Uid'=>$uid);
			}


		$count = RecordRechargeModel::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。

		$pager = new CPagination($count);

		$pager->pageSize = 13; //每页显示的行数

		$pager->applyLimit($criteria);
		$posts = RecordRechargeModel::model()->findAll($criteria);//查询所有的数据
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


		$this->twoNav = 'recharge';
		$this->render('recharge',array(
			'pages'=>$pager,
			'posts'=>$posts,
			'postsUser'=>$postsUser
		));
	}

	public function actionNoPurview($twoNav)
	{
		$this->twoNav = $twoNav;
		$this->render('no-purview');
	}

	public function filters() {
		if (Yii::app()->user->purview == 3) {
			return array(
				'postOnly + Ctrl , AjaxPullBlack, AjaxChangeUser,Recharge,CtrlAdmin , AjaxDelUser, CreateUser',
			);
		}elseif (Yii::app()->user->purview != 1) {
			return array(
				'postOnly + CtrlAdmin , AjaxDelUser, CreateUser',
			);
		}
	}

    public function filterPostOnly($filterChain)
    {
    	$name = $this->getAction()->getId();
 
    	return $this->redirect(array('NoPurview','twoNav'=>$name));
    }

 //    public function accessRules()
	// {
	// 	return array(

	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 			'controllers'=>array('post', 'admin/user'),
	// 		),
	// 	);
	// }
}
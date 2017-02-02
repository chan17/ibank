<?php
/**
 * 个人中心账号控制器
 * FileName:AccountController
 * @author   hushangming
 */
class AccountController extends BaseAuthController{
	// 布局设置为空，默认会读取MyModule中指定的layout
	public $layout = 'main';
	private $uid;
	public function __construct($id, $module){
		$session = Yii::app()->session;
		$this->uid = $session[SessionKey::UID];
		parent::__construct($id,$module);
	}
	/**
	 * 我的账户信息
	 * @method actionInfo
	 * @author   hushangming
	 */
	public function actionInfo($prompt=false){
		$result = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$this->uid));
		$rechargeInfo = empty($result->attributes) ? null : $result->attributes;
		//print_r($rechargeInfo);die;
		$userInfo = User::model()->findByPk($this->uid);
		$this->render('info', array('rechargeInfo'=>$rechargeInfo,'userInfo'=>$userInfo,'prompt'=>$prompt));
	}
	
	/**
	 * 充值
	 * @method actionRecharge
	 * @author   hushangming
	 * @var loanId 查看借款时，如果余额不足，带着loanid进入此action。充值后跳转到相应贷款详情. 
	 * @var pa_MP  用CUT隔断字符 分别是UID，Loanid ,支付状态。。
 	 */
	public function actionRecharge($error='',$loanId=''){
		$model = new RechangeForm;
		$record = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$this->uid));
// var_dump(Yii::app()->request->hostInfo.Yii::app()->getBaseUrl() );exit();
		$web = Yii::app();
		$payUtilsUrl = $web->request->hostInfo.$web->getBaseUrl().'/protected/utils/Payment/yeepay/req.php';
		// $payUtilsCallBackUrl = $web->request->hostInfo.$web->getBaseUrl().'/protected/utils/Payment/yeepay/callback.php';
		$payUtilsCallBackUrl = $this->createAbsoluteUrl('PayLoanDetail/YeepayForCallback');
		$loanId = (empty($loanId))?'null':$loanId;
		$params = array(
			'p2_Order'=>'51ibank'.$this->uid.'uid'.time(),
			'p3_Amt'=>'',
			'p5_Pid'=> iconv("UTF-8", "GBK", '充值给您的世纪唯银账户'),
			'p6_Pcat'=>iconv("UTF-8", "GBK", '即时充值'),
			'p7_Pdesc'=>iconv("UTF-8", "GBK", '充值后的钱可用于购买世纪唯银的服务'),
			// 'p5_Pid'=> '22222',
			// 'p6_Pcat'=>'5555',
			// 'p7_Pdesc'=>'66666',
			'p8_Url' => $payUtilsCallBackUrl,
			'pa_MP' => $this->uid.'CUT'.$loanId.'CUTadd',
			'pd_FrpId' => '',//显示所有支付方式
		);
		// var_dump(Yii::app()->Session->get('pay_loanId'));
		if (!empty($loanId)) {
			$params['pa_MP'] = $this->uid.'CUT'.$loanId.'CUTaddAndjumploan';
		}
		function ceil_dec($v, $precision){
		    $c = pow(10, $precision);
		    return ceil($v*$c)/$c;
		}
		if(Yii::app()->request->isPostRequest){
			$formData = $_POST;
				// var_dump($formData['Amount']);exit();
			if ($formData['Amount']<=0) {
				$error='vvvv';
				$this->redirect(array('recharge','error'=>$error));
			}
			if($model->validate()){
				$formData['Amount'] = $formData['Amount'] - $formData['Amount']*0.008;
				$formData['Amount'] = (string)ceil_dec($formData['Amount'],2);
				$params['p3_Amt'] = $formData['Amount'];
				// var_dump($params);
				$response = $this->postRequest($payUtilsUrl,$params);

				if ($response) {
				// var_dump('AccountController',$response);
					print'消息传递成功';
					return print $response;
					// Yii::app()->Session->add('pay_loanI	d', $loanId);
					// Yii::app()->Session->add('pay_status', 'add');
					// (explode(" ",$str));
					// return print'消息传递成功';
				}else{
					throw new Exception("消息传递出错");
					
				}
			}
		}
			// if (isset($loanId)) {
			// 	$this->redirect(array('/loanDetail/Item','id'=>$loanId));
			// }
		$this->render('recharge',array(
			'model'=>$model,
			'error'=>$error,
			'rechargeInfo'=>$record,
		));
	}
	
	/**
	 * 提现
	 * @method actionCash
	 * @author   hushangming
	 */
	public function actionCash($error=''){
		$model = new CashForm;
		$resultMS = false;
		$recordRecharge = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$this->uid));
		$userInfo = User::model()->findByPk($this->uid);
		$isSetCashPass = (empty($userInfo['CashPassword']))?true:false; // 没设返回true、

		if(Yii::app()->request->isPostRequest){
			$formData = $_POST;
			// var_dump($formData);exit();
			if (empty($formData['WithdrawAmount']) or !is_numeric($formData['WithdrawAmount'])) {
				$this->redirect(array('cash','error'=>'请填写正确的余额'));
			}
			if ($recordRecharge->Yue < $formData['WithdrawAmount']) {
				$this->redirect(array('cash','error'=>'您当前余额不足以提取'));
			}
			if($model->validate()){
				$recordWithdrawal = new RecordWithdrawalModel;
				$recordWithdrawal->Uid = $this->uid;
				$recordWithdrawal->Status = 0;
				$recordWithdrawal->YuE = $recordRecharge->Yue - $formData['WithdrawAmount']; 
				$recordWithdrawal->ColdYuE = $recordRecharge->ColdYue;
				$recordWithdrawal->OutJinE = $formData['WithdrawAmount'];
				$recordWithdrawal->OutCount = null;
				$recordWithdrawal->OutCountName = null;
				$recordWithdrawal->Create_time = $recordWithdrawal->Update_time = time();
				if (!$recordWithdrawal->save()) {
					var_dump($recordWithdrawal->getErrors());exit();
					throw new Exception("提款失败", 1);
				}
				$recordRecharge->Yue = $recordRecharge->Yue - $formData['WithdrawAmount'];
				if (!$recordRecharge->save()) {
					throw new Exception("提款失败", 1);
				}
				$resultMS = true;
			}
		}

		$this->render('cash',array(
			'model'=>$model,
			'error'=>$error,
			'rechargeInfo'=>$recordRecharge,
			'isSetCashPass'=>$isSetCashPass,
			'result'=>$resultMS,
		));
	}
	
	/**
	 * 我的借款
	 */
	public function actionLoan(){
		$result = LoanBaseInfoModel::model()->findAllByAttributes(array('Uid'=>$this->uid));
		//print_r($result);die;
		$this->render('loan', array('result'=>$result));
	}
	
	/**
	 * 账户安全
	 */
	public function actionSecure(){
		$this->render('secure');
	}
	
	/**
	 * 我的消息
	 */
	public function actionMsg(){
		$this->render('msg');
	}
	
	/**
	 * 修改密码
	 * @method actionUpPwd
	 * @author   hushangming
	 * @return
	 * @since v1.16.0
	 */
	public function actionUpPwd($error=''){
		$userInfo = User::model()->findByPk($this->uid);
		if(Yii::app()->request->isPostRequest){
			$error='';
			if(empty($_POST['oldpwd'])){
				$error='请输入原密码';
				$this->redirect(array('UpPwd','error'=>$error));
			}elseif(empty($_POST['newpwd'])){
				$error='请输入新密码';
				$this->redirect(array('UpPwd','error'=>$error));
			}elseif(empty($_POST['chkpwd'])){
				$error='请输入确认密码';
				$this->redirect(array('UpPwd','error'=>$error));
			}
			if($_POST['chkpwd']!=$_POST['newpwd']){
				$error='新密码前后不一致';
				$this->redirect(array('UpPwd','error'=>$error));
			}
			if(md5($_POST['oldpwd'])!=$userInfo['Password']){
				$error='旧密码错误';
				$this->redirect(array('UpPwd','error'=>$error));
			}

			$result = User::model()->updateByPk($this->uid, array('Password'=>md5($_POST['newpwd'])));
			
		}else{
			$result = 0;
			$this->render('upPwd',array('userInfo'=>$userInfo,'error'=>$error,'result'=>($result == 1)?"true":"false",));
		}
	}

	/**
	 * 设置提现密码
	 * @method actionUpPwd
	 * @author   chan17
	 * @return
	 * @since v1.16.0
	 * @var tab 设置密码类型，设置提现密码，找回体现密码。TODO
	 */
	public function actionSetCashPassword($tab,$error=''){
		$model= new CashPasswordForm;
		$userInfo = User::model()->findByPk($this->uid);
		$result='';
		if (empty($userInfo['CashPassword'])) {
			$firstSet = true;
			if(Yii::app()->request->isPostRequest){
				$error='';
				$dataForm = $model->attributes=$_POST['CashPasswordForm'];
				if($model->validate(array('newpwd','chkpwd'))){

					if ($dataForm['newpwd'] != $dataForm['chkpwd']) {
						throw new CHttpException('两次密码输入不同');
					}else{
					$result = User::model()->updateByPk($this->uid, array('CashPassword'=>md5($dataForm['newpwd'])));
					}
				}
			}
		}else{
			$firstSet = false;
			if(Yii::app()->request->isPostRequest){
				$error='';
				$dataForm = $model->attributes=$_POST['CashPasswordForm'];

				if($model->validate()){
					if ($dataForm['newpwd'] != $dataForm['chkpwd']) {
						throw new CHttpException('连两次密码输入不同');
					}elseif(md5($dataForm['oldpwd']) != $userInfo['CashPassword']){
						$this->redirect(array('SetCashPassword','tab'=>$tab,'error'=>'原提现密码输入错误'));
					}else{
						$result =User::model()->updateByPk($this->uid, array('CashPassword'=>md5($dataForm['newpwd'])));
					}
				}
			}
		}
		$this->render('setCashPwd',array(
			'model'=>$model,
			'userInfo'=>$userInfo,
			'tab'=>$tab,
			'firstSet'=>$firstSet,
			'error'=>$error,
			'result'=>($result == 1)?"true":"false",
		));
	}
	
	/**
	 * 资金记录
	 * @method actionMoneyHistory
	 * @author   hushangming
	 * @return
	 * @since v1.16.0
	 */
	public function actionMoneyHistory(){
		$condition = 'Uid='.$this->uid;
		$g_type = trim(strval($_GET['Type']));
		if(!empty($g_type)){
			$condition .= " AND Type='".$g_type."'";
		}
		$g_time = intval($_GET['Time']);
		if($g_time){
			$_start_time = time()-$g_time*3600*24;
			$condition .= " AND Create_time >".$_start_time;
		}
		$logPayments = LogPayment::model()->findAll($condition);
		//print_r($logPayments);die;
		$this->render('moneyHistory',array('logPayments'=>$logPayments));
	}
	
	/**
	 * 我的名片
	 * @method actionOwnCard
	 * @author   hushangming
	 * @return
	 * @since v1.16.0
	 */
	public function actionOwnCard(){
		$session = Yii::app()->session;
		$model = new UserCard();
		$cardInfo = $model->findByPk($session[SessionKey::UID]);
		//print_r($cardInfo);die;
		$error = '';
		if(Yii::app()->request->isPostRequest){
			$_attirbutes = array(
				'Uid'=>$session[SessionKey::UID],
				'FullName'=>$_POST['FullName'],
				'Job'=>$_POST['Job'],
				'Mobile'=>$_POST['Mobile'],
				'Business'=>$_POST['Business'],	
				'LoanRate'=>$_POST['LoanRate'],
				'Org'=>$_POST['Org'],
				'Create_time'=>time(),
				'Update_time'=>time(),
			);
			if(empty($cardInfo)){
				$model->attributes = $_attirbutes;
				$op = $model->save();
			}else{
				unset($_attirbutes['Uid']);
				$op = $model->updateByPk($cardInfo['Uid'], $_attirbutes);
			}
			if($op){
				$this->render('ownCard',array('cardInfo'=>$_attirbutes,'error'=>''));
				Yii::app()->end();
			}
			$this->render('ownCard',array('cardInfo'=>$cardInfo->attributes,'error'=>'保存失败'));
			Yii::app()->end();
		}
		$this->render('ownCard',array('cardInfo'=>$cardInfo->attributes,'error'=>$error));
	}
	
	/**
	 * 我收到的名片
	 * @method actionReceiveCards
	 * @author   hushangming
	 * @return
	 * @since v1.16.0
	 */
	public function actionReceiveCards(){
		$model = new UserCardContact();
		$session = Yii::app()->session;
		$receiveData = $model->findAllByAttributes(array('ToUid'=>$session[SessionKey::UID]));
		$receiveCards = array();
		if(!empty($receiveData)){
			foreach($receiveData as $one){
				$FromUid[] = $one->attributes['FromUid'];
				$receiveCards[$one->attributes['FromUid']] = $one->attributes;
			}
			if(!empty($FromUid)){
				$cardInfos = UserCard::model()->findAllByPk($FromUid);
				if(!empty($cardInfos)){
					foreach($cardInfos as $one){
						$receiveCards[$one->attributes['Uid']]['cardInfo'] = $one->attributes;
					}
				}
			}
			//print_r($receiveCards);die;
		}
		$this->render('receiveCards',array('receiveCards'=>$receiveCards));
	}
}
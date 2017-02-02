<?php
class DefaultController extends Controller
{
	public $layout='//layouts/column-pure';

	public function actionIndex($cityid='')
	{
		$loadType = LoanConstants::$Loan_type;
		$Publisher_type = LoanConstants::$Publisher_type;

		if (!empty(Yii::app()->user->site)) {
			if (Yii::app()->user->site != 'web') {
				$aaa = Yii::app()->user->logout(true);
				$session = Yii::app ()->session;
				$session->clear();
				$session->destroy();
			}
		}

		// 正在交易
		// 获取城市
		if (!empty(Yii::app()->session['cityId'])) {
			$cityid = Yii::app()->session['cityId'];
		}else{
			$resuleCityInfo = $this->saveCitySession($cityid);
			$cityid = $resuleCityInfo['id'];
		}
		// TODO 加个总数 $amount  <--待定..........先不写
		// var_dump(Yii::app()->user->id);exit();
		$loadRecord = $this->getLoanService()->pagingLoan($cityid);
		// 取出当前用户的说有付费订单
		if (Yii::app()->user->id != null) {
			$loancCollection = $this->getLogGainClickService()->getLoanIdsByUserId(Yii::app()->user->id);
			// var_dump($loancCollection);exit();
		}else{
			$loancCollection = null;
		}

		// TA发布了
		$taApply = $this->getLoanService()->getRandomLoan(15);
		
		// 用户种类判断
		if (empty(Yii::app()->user->purview)) {
		 	$purview = 0;
		}else{
			$purview = 1;
		}

		// top5
		$top5 = $this->getLoanService()->getTopLoan(5);
		// var_dump($taApply);

		$this->render('index',array(
			'pages'=>$loadRecord['pages'],
			'posts'=>$loadRecord['posts'],
	        'userInfo' => $loadRecord['userInfo'],
	        'aboutUser' => $loadRecord['aboutUser'],
	        'loancCollection'=>$loancCollection,
	        'loadType' => $loadType,
	        'Publisher_type' => $Publisher_type,
	        'purview' => $purview,
	        
	        'top5' => $top5['baseInfo'],
	        'top5User' => $top5['userNikeName'],

	        'taApply'=> $taApply['baseInfo'], 
	        'taApplyUser' => $taApply['userNikeName'],
		));
	}

	// 填入loanId
	public function actionAjaxIsPoor($id)
	{
		$userId = $this->getCurrentUser();
		if ($userId['status'] == false) {
			$result = array('type'=>'login','status'=>false,'message'=>$userId['content']);
			return print json_encode($result);
		}

		// 用户权限
		$purview = Yii::app()->user->purview;
		if ($purview == 1) {
			$result = array('type'=>'loginpurview','status'=>false,'message'=>'您是个人用户，只有信贷经理可以使用信贷经理通道');
			return print json_encode($result);
		}

		// var_dump('ctrl',$userId['content'],$id);
		$repeatBuy = $this->getLogGainClickService()->isRepeatBuy($id,$userId['content']);
		// var_dump('vvv',$repeatBuy);exit();
		if (!$repeatBuy) {
			$result = array('type'=>'pay','status'=>true,'message'=>'本借款您已支付点击收益，可直接查看');
			return print json_encode($result);
		}
		$thePoor = $this->getRechargeService()->isThePoor($userId['content'],$id);
		// var_dump($thePoor['status']);exit();
		if ($thePoor['status']) {
			$result = array('type'=>'recharge','status'=>false,'clickPrice'=>$thePoor['clickPrice'],'message'=>'您的账户内余额不够，您确定充值吗？余额将用于支付本次查看。');
		}else{
			$result = array('type'=>'recharge','status'=>true,'clickPrice'=>$thePoor['clickPrice'],'message'=>'浏览详情需要支付对应金额，您确定支付吗？');
		}

		return print json_encode($result);
	}

	public function actionCityList()
	{
		$model = new CityListForm;

		$pinyinCity = $this->getInfoCityService()->getPinyinCity();
		$province = $this->getInfoCityService()->getProvince();
// var_dump($pinyinCity);exit();
		$this->render('cityList',array(
			'model'=>$model,
			'pinyinCity'=>$pinyinCity,
			'province'=>$province,
		));
	}

	// 二级联动 dropdownlist 
	public function actionAjaxGetCityList($id)
	{
		$result = $this->getInfoCityService()->getCityByProvince($id);

		return print json_encode($result);
	}

	public function actionChangeCity($cityid)
	{
		$result = $this->saveCitySession($cityid);
		if(empty($result['id'])){
			throw new Exception("参数返回出错", 1);
		}

		return $this->redirect(array('index','cityid'=>$result['id']));
	}

	// private function saveCitySession($cityid)
	// {

	// }

	private function saveCitySession($cityid)
	{

		$cityInfo = array();
		$citySession = Yii::app()->session; 

		if (empty($cityid)) {
			//默认首先查看杭州的id，写死了。
			if ($citySession['firstVisit'] != true ) {
				$cityInfo['id'] = 429;
				$cityInfo['name'] = '杭州';
				$citySession['firstVisit'] = true;
			}
		}else{
			$resuleCityInfo = $this->getInfoCityService()->getCityById($cityid);
			$cityInfo['id'] = $resuleCityInfo['CityId'];
			$cityInfo['name'] = $resuleCityInfo['Name'];
		}

		$citySession['cityId'] = $cityInfo['id'];
		$citySession['cityName'] = $cityInfo['name'];
		return $cityInfo;
	}

}
<?php
Yii::import("application.utils.Payment.yeepay.*");

// 借款详情的控制器，需要处理完，点击收益、资金流动、余额扣除等，才能跳转到贷款详情
// 是关于支付流程的衍生
class PayLoanDetailController extends BaseAuthController
{
	public $layout='';

	public function actionRechargeAfter($loanId)
	{
		$currentUid = Yii::app()->user->id;
		$aBaseloan = $this->getLoanService()->getloanBaseInfo($loanId);
		$singleIncome = $this->getUserService()->getSingleIncomeById($aBaseloan['Uid']);
		// 扣当前用户余额
		$isPoor = $this->getRechargeService()->isThePoor($currentUid,$loanId);
		// var_dump($isPoor);exit();
		if ($isPoor['status']) {
			throw new Exception("您当前余额不足", 1);
		}

		$rechargeRecord = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$currentUid));
		if ($singleIncome >= $rechargeRecord['HandselYue']) {
			$deduct = 'HandselYue';
		}elseif ($singleIncome >= $rechargeRecord['Yue']) {
			$deduct = 'Yue';
		}
		// $convRecharge = (float)$rechargeRecord[$deduct];
		// var_dump($singleIncome);exit();
		// $singleIncome = (float)$singleIncome;
		// var_dump($rechargeRecord[$deduct]-$singleIncome['SingleIncome']);exit();
		$rechargeRecord->$deduct = $rechargeRecord[$deduct]-$singleIncome['SingleIncome'];
		if (!$rechargeRecord->save()) {
			throw new Exception("余额扣除失败", 1);
		}

		// +投资方 冻结金额；
		$lendersRechargeRecord = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$aBaseloan['Uid']));
		$lendersRechargeRecord->ColdYue = $lendersRechargeRecord->ColdYue + $singleIncome['SingleIncome'];
		if (!$lendersRechargeRecord->save()) {
			throw new Exception("付款出错，请联系管理员", 1);
		}

		// 记录点击收益流水	
		$gainClickRecord = new LogGainClick;
		$gainClickRecord->LoanId = $loanId;
		$gainClickRecord->Uid = $currentUid;
		$gainClickRecord->SingleIncome = $singleIncome['SingleIncome'];
		$gainClickRecord->Create_time = $gainClickRecord->Update_time = time();
		if (!$gainClickRecord->save()) {
			throw new Excepotin('扣款出错，请联系管理员');
		}
		// var_dump($gainClickRecord->getErrors());exit();


		return $this->redirect(array('/LoanDetail/Item','id'=>$loanId,'prompt'=>true));
	}

	public function actionYeepayForCallBack()
	{
		$YPrequest = $_REQUEST;
		$ypCallBack = new callback;
		$result = $ypCallBack->processCallBack($YPrequest);
			
		// 跳转  根据回传的值r8_MP 判断
		if ($result[2] == "addAndjumploan") {
			return $this->redirect(array('RechargeAfter','loanId'=>$result[1]));
		}elseif ($result[2] == "add") {
			return $this->redirect(array('/my/account/info','prompt'=>true));
		}else{
			throw new Exception("出错了，请联系管理员", 1);
		}
	}
}
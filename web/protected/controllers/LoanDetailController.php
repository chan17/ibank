<?php

class LoanDetailController extends BaseAuthController
{
	public $layout='//layouts/column-pure';

	/** $id == $loadId
	*	@var $aLoan['loanBaseInfo']
	*	@var $aLoan['loanUserInfo']
	*	@var $aLoan['loanUserProve']
	*
	**/
	public function actionItem($id,$prompt=false)
	{
		$userId = $this->getCurrentUser();
		if ($userId['status'] == false) {
            throw new Exception("请先登录", 1);
		}

		$this->isPayment($id,$userId['content']);
		// 防提醒出现第二次
		// $currentSession = Yii::app()->Session;
		// $i = 0;
		// if ($prompt) {
		// 	$i +=1;
		// 	$currentSession->add('prompt_count', $i);
		// 	if ($currentSession->get('prompt_count') != 1) {
		// 		$prompt = false;
		// 	}
		// }

		$aload = $this->getLoanService()->getLoan($id);
        $prove['Idcard_url'] = $aload['loanUserProve']['Idcard_url'];
        $prove['House_card_url'] = $aload['loanUserProve']['House_card_url'];
        $prove['Driving_license_url'] = $aload['loanUserProve']['Driving_license_url'];
        $prove['House_add_url'] = $aload['loanUserProve']['House_add_url'];
        $prove['Income_prove_url'] = $aload['loanUserProve']['Income_prove_url'];
        $prove['Job_prove_url'] = $aload['loanUserProve']['Job_prove_url'];
        $prove['Wage_prove_url'] = $aload['loanUserProve']['Wage_prove_url'];
        // unset($aload['loanUserProve']);
        // var_dump($prove);exit();
		$user = $this->getUserService()->getUser($aload['loanUserInfo']['Uid']);

		$this->render('item',array(
			'aload'=>$aload,
			'user'=>$user,
			'prove'=>$prove,
			'prompt'=>$prompt,
			// 'loanIdAndSI'=>$aload['recordClick'],
			'proveName'=>LoanConstants::$Loan_prove,
		));
	}

	//  权限判断 是否已经支付
	private function isPayment($loanId,$userId)
	{
		$repeatBuy = $this->getLogGainClickService()->isRepeatBuy($loanId,$userId);
		if ($repeatBuy) {
            throw new Exception("请先支付点击费用", 1);
		}
	}

}
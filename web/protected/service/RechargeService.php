<?php
/**
* 
*/
class RechargeService extends BaseService
{

	function __construct()
	{
	}
    

    // 余额 和 点击收益比较，如果 余额 < 点击收益 ， 返回 true.
    // ..两种余额，一个自己充值，一个网站赠送
    public function isThePoor($userId,$loanId)
    {
        if (empty($loanId)) {
			throw new Exception("未获得关键参数", 1);
        }
        if (empty($userId)) {
			throw new Exception("未获得关键参数", 1);
        }
        $aRecharge = RecordRechargeModel::model()->find('Uid=:Uid', array(':Uid'=>$userId));
        $aClickPrice = $this->getUserService()->getSingleIncomeById($userId);
        // var_dump('aRecharge',$aRecharge);
        
        if (empty($aRecharge)) {
            $aRecharge['Yue'] = 0;
        }
        if ($aRecharge['Yue'] == null) {
            $aRecharge['Yue'] = 0;
        }
        if ($aClickPrice['SingleIncome'] == null) {
            $aClickPrice['SingleIncome'] = 0;
        }
        $aClickPrice['SingleIncome'] = (float)$aClickPrice['SingleIncome'];
        $aRecharge['Yue'] = (float)$aRecharge['Yue'];
        $aRecharge['HandselYue'] = (float)$aRecharge['HandselYue'];
        // var_dump($aClickPrice['SingleIncome'],$aRecharge['Yue'],$aRecharge['HandselYue']);exit();

        if ($aRecharge['HandselYue']<=$aClickPrice['SingleIncome'] and $aRecharge['Yue'] <= $aClickPrice['SingleIncome']) {
            return array('status'=>true,'clickPrice'=>$aClickPrice['SingleIncome']);
        }

        return array('status'=>false,'clickPrice'=>$aClickPrice['SingleIncome']);
    }

}
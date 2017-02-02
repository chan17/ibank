<?php
/**
* 
*/
class LoanService extends BaseService
{
	function __construct()
	{
		# code...
	}

	public function getLoan($id)
	{
		if (empty($id)) {
			throw new Exception("未获得关键参数", 1);
		}
		$loanType = LoanConstants::$Loan_type;
		
		$result = array();
		$result['loanBaseInfo'] = $this->getLoanBaseInfoDao()->getLoan($id);
		$result['loanUserInfo'] = $this->getLoanUserInfoDao()->getLoan($id);
		$result['loanUserProve'] = $this->getLoanUserProveDao()->getLoan($id);

		$result['loanBaseInfo']['Loan_effect_type'] = $loanType[$result['loanBaseInfo']['Loan_effect_type']];
		$result['loanUserInfo']['Year_revenue'] = $result['loanUserInfo']['Year_revenue']/10000;
		foreach ($result as $key => $value) {
			if ($value != null && $key != 'loanUserProve') {
				foreach ($value as $key2 => $value2) {
					if ($value2  == null) {
						$result[$key][$key2] = '无';
					}
				}
			}
		}
		return $result;
	}

	public function getloanBaseInfo($id)
	{
		if (empty($id)) {
			throw new Exception("未获得关键参数", 1);
		}

		$result = $this->getLoanBaseInfoDao()->getLoan($id);
		return $result;
	}

	public function getRandomLoan($amount)
	{
		if (empty($amount)) {
			throw new Exception("未获得关键参数", 1);
		}

		$result['baseInfo'] = $this->getLoanBaseInfoDao()->getRandomLoan($amount);
		// var_dump($result['baseInfo']);exit();
		$userIds = array();
		foreach ($result['baseInfo'] as $key => $value) {
			$userIds[]= $value['Uid'];
		}
		$userNikeName = $this->getUserService()->getNikeNameByIds($userIds);
		foreach ($userNikeName as $key => $value) {
			$result['userNikeName'][$value['Uid']] = $value['Nickname'];
		}

		// if ($result == null) {
		// 	return array('status'=>false,'message'=>'暂无记录');
		// }
		return $result;
	}

	public function getTopLoan($topNum)
	{
		if (empty($topNum)) {
			throw new Exception("未获得关键参数", 1);
		}

		$result['baseInfo'] = $this->getLoanBaseInfoDao()->getTopLoan($topNum);

		$userIds = array();
		foreach ($result['baseInfo'] as $key => $value) {
			$userIds[]= $value['Uid'];
		}
		$userNikeName = $this->getUserService()->getNikeNameByIds($userIds);
		foreach ($userNikeName as $key => $value) {
			$result['userNikeName'][$value['Uid']] = $value['Nickname'];
		}

		// if ($result == null) {
		// 	return array('status'=>false,'message'=>'暂无记录');
		// }
		return $result;
	}

	// TODO 加个总数 $amount  <- 暂时不加。
	public function pagingLoan($cityId)
	{
		$pageSize = 4;   //每页显示个数
		if(!is_numeric($cityId)){
			throw new Exception("参数传入出错", 1);
		}
        $result = $this->getLoanBaseInfoDao()->pagingLoan($cityId,$pageSize);

        // 提取userid 和 loanid
        $setUserId = $setLoanId =array();
        foreach ($result['posts'] as $key => $value) {
        	$setLoanId[] = $value['LoanId'];
        	$setUserId[] = $value['Uid'];
        }
        if (empty($result['posts'])) {
        	$result['userInfo'] = NULL;
        	$result['aboutUser'] = NULL;
        	$result['userInfo'] = NULL;

        	return $result;
        }

        //  整理数组 
        $ArrangeSetId = implode(",",$setLoanId);
		$userInfo = $this->getLoanUserInfoDao()->findLoanByIdarray($ArrangeSetId);
		$result['userInfo']=array();
		foreach ($userInfo as $key => $value) {
			$result['userInfo'][$value['LoanId']] = $value;
		}

		$aboutUser = $this->getUserService()->getLevelPurviewByIds($setUserId);
		// $userNikeName = $this->getUserService()->getNikeNameByIds($setUserId);
		// $userLever = $this->getUserService()->getLevelByIds($result['setId']);
		$result['aboutUser'] = array();
		foreach ($aboutUser as $key => $value) {
			$result['aboutUser'][$value['Uid']] =$value;
		}

	    return $result;
	}

	public static function encodeS($step=1, $id=0){
		$_str = $step.'|'.$id;
		return urlencode(base64_encode($_str));
	}
	
	public static function decodeS($s){
		$_s = urldecode($s);
		$_s = base64_decode($_s);
		$_sArr = explode('|', $_s);
		return array('step'=>$_sArr[0], 'id'=>intval(@$_sArr[1]));
	}
}
<?php
/**
 * 身份证号码处理工具类
 * FileName:IDCard
 * @author   hushangming
 * @Date	 2014-5-9 下午02:45:47
 */
class IDCard{
	// 身份证号码前17位，每位对应的加权因子（排序不能变）
	public $factors = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
	// 身份证号码前17位对应的校验码（排序不能变）
	public $verifyNumber = array('1','0','X','9','8','7','6','5','4','3','2');
	
	/**
	 * 验证身份证号码是否有效
	 * @method checkIdCardIsValid
	 * @author   hushangming
	 * @param string $idCard
	 * @return
	 */
	public function checkIdCardIsValid($idCard){
		$idCardLen = strlen($idCard);
		if(18 === $idCardLen){
			return $this->checkIdCardIsValid18($idCard);
		}elseif(15 === $idCardLen){
			$idCard = $this->upIdCardFrom15To18($idCard);
			return $this->checkIdCardIsValid18($idCard);
		}
		return false;
	}
	
	/**
	 * 将15位的身份证号码转成18位
	 * @method upIdCardFrom15To18
	 * @author   hushangming
	 * @param string $idCard
	 * @return string
	 */
	public function upIdCardFrom15To18($idCard){
		if(15 !== strlen($idCard)){
			return false;
		}
		// 15位身份证上顺序码是996、997、998、999，这些都是百岁以上寿星的特俗编码
		if(false !== array_search(substr($idCard, 12, 3), array('996', '997', '998', '999'))){
			$idCard = substr($idCard, 0, 6).'18'.substr($idCard, 6, 9);
		}else{
			$idCard = substr($idCard, 0, 6).'19'.substr($idCard, 6, 9);
		}
		$idCard = $idCard.$this->getCheckCodeFromIdCardBase($idCard);
		return $idCard;
	}
	
	/**
	 * 检查18位$idCard是否是有效身份证号码
	 * @method checkIdCardIsValid18
	 * @author   hushangming
	 * @param string $idCard
	 * @return boolean
	 */
	protected function checkIdCardIsValid18($idCard){
		if(18 !== strlen($idCard)){
			return false;
		}
		$idCardBase = substr($idCard, 0, 17);
		if($this->getCheckCodeFromIdCardBase($idCardBase) !== substr($idCard, 17, 1)){
			return false;
		}
		return true;
	}
	
	/**
	 * 从身份证号码前17位获取身份证校验码
	 * @method getCheckCodeFromIdCardBase
	 * @author   hushangming
	 * @param string $idCardBase
	 * @return string
	 */
	protected function getCheckCodeFromIdCardBase($idCardBase){
		$idCardBaseLen = strlen($idCardBase);
		if(17 !== $idCardBaseLen){
			return false;
		}
		$checkSum = 0;
		for($i=0; $i<$idCardBaseLen; $i++){
			$checkSum += substr($idCardBase, $i, 1) * $this->factors[$i]; // 累加身份证号码每一位与加权因子乘积
		}
		$mod = $checkSum % 11; // 上一步统计的乘积对 11 取模
		$checkCode = $this->verifyNumber[$mod]; // 获取对应的校验码，就是当前身份证号码对应的校验码
		return $checkCode;
	}
	
}
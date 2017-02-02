<?php
/**
 * 汉字转拼音
 * 此类需要加载同目录下CharSpellConst.php，请确保其存在，使用方法：
 * <pre>
 * $name = '需要转换的字符串';
 * $chinese = new Chinese2Spell();
 * // getSpells传入第二个参数（整数）时，则返回的拼音中从起始位置开始截取
 * $spell = $chinese->getSpells($name);
 * </pre>
 * @author hushangming
 */
class Chinese2Spell{
	private $_encode = 'UTF-8';
	private $_ignore = true; // 是否忽略非中文/字母/数字外的其他字符
	private $_ChineseSpellArr = array(); // 汉字与拼音对应数组
	
	private $_pattern_chinese = '/^[\x{4e00}-\x{9fa5}]$/u'; // 汉字正则表达式
	private $_pattern_letter = '/^[a-zA-z]$/u'; // 字母正则表达式
	private $_pattern_number = '/^[0-9]$/u'; // 数字正则表达式
	
	public function __construct($encode = 'UTF-8', $ignore = true){
		$this->_encode = $encode;
		$this->_ignore = $ignore;
		$this->setChineseSpellArr();
	}
	
	/**
	 * 初始化汉字与拼音对应数组
	 */
	public function setChineseSpellArr(){
		$this->_ChineseSpellArr = CharSpellConst::getChineseSpellArr();
	}
	
	/**
	 * 返回$char对应的拼音
	 * 	如果$char是汉字，则返回其对应拼音
	 *  如果$char是字母，则返回其本身
	 *  其他情况由$_ignore指定返回其他字符本身还是空
	 * @param string $char
	 * @return string
	 */
	public function getSpell($char){
		// 是中文，返回拼音
		if($this->isChinese($char)){
			return $this->letter($char);
		}else{
			// 是字母，原样返回
			if($this->isLetter($char)){
				return $char;
			}else{
				if($this->isNumber($char)){
					return $this->getNumberSpell($char); // 数字转换为对应拼音
				}else{
					// 不忽略其他字符
					if(!$this->_ignore){
						return $char;
					}
				}
			}
		}
		
		return '';
	}
	
	/**
	 * 返回$string对应的拼音
	 * 	如果$string中有汉字，则返回其对应拼音
	 *  如果$string中有字母，则返回其本身
	 *  其他情况由$_ignore指定返回其他字符本身还是空
	 * @param string $string
	 * @param int $length：将$string中的指定$length长度转为拼音返回
	 * @return string
	 */
	public function getSpells($string, $length = 0){
		$spell = '';
		
		$strlen = mb_strlen($string, $this->_encode);
		if($strlen > 0){
			for($i=0; $i<$strlen; $i++){
				$s = mb_substr($string, $i, 1, $this->_encode);
				// 是中文，则转为拼音
				if($this->isChinese($s)){
					$spell .= $this->letter($s);
				}else{
					// 是字母，则原样
					if($this->isLetter($s)){
						$spell .= $s;
					}else{
						if($this->isNumber($s)){
							$spell .= $this->getNumberSpell($s); // 数字转换为对应拼音
						}else{
							// 是否忽略其他字符
							if($this->_ignore){ // 忽略
								$spell .= '';
							}else{ // 不忽略
								$spell .= $s;
							}
						}
					}
				}
			}
			if($length){
				$spell = substr($spell, 0, $length);
			}
			return $spell;
		}
		
		return '';
	}
	
	protected function getNumberSpell($number){
		switch($number){
			case 0:
				return 'ling';
			break;
			case 1:
				return 'yi';
			break;
			case 2:
				return 'er';
			break;
			case 3:
				return 'san';
			break;
			case 4:
				return 'si';
			break;
			case 5:
				return 'wu';
			break;
			case 6:
				return 'liu';
			break;
			case 7:
				return 'qi';
			break;
			case 8:
				return 'ba';
			break;
			case 9:
				return 'jiu';
			break;
		}
	}
	
	/**
	 * 判断是否是中文字符
	 * @param string $char
	 * @return boolean
	 */
	protected function isChinese($char){
		$isChinese = preg_match($this->_pattern_chinese, $char);
		if($isChinese)
			return true;
		return false;
	}
	
	/**
	 * 判断是否是字母
	 * @param string $char
	 * @return boolean
	 */
	protected function isLetter($char){
		$isLetter = preg_match($this->_pattern_letter, $char);
		if($isLetter)
			return true;
		return false;
	}
	
	/**
	 * 判断是否是数字
	 * @param string $char
	 * @return boolean
	 */
	protected function isNumber($char){
		$isNumber = preg_match($this->_pattern_number, $char);
		if($isNumber)
			return true;
		return false;
	}

	/**
	 * 将$char指定的汉字转为拼音
	 * @param string $char
	 * @return string
	 */
	protected function letter($char){
		$spell = '';
		$char = str_replace('"', '', json_encode($char));
		$char = strtoupper($char);
		if(isset($this->_ChineseSpellArr[$char])){
			$spell .= strtolower($this->_ChineseSpellArr[$char]);
		}else{
			$spell .= $char;
		}
		return $spell;
	}
}
<?php
/**
* 
*/
class InfoCityService extends BaseService
{
	private $chinese2Spell;

	function __construct()
	{
		$this->chinese2Spell = new Chinese2Spell();
	}

	public function getCityById($id)
	{
		if (empty($id)) {
			throw new Exception("未获得关键参数", 1);
		}
		$result = $this->getInfoCityDao()->getCityById($id);

		return $result;
	}

	public function getCityNameByIds($ids)
	{
		if (!is_array($ids)) {
			throw new Exception("未获得关键参数", 1);
		}
		$ArrangeSetId = implode(",",$ids);
		$result = $this->getInfoCityDao()->findCityNameByIdarray($ArrangeSetId);
		foreach ($result as $key => $value) {
            $cityTrans[$value['CityId']] = $value['Name'];
		}

		return $cityTrans;
	}

	public function getCityByProvince($id)
	{
		if (empty($id)) {
			throw new Exception("关键参数 is error", 1);
		}

		$result = $this->getInfoCityDao()->getCityByParentId($id);

		return $result;
	}

	public function getProvince()
	{
		$allCity = $this->getInfoCityDao()->getAllCity();
		$result = array();
		foreach ($allCity as $key => $value) {
			if ($value['ParentId'] == 0) {
				$result[] = array('ProvinceId'=>$value['CityId'],'Name'=>$value['Name']);
			}
		}

		return $result;
	}

	public function getPinyinCity()
	{
		$allCity = $this->getInfoCityDao()->getAllCity();
		$result = array();

		foreach ($allCity as $key => $value) {
			if ($value['ParentId'] != 0) {
				$resultSoring = $this->sortingCityByPinyinFirst($value['Name']);

				$result[$resultSoring][] = array('CityId'=>$value['CityId'],'Name'=>$value['Name']);
			}
		}
			// $resultSoring = $this->sortingCityByPinyinFirst('衢州');
			// var_dump($resultSoring);exit();

		ksort($result);
		return $result;
	}

	// php获取中文字符拼音首字母
	public function sortingCityByPinyinFirst($_str)
	{
		$_dochar = mb_substr($_str,0,1,'UTF-8');
		$_charspell = $this->chinese2Spell->getSpells($_dochar, 1);
		
		return $_charspell;
		
		$_len = mb_strlen($_str,'UTF-8');
		for($i=0;$i<$_len;$i++){
			$_dochar = mb_substr($_str,$i,1,'UTF-8');
			$_charspell = $this->chinese2Spell->getSpells($_dochar,1);
		}

	}

	// php获取中文字符拼音首字母  勉强可用只做产考
	// public function sortingCityByPinyinFirst($str)
	// {
	// 	if(empty($str)){
	// 		throw new Exception("未获得关键参数", 1);
	// 	}
	// 	$fchar=ord($str{0});
	// 	if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
	// 	$s=iconv('UTF-8','gb2312',$str);
	// 	// $s2=iconv('gb2312','UTF-8',$s1);
	// 	// $s=$s2==$str?$s1:$str;
	// 	$asc=ord($s{0})*256+ord($s{1})-65536;
	// 	if($asc>=-20319&&$asc<=-20284) return 'A';
	// 	if($asc>=-20283&&$asc<=-19776) return 'B';
	// 	if($asc>=-19775&&$asc<=-19219) return 'C';
	// 	if($asc>=-19218&&$asc<=-18711) return 'D';
	// 	if($asc>=-18710&&$asc<=-18527) return 'E';
	// 	if($asc>=-18526&&$asc<=-18240) return 'F';
	// 	if($asc>=-18239&&$asc<=-17923) return 'G';
	// 	if($asc>=-17922&&$asc<=-17418) return 'H';
	// 	if($asc>=-17417&&$asc<=-16475) return 'J';
	// 	if($asc>=-16474&&$asc<=-16213) return 'K';
	// 	if($asc>=-16212&&$asc<=-15641) return 'L';
	// 	if($asc>=-15640&&$asc<=-15166) return 'M';
	// 	if($asc>=-15165&&$asc<=-14923) return 'N';
	// 	if($asc>=-14922&&$asc<=-14915) return 'O';
	// 	if($asc>=-14914&&$asc<=-14631) return 'P';
	// 	if($asc>=-14630&&$asc<=-14150) return 'Q';
	// 	if($asc>=-14149&&$asc<=-14091) return 'R';
	// 	if($asc>=-14090&&$asc<=-13319) return 'S';
	// 	if($asc>=-13318&&$asc<=-12839) return 'T';
	// 	if($asc>=-12838&&$asc<=-12557) return 'W';
	// 	if($asc>=-12556&&$asc<=-11848) return 'X';
	// 	if($asc>=-11847&&$asc<=-11056) return 'Y';
	// 	if($asc>=-11055&&$asc<=-10247) return 'Z';
	// 	return null;
	// }

}
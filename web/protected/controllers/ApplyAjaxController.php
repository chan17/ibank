<?php
class ApplyAjaxController extends Controller
{
	// 传入userid  
	public function actionCalculateLevel($uid)
	{

		$level = $this->getUserService()->CalculationOfLevel($uid);
		$SingleIncome = $this->getUserService()->CalculationOfSingleIncome($uid,$level);

		if (!empty($level) && !empty($SingleIncome)) {
			return print json_encode(array('status'=>true));
		}
		
		return print json_encode(array('status'=>false));
	}


}
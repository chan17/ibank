<?php
/**
* 
*/
class RecordClickService extends BaseService
{
	function __construct()
	{
	}

	//@return string
	public function getSingleIncomeByLoanId($loanId)
	{
		$result = $this->getRecordClickDao()->getSingleIncomeByLoanId($loanId);
		// $loanIdAndSI = array();
		// foreach ($result as $key => $value) {
		// 	$loanIdAndSI[$value['LoanId']] = $value['SingleIncome'];
		// }
		// $loanIdAndSI[$result['LoanId']] = $result['SingleIncome'];

		return  $result;
	}

}